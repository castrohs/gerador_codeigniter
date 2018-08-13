<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Autenticacao_Usuario extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {

        if ($this->SessaoModel->verificaSessao()) {

            $this->load->view('layout/web_head');
            $data["menus"] = $this->MenuModel->menus();
            $this->load->view('layout/menu', $data);
            $this->load->view('inicio');
            $this->load->view('layout/web_footer');
        } else {

            $this->load->view('layout/web_head');
            $data["menus"] = $this->MenuModel->menus();
            $this->load->view('layout/menu', $data);
            $this->load->view('usuario/autenticar');
            $this->load->view('layout/web_footer');
        }
    }

    public function login() {

        $usuario = filter_input(INPUT_POST, 'usuario');
        $senha = md5(filter_input(INPUT_POST, 'senha'));
        $query = $this->db->query("SELECT * FROM tb_usuario WHERE usuario = ? AND senha = ? AND ativo = 1", array($usuario, $senha));
        if ($query->num_rows() > 0) {
            $this->SessaoModel->logar($query->row());
            $this->load->view('layout/web_head');
            $data["menus"] = $this->MenuModel->menus();
            $this->load->view('layout/menu', $data);
//            $this->load->view('inicio');
            $this->load->view('layout/web_footer');
        } else {

            $this->SessaoModel->logout();
            $this->load->view('layout/web_head');
            $data["menus"] = $this->MenuModel->menus();
            $this->load->view('layout/menu', $data);
            $this->load->view('usuario/autenticar');

            $this->load->view('layout/web_footer');
        }
        
    }

    public function logout() {

        $this->SessaoModel->logout();
        $this->load->view('layout/web_head');
        $data["menus"] = $this->MenuModel->menus();
        $this->load->view('layout/menu', $data);
        $this->load->view('usuario/autenticar');
        $this->load->view('layout/web_footer');
    }

}
