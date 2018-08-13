<?php

/**
 * Created by PhpStorm.
 * User: Lamarques
 * Date: 21/10/2015
 * Time: 14:27
 */
class SessaoModel extends CI_Model {
   
    public function __construct() {
        parent::__construct();
        @session_start();
        @session_name('superbonus');
      
    }


    public function logar($data) {
        var_dump($data);
        
        $this->session->set_userdata('logado', true);
        $this->session->set_userdata('usuario', $data->usuario);
        $this->session->set_userdata('id_usuario', $data->id_usuario);
        $this->session->set_userdata('nivel', $data->id_nivel_usuario);
        $this->session->set_userdata('id_nivel_usuario', $data->id_nivel_usuario);        
        $this->session->set_userdata('nome_completo', $data->nome_completo);        
    }
    

    public function logout() {
        unset($_SESSION['logado']);
        unset($_SESSION['usuario']);
        unset($_SESSION['id_usuario']);
        unset($_SESSION['nivel']);
        $this->session->unset_tempdata('logado');
        $this->session->unset_tempdata('usuario');
        $this->session->unset_tempdata('id_usuario');
        $this->session->unset_tempdata('nivel');
        $this->session->unset_tempdata('nome_completo');
      $this->session->sess_destroy();
    }

    /**
     * @return bool
     */
    public function verificaSessao($id_usario = null) {
//        var_dump($_SESSION);
        if (isset($_SESSION['logado']) && ($_SESSION['logado'] === TRUE)) {
            if (isset($id_usario)) {
                if ($_SESSION['id_usuario'] != $id_usario && !$this->isAdmin()) {
                    return false;
                } else {
                    return true;
                }
            }
            return true;
        } else {
            return false;
        }
    }

    public function isAdmin() {

        if (isset($_SESSION['nivel']) && $_SESSION['nivel'] === '2' || $this->isMaster()) {
            return true;
        } else {
            return false;
        }
    }
     public function isMaster() {

        if (isset($_SESSION['nivel']) && $_SESSION['nivel'] === '1') {
            return true;
        } else {
            return false;
        }
    }
     

}
