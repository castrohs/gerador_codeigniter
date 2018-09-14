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
    var $hostname;
    var $adminstrador;
    var $senha;
    var $quantas_letras_remover;
    var $db;

    public function index() {
        $this->conecta();
    }

    var $banco_ativo = 'information_schema';

    public function gera() {
        $base = $this->input->get();
        $data['tabelas'] = $this->DBA->busca_lista_de_tabelas();

        $this->DBA->conecta($base, $this->hostname, $this->adminstrador, $this->senha);
        $data['tables_in'] = 'Tables_in_' . $base;
        $this->load->view('layout/web_head');
        $this->load->view('gerador', $data);
    }

    public function conecta() {

        $this->load->view('layout/web_head');
        $this->load->view('conecta');
    }

    public function conexao() {
        $data['pasta_do_sistema'] = "//var/www/html/arquivo";
        $get = $this->input->get();
        $this->hostname = $get['hostname'];
        $this->adminstrador = $get['administrador'];
        $this->senha = $get['senha'];
        $this->quantas_letras_remover =$get['quantas_letras_remover'];
        $data['quantas_letras_remover'] = $get['quantas_letras_remover'];

        $this->db = $this->DBA->conecta('information_schema', $this->hostname, $this->adminstrador, $this->senha);
        
        $this->escolha_db();
    }

    public function escolha_db() {
        
        $data['bancos'] = $this->DBA->busca_lista_de_banco_de_dados($this->db);
        $this->load->view('layout/web_head');
        $this->load->view('escolha_dba', $data);
    }

    function banco_ativo() {


        return $this->banco_ativo;
    }

}
