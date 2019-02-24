<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EscreveController {

    // menu dentro do  web_head
    var $cabecalho = "\$this->load->view('layout/web_head', \$data);";
    // menu fora do web_head
//    var $cabecalho="\$this->load->view('layout/web_head', \$data);
//        \$menu['menus'] = \$this->MenuModel->menus();
//        \$this->load->view('layout/menu', \$menu);";

    var $ci;

    function escreve_controller($nome_view, $nome_model, $primary_key,$rules_ativo = 1) {
        $this->ci = &get_instance();

        $rules = "";
        foreach ($primary_key as $key) {

            $rules .= "\n \$this->form_validation->set_rules('" . $key . "', '" . ucfirst($key) . "', 'required');";
        }


        $controller = "<?php \n\n defined('BASEPATH') OR exit('No direct script access allowed');

class " . $nome_view . " extends CI_Controller {
        \nfunction __construct() {
            parent::__construct();
    }
    \npublic function index() {
        \$this->". $this->ci->lang->line('controller_listar') ."();
    }";
        
        $controller .= "\n" . $this->escreve_listar($nome_view, $nome_model);
        $controller .= "\n" . $this->escreve_cadastrar($nome_view, $nome_model, $rules, $rules_ativo); //
        $controller .= "\n" . $this->escreve_atualizar($nome_view, $nome_model, $rules, $rules_ativo);
        $controller .= "\n" . $this->escreve_atualizar_view($nome_view, $nome_model, $primary_key);
        $controller .= "\n" . $this->escreve_excluir($nome_view, $nome_model, $rules, $rules_ativo); //

        return $controller;
    }

    /*
     * comando para listar os objetos de uma model
     */

    public function escreve_listar($nome_view, $nome_model) {
        $retorno = "\npublic function " . $this->ci->lang->line('controller_listar') ."() {
        
        \$data['title'] = 'Lista de $nome_view';
        " . $this->cabecalho . "
        \$this->load->model('" . $nome_model . "');
        \$data['busca_todas']= \$this-> " . $nome_model . "->" . $this->ci->lang->line('model_busca_todos') . "();
        \$data['insert_result'] = \$this->session->flashdata('insert_result');
        \$this->load->view('" . $nome_view . "/listar', \$data);
        \$this->load->view('layout/web_footer');
    }";
        return $retorno;
    }

    /*
     * comando para cadastrar um item novo
     */

    public function escreve_cadastrar($nome_view, $nome_model, $rules = null, $rules_ativo = null) {
        $retorno = "\npublic function " . $this->ci->lang->line('model_cadastrar') . "() {
        
                
        \$post = \$this->input->post(); 
        if (!empty(\$post)) {
           
            " . $this->form_valitador($nome_view, $rules, $rules_ativo) . "
                
            \$this->load->model('" . $nome_model . "');
            \$insert_result = \$this-> " . $nome_model . "->".$this->ci->lang->line('model_cadastrar')."();
            
            \$this->session->set_flashdata('insert_result', \$insert_result);
            " . $this->form_valitador_close($rules_ativo) . "
        }
        redirect(base_url() . '" . $nome_view . "');
    }";
        return $retorno;
    }

    /*
     * eu gero esta parte para ser chamada por uma view de listar sempre.
     */

    public function escreve_atualizar($nome_view, $nome_model, $rules = null, $rules_ativo = null) {
        $retorno = "\npublic function atualizar() {
        
                
        \$post = \$this->input->post();
        if (!empty(\$post)) {
        \$config['error_prefix'] = '<div class=\"error_prefix\">';
        \$config['error_suffix'] = '</div>';
        \$this->load->library('form_validation',\$config);
        
        
            " . $this->form_valitador($nome_view, $rules, $rules_ativo) . "            
                
            \$this->load->model('" . $nome_model . "');
            \$insert_result = \$this-> " . $nome_model . "->update();
        
         " . $this->form_valitador_close($rules_ativo) . " 
        \$this->session->set_flashdata('insert_result', \$insert_result);
        }
        redirect(base_url() . '" . $nome_view . "');
    }";
        return $retorno;
    }

    /*
     * uma view para atualizar um item
     */

    public function escreve_atualizar_view($nome_view, $nome_model, $primary_key) {
        $pk = "";
        $id = "";
        foreach ($primary_key as $key) {
            $pk .= "\n $" . $key . "= \$this->input->post('" . $key . "');";

            $id .= "\$" . $key . ",";
        }
        $id = rtrim($id, ',');

        $retorno = "
   public function edita_um() {

                
        \$this->load->model('" . $nome_model . "');
        " . $pk . "
        \$" . $nome_view . " = \$this-> " . $nome_model . "->" . $this->ci->lang->line('model_busca_um') . "(" . $id . ");
        \$data['item']= \$" . $nome_view . ";
        
        " . $this->cabecalho . "
        
        \$this->load->view('" . $nome_view . "/editar', \$data);
        \$this->load->view('layout/web_footer');
    }";
        return $retorno;
    }

    /*
     * eu gero esta parte para ser chamada por uma view de listar sempre.
     */

    public function escreve_excluir($nome_view, $nome_model, $rules = null, $rules_ativo = null) {
        $retorno = "\npublic function excluir() {
               \$post = \$this->input->post();
        if (!empty(\$post)) {
       " . $this->form_valitador($nome_view, $rules, $rules_ativo) . "
              
            \$this->load->model('" . $nome_model . "');
            \$this-> " . $nome_model . "->excluir();
        }
        " . $this->form_valitador_close($rules_ativo) . "
        \nredirect(base_url() . '" . $nome_view . "');
    }
}";
        return $retorno;
    }

    public function form_valitador($nome_view, $rules, $ativo = 0) {
        $retorno = "";
        if ($ativo==1) {
            $retorno = "\$config['error_prefix'] = '<div class=\"error_prefix\">';
            \$config['error_suffix'] = '</div>';
            \$this->load->library('form_validation',\$config);
            
            " . $rules . "
                if (\$this->form_validation->run() == FALSE)
                {
        redirect(base_url() . '" . $nome_view . "');
                }
                else
                {
    ";
        }
        return $retorno;
    }

    public function form_valitador_close($ativo = true) {
        $retorno = "";
        if ($ativo) {
            $retorno = "}";
        };
        return $retorno;
    }

}
