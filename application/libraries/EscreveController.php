<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EscreveController {

    var $cabecalho="\$this->load->view('layout/web_head', \$data);
        \$menu['menus'] = \$this->MenuModel->menus();
        \$this->load->view('layout/menu', \$menu);";
    
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
    /*
     * comando para listar os objetos de uma model
     */
    public function escreve_listar($nome_view,$nome_model){
        $retorno = "\npublic function listar() {
        
        \$data['title'] = 'Lista de $nome_view';
        ".$this->cabecalho."
        \$this->load->model('" . $nome_model . "');
        \$data['busca_todas']= \$this-> " . $nome_model . "->busca_todos();
        \$data['insert_result'] = \$this->session->flashdata('insert_result');
        \$this->load->view('" . $nome_view . "/listar', \$data);
        \$this->load->view('layout/web_footer');
    }";
        return $retorno;
    }
    /*
     * comando para cadastrar um item novo
     */
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
    /*
     * eu gero esta parte para ser chamada por uma view de listar sempre.
     */
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
    /*
     * uma view para atualizar um item
     */
    public function escreve_atualizar_view($nome_view,$nome_model){
        $retorno = "public function atualizar_" . $nome_view . "(\$id) {
        
        
        \$this->load->model('" . $nome_model . "');
        \$" . $nome_view . " = \$this-> " . $nome_model . "->busca_um(\$id);
        \$data['" . $nome_view . "']= \$" . $nome_view . "[0];
        
        ".$this->cabecalho."
        
        \$this->load->view('" . $nome_view . "/editar', \$data);
        \$this->load->view('layout/web_footer');
    }
       
}";
        return $retorno;
    }
    /*
     * eu gero esta parte para ser chamada por uma view de listar sempre.
     */
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
