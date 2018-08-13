<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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
        if ($this->verificaSessao()) {
            redirect(base_url('usuario/usuario_logado'));
        } else {
            $this->login();
        }
    }

    public function det($id_usuario = NULL) {
//             $data["title"] = "Atualizar usuario";;

        if (isset($id_usuario) && $id_usuario == $_SESSION["id_usuario"]) {
            $data["title"] = "Edita um usuario";
//                $this->load->view('layout/web_head', $data);;
            $this->load->model('UsuarioModel');
            $this->load->model('BancosModel');
            $usuario = $this->UsuarioModel->busca_um($id_usuario);
            $data['usuario'] = $usuario[0];
            $data["bancos"] = $this->BancosModel->busca_todos();
            $this->load->model("EstadosModel");
            $data["estados"] = $this->EstadosModel->busca_todos();

//            var_dump($_SESSION["id_usuario"]);

            $this->load->view('usuario/atualizar', $data);
//                $this->load->view('layout/web_footer');
        } else {
            $this->det($_SESSION["id_usuario"]);
        }
    }

    public function inserir() {

        $usuario_novo = filter_input_array(INPUT_POST);

        if (isset($usuario_novo)) {
            $this->load->model('UsuarioModel');

            $insert_result = $this->UsuarioModel->insert();
//            ECHO "$insert_result". ($insert_result);
//            $this->session->set_flashdata('insert_result', $insert_result);
            $usuario = $this->UsuarioModel->busca_um($insert_result);
//              var_dump($usuario);;
            $this->SessaoModel->logar($usuario[0]);
        }

        redirect(base_url() . "Usuario/autenticar");
    }

    public function cadastrar() {

        $this->verificaSessaoAdmin();

        $data["title"] = "Cadastro de usuario";
        $this->load->view('layout/web_head', $data);
//            $this->load->model('FunerariaModel');
        $this->load->model('UsuarioModel');
//        $data['busca_todas_funerarias'] = $this->FunerariaModel->busca_todos();
        $data['busca_acessos'] = $this->UsuarioModel->busca_todos_nivel_usuario();

        $menu["menus"] = $this->MenuModel->menus();
        $this->load->view('layout/menu', $menu);


        $this->load->view('Usuario/cadastrar', $data);
        $this->load->view('layout/web_footer');
    }

    public function listar() {

        if($this->SessaoModel->isAdmin()){

        $data["title"] = "Listagem de usuario";
        $this->load->view('layout/web_head', $data);
        $this->load->model('UsuarioModel');
        $data['todos_usuarios'] = $this->UsuarioModel->busca_todos();
        $data["grupos_acessos"] = $this->UsuarioModel->busca_todos_nivel_usuario();
        $menu["menus"] = $this->MenuModel->menus();
        $this->load->view('layout/menu', $menu);

        $this->load->view('usuario/listar', $data);
        $this->load->view('layout/web_footer');
        }else{
            $this->usuario_logado();
        }
    }

    public function trocaDeSenha($id = null) {

        $this->verificaSessao();
        $usuario_novo = filter_input_array(INPUT_POST);
        if (isset($usuario_novo)) {
            $this->load->model('UsuarioModel');

            $insert_result = $this->UsuarioModel->trocaDeSenha();
            if (!$this->verificaSessaoAdmin()) {
                $this->SessaoModel->logout();
            } redirect(base_url() . "Usuario/logout");
        } else {
            if ($_SESSION["id_usuario"] == $id) {
                $data["title"] = "Troca de Senha";
                $this->load->view('layout/web_head', $data);
                $this->load->model('UsuarioModel');
                $data['todos_usuarios'] = $this->UsuarioModel->busca_um($id);
                $menu["menus"] = $this->MenuModel->menus();
                $this->load->view('layout/menu', $menu);
                $this->load->model("UsuarioModel");
                $data["grupos_acessos"] = $this->UsuarioModel->busca_todos_nivel_usuario();
                $this->load->view('usuario/trocaSenha', $data);
                $this->load->view('layout/web_footer');
            } else {
                $data["title"] = "Troca de Senha";
                $this->load->view('layout/web_head', $data);
                $menu["menus"] = $this->MenuModel->menus();
                $this->load->view('layout/menu', $menu);
//                $this->load->view('inicio');
                $this->load->view('layout/web_footer');
            }
        }
    }

    public function editar($id = null) {

        $this->verificaSessao();
        $usuario_novo = filter_input_array(INPUT_POST);


        if (isset($usuario_novo)) {
            $this->load->model('UsuarioModel');


            $insert_result = $this->UsuarioModel->update();
            if ($insert_result == 1) {
                $insert_result = "Atualizado com sucesso";
            }
            $this->session->set_flashdata('insert_result', $insert_result);
            redirect(base_url("Usuario/listar"));
//            $this->det($id);
        } else {

            if ($this->verificaSessaoAdmin()) {
                $data["title"] = "Troca de Senha";
                $this->load->view('layout/web_head', $data);
                $this->load->model('UsuarioModel');
                $data['todos_usuarios'] = $this->UsuarioModel->busca_um($id);
                $menu["menus"] = $this->MenuModel->menus();
                $this->load->view('layout/menu', $menu);
                $this->load->model("UsuarioModel");
                $data["grupos_acessos"] = $this->UsuarioModel->busca_todos_nivel_usuario();
                $this->load->view('usuario/editar', $data);
                $this->load->view('layout/web_footer');
            } else {
                $data["title"] = "Troca de Senha";
                $this->load->view('layout/web_head', $data);
                $menu["menus"] = $this->MenuModel->menus();
                $this->load->view('layout/menu', $menu);
//                $this->load->view('inicio');
                $this->load->view('layout/web_footer');
            }
        }
    }
