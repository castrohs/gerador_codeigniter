<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

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
    function __construct() {
        parent::__construct();
     
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        $this->verificaSessaoAdmin();
        $data["title"] = "Lista de Menus";
        $this->load->view('layout/web_head', $data);
        
        $menu["menus"] = $this->MenuModel->menus();
        $this->load->model("UsuarioModel");
        $menu["grupos_acessos"] = $this->UsuarioModel->busca_todos_nivel_usuario();
        
        $this->load->view('layout/menu', $menu);
        
        
            $data['busca_todas'] = $this->MenuModel->busca_todos();
            
        $data['insert_result'] = $this->session->flashdata('insert_result');
        $this->load->view('menu/listar', $data);
        $this->load->view('layout/web_footer');
    }


    public function cadastrar() {
        $this->verificaSessao();
        $novo_menu = filter_input_array(INPUT_POST);

        if (isset($novo_menu)) {
            
            $insert_result = $this->MenuModel->insert();
        }
        $this->session->set_flashdata('insert_result', $insert_result);
        redirect(base_url() . 'Menu');
    }

    
    public function atualizar() {
        $this->verificaSessao();
        $novo_menu = filter_input_array(INPUT_POST);
        if (isset($novo_menu)) {
            
            $insert_result = $this->MenuModel->update();
        }
        $this->session->set_flashdata('insert_result', $insert_result);
        redirect(base_url() . 'Menu');
    }

    public function atualizarMenu($id) {
        $this->verificaSessao();
        $data["title"] = "Atualizar Menu";
        $this->load->view('layout/web_head', $data);
        $this->load->view('layout/menu');
        $menu = $this->busca_menu($id);
        
        if (!$this->SessaoModel->isAdmin()) {
            if ($menu->id_usuario != $_SESSION["id_usuario"]) {
                $menu=null;
            }
        }
//        var_dump($menu->id_usuario);
        $data["menu"] = $menu;


        $this->load->view('menu/editarMenu', $data);
        $this->load->view('layout/web_footer');
    }

   

    public function excluir() {
        $this->verificaSessao();
        $novo_menu = filter_input_array(INPUT_POST);
        if (isset($novo_menu)) {
            
            $this->MenuModel->excluir();
        }

        redirect(base_url() . 'Menu');
    }

   public function get_menus() {
//        
//        $menus = $this->your_model->menus();
//        $data = array('menus' => $menus);
//        $this->load->view('page1', $data);
       
        $data["menus"]=$this->MenuModel->menus();
        $this->load->view('layout/menu',$data);
        
    }

    public function verificaSessao() {
        if (!$this->SessaoModel->verificaSessao()) {
            redirect(base_url() . "Autenticacao_Usuario");
        }
    }

       public function verificaSessaoAdmin() {
        if (!$this->SessaoModel->isAdmin()) {
            redirect(base_url() . "Autenticacao_Usuario");
        }else{
            return true;
        }
    }

}
