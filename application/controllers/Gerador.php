<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gerador extends CI_Controller {

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
        $this->conecta();
    }

    var $banco_ativo = 'information_schema';
    var $arr = ['hostname','administrador','senha','quantas_letras_remover'];
    var $conexao = ['hostname','administrador','senha'];

    public function gera() {
        
        $get = $this->input->post();
        $this->novo_banco = $get['novo_banco'];
        
             $this->DBA->hostname =  $this->session->hostname;
             $this->DBA->administrador =  $this->session->administrador;
             $this->DBA->senha =  $this->session->senha;
      
        

        $this->DBA->db1 = $this->DBA->conecta($get['novo_banco']);
        $data['bootstrap']=$get['bootstrap'];
        $data['rules_ativo']=$get['rules_ativo'];
        $data['tabelas'] = $this->DBA->busca_lista_de_tabelas($this->DBA->db1);
        
        $data['tables_in'] = 'Tables_in_' . $this->novo_banco;
        $data['quantas_letras_remover'] = $this->session->quantas_letras_remover;

        $this->load->view('layout/web_head');
        $this->load->view('gerador', $data);;
    }

    public function conecta() {

        $this->load->view('layout/web_head');
        $this->load->view('conecta');
    }

    public function conexao() {
        $data['pasta_do_sistema'] = "//var/www/html/arquivo";
        $get = $this->input->post();
        
        
        foreach ($this->arr  as $value ) {
//            echo $value . " ".$get[$value]."<br>";
             $this->DBA->$value = $get[$value];
            
             
             $this->session->set_userdata($value, $get[$value]);
             
        }
        
        $data['get']=$get;
        $this->DBA->db1 = $this->DBA->conecta('information_schema');
       
        $data['bancos'] = $this->DBA->busca_lista_de_banco_de_dados($this->DBA->db1);
        $this->load->view('layout/web_head');
        $this->load->view('escolha_dba', $data);
    }

    function banco_ativo() {


        return $this->banco_ativo;
    }

}
