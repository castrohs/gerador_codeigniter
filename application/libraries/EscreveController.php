<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EscreveController {

    var $cabecalho="\$this->load->view('layout/web_head', \$data);
        \$data['menus'] = \$this->MenuModel->menus();
        \$this->load->view('layout/menu', \$data);";
    
    function writeController($pasta_do_sistema, $nome_arquivo, $escrita) {

        $file = fopen($pasta_do_sistema . "//application//controllers//" . $nome_arquivo . ".php", "w");
        fwrite($file, $escrita);
        fclose($file);
    }

    function escreve_controller($nome_view, $nome_model) {

        $controller = "<?php \n\n defined('BASEPATH') OR exit('No direct script access allowed');

class " . $nome_view . " extends CI_Controller {
        \nfunction __construct() {
            parent::__construct();
    }
    \npublic function index() {
        \$this->listar();
    }";
        
        $controller .= "\n".$this->escreve_listar($nome_view,$nome_model);
        $controller .= "\n".$this->escreve_cadastrar($nome_view,$nome_model);
        $controller .= "\n".$this->escreve_atualizar($nome_view,$nome_model);
        $controller .= "\n".$this->escreve_atualizar_view($nome_view,$nome_model);
        $controller .= "\n".$this->escreve_excluir($nome_view,$nome_model);
        
        return $controller;
    }
    public function escreve_listar($nome_view,$nome_model){
        $retorno = "\npublic function listar() {
        
        \$data['title'] = 'Lista de $nome_view';
        \$this->load->view('layout/web_head', \$data);
        \$data['menus'] = \$this->MenuModel->menus();
        \$this->load->view('layout/menu', \$data);
        \$this->load->model('" . $nome_model . "');
        \$data['busca_todas']= \$this-> " . $nome_model . "->busca_todos();
        \$data['insert_result'] = \$this->session->flashdata('insert_result');
        \$this->load->view('" . $nome_view . "/listar', \$data);
        \$this->load->view('layout/web_footer');
    }";
        return $retorno;
    }
    public function escreve_cadastrar($nome_view,$nome_model){
        $retorno = "\npublic function cadastrar() {
        
        \$post = \$this->input->post(); 
        if (!empty(\$post)) {
            \$this->load->model('" . $nome_model . "');
            \$insert_result = \$this-> " . $nome_model . "->insert();
        }
        \$this->session->set_flashdata('insert_result', \$insert_result);
        redirect(base_url() . '" . $nome_view . "');
    }";
        return $retorno;
    }
    public function escreve_atualizar($nome_view,$nome_model){
        $retorno = "\npublic function atualizar() {
        
        \$post = \$this->input->post();
        if (!empty(\$post)) {
            \$this->load->model('" . $nome_model . "');
            \$insert_result = \$this-> " . $nome_model . "->update();
        }
        \$this->session->set_flashdata('insert_result', \$insert_result);
        redirect(base_url() . '" . $nome_view . "');
    }";
        return $retorno;
    }
    public function escreve_atualizar_view($nome_view,$nome_model){
        $retorno = "public function atualizar" . $nome_view . "(\$id) {
        
        \$data['title'] = 'Atualizar " . $nome_view . "';
        \$this->load->view('layout/web_head', \$data);
        \$this->load->model('" . $nome_model . "');
        \$" . $nome_view . " = \$this-> " . $nome_model . "->busca_um(\$id);
        \$data['" . $nome_view . "']= \$" . $nome_view . "[0];
        \$data['menus'] = \$this->MenuModel->menus();     
        \$this->load->view('layout/menu', \$data);
        \$this->load->view('" . $nome_view . "/editar', \$data);
        \$this->load->view('layout/web_footer');
    }
       
}";
        return $retorno;
    }
    public function escreve_excluir($nome_view,$nome_model){
        $retorno = "\npublic function excluir() {
        
        \$post = \$this->input->post();
        if (!empty(\$post)) {
            \$this->load->model('" . $nome_model . "');
            \$this-> " . $nome_model . "->excluir();
        }
        \nredirect(base_url() . '" . $nome_view . "');
    }
}";
        return $retorno;
    }

}