/*
 * carrega o usuario
 */
    public function usuario_logado() {
        $this->verificaSessao();
        $this->load->model('UsuarioModel');
        $usuario = $this->UsuarioModel->busca_um($_SESSION["id_usuario"]);
        $usuario = $usuario[0];
        if ($usuario->atualizado) {
            $data['usuario'] = $usuario;
            $this->load->view('layout/web_head');
            $title["menus"] = $this->MenuModel->menus();
            $this->load->view('layout/menu', $title);
            $this->load->model('CarteiraModel');

//        $data['insert_result'] = $this->session->flashdata('insert_result');
            $valores_totais = $this->CarteiraModel->busca_todos($_SESSION["id_usuario"]);


//            
            $valor_total = 0;
            foreach ($valores_totais as $valor) {
                $valor_total = $valor->valor + $valor_total;
            }
            $data['valor_total'] = $valor_total;
            $data['bonus_a_ser_pago'] = intval($valor_total / 3500.00) * 50;
            $data['bunus_a_ser_completado'] = $valor_total - (intval($valor_total / 3500.00) * 3500);

            $this->load->view('image_super_bonus', $data);

            $this->load->view('layout/web_footer');
        } else {
            $this->det($usuario->id_usuario);
        }
    }

    public function autenticar() {

        $this->usuario_logado();
    }

    public function atualizar() {
        $this->verificaSessao();
        $novo_usuario = filter_input_array(INPUT_POST);
        if (isset($novo_usuario)) {
            $this->load->model('UsuarioModel');
            $insert_result = $this->UsuarioModel->update();

            $this->session->set_flashdata('insert_result', $insert_result);
        }

        redirect(base_url('Usuario'));
    }

    public function login() {

        $usuario = filter_input(INPUT_POST, 'usuario');
        $senha = md5(filter_input(INPUT_POST, 'senha'));

        $query = $this->db->query("SELECT * FROM tb_usuario WHERE usuario = ? AND senha = ? AND ativo = 1", array($usuario, $senha));

        if ($query->num_rows() > 0) {
            $this->SessaoModel->logar($query->row());
//             redirect(base_url('usuario/usuario_logado'));
            $this->usuario_logado();
        } else {
            if (isset($usuario)) {
                $data["erro_login"] = "Seu usuário ou senha estão incorretos";
            }
            $this->SessaoModel->logout();
            $data["menus"] = $this->MenuModel->menus();
            $this->load->model("BancosModel");
            $data["bancos"] = $this->BancosModel->busca_todos();
            $this->load->model("EstadosModel");
            $data["estados"] = $this->EstadosModel->busca_todos();
            $this->load->view('inicio', $data);
        }
    }

    public function logout() {

        $this->SessaoModel->logout();
        redirect(base_url());
    }

    public function verificaSessao() {
        if (!$this->SessaoModel->verificaSessao()) {
            redirect(base_url("welcome"));
        } else {
            return true;
        }
    }

    public function verificaSessaoAdmin() {
        if (!$this->SessaoModel->isAdmin()) {
            redirect(base_url() . "Autenticacao_Usuario");
            return false;
        } else {
            return true;
        }
    }

}
