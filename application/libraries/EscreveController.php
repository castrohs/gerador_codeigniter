<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EscreveController {
   function writeController($pasta_do_sistema,$nome_arquivo,$escrita){

$file = fopen($pasta_do_sistema. "//application//controllers//".$nome_arquivo.".php","w");
 fwrite($file,$escrita);
fclose($file);

}

function escreve_controller($nome_view,$nome_model) {
    
      $controller = "
          <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class " . $nome_view . " extends CI_Controller {
\n
    
    \n
    function __construct() {
        parent::__construct();
       
    }

    public function index() {
        \$this->listar();
    }
    \n

    public function listar() {
        \$this->SessaoModel->verificaSessaoAtivaSeNaoLogout();\n
        \$data['title'] = 'Lista de $nome_view';
        \$this->load->view('layout/web_head', \$data);
        
        

     \$data['menus'] = \$this->MenuModel->menus();\n      
     \$this->load->view('layout/menu', \$data);
        
        \$this->load->model('" . $nome_model . "');
        \$data['busca_todas']= \$this-> " . $nome_model . "->busca_todos();
            
            
        \$data['insert_result'] = \$this->session->flashdata('insert_result');
        \$this->load->view('" . $nome_view . "/listar', \$data);
        \$this->load->view('layout/web_footer');
    }
\n

    public function cadastrar() {
        \$this->SessaoModel->verificaSessaoAtivaAdminSeNaoLogout();
        \$post = \$this->input->post();
        
        if (!empty(\$post)) {
            \$this->load->model('" . $nome_model . "');
            \$insert_result = \$this-> " . $nome_model . "->insert();
        }
        \$this->session->set_flashdata('insert_result', \$insert_result);
        redirect(base_url() . '" . $nome_view . "');
    }

   \n
    public function atualizar() {
        \$this->SessaoModel->verificaSessaoAtivaAdminSeNaoLogout();
        \$post = \$this->input->post();
        if (!empty(\$post)) {
            \$this->load->model('" . $nome_model . "');
            \$insert_result = \$this-> " . $nome_model . "->update();
        }
        \$this->session->set_flashdata('insert_result', \$insert_result);
        redirect(base_url() . '" . $nome_view . "');
    }
\n
    public function atualizar" . $nome_view . "(\$id) {
        \$this->SessaoModel->verificaSessaoAtivaSeNaoLogout();
        \$data['title'] = 'Atualizar " . $nome_view . "';
            
        \$this->load->view('layout/web_head', \$data);
        \$this->load->model('" . $nome_model . "');
        \$" . $nome_view . " = \$this-> " . $nome_model . "->busca_um(\$id);
        
        

   \n
        \$data['" . $nome_view . "']= \$" . $nome_view . "[0];
\$data['menus'] = \$this->MenuModel->menus();\n      
     \$this->load->view('layout/menu', \$data);
        
        \$this->load->view('" . $nome_view . "/editar', \$data);
        \$this->load->view('layout/web_footer');
    }
\n
   

    public function excluir() {
        \$this->SessaoModel->verificaSessaoAtivaAdminSeNaoLogout();
        \$post = \$this->input->post();
        if (!empty(\$post)) {
            \$this->load->model('" . $nome_model . "');
            \$this-> " . $nome_model . "->excluir();
        }

        redirect(base_url() . '" . $nome_view . "');
    }


}

?>
"; 
return $controller;
} 
}