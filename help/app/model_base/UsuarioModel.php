<?php

   
   
    
    

class  UsuarioModel extends CI_Model {
    
var $id_usuario;
 var $usuario;
 var $senha;
 var $email;
 var $id_nivel_usuario;
 var $ativo;
 var $id_dono_bonus;
 var $nome_completo;
 var $nome_completo_agencia;
 var $id_banco;
 var $agencia;
 var $conta_corrente;
 var $id_estado;
 var $telefone;
 var $atualizado;
   
var $array_variaveis = ['id_usuario','usuario','senha','email','id_nivel_usuario','ativo','id_dono_bonus','nome_completo','nome_completo_agencia','id_banco','agencia','conta_corrente','id_estado' ,'telefone'];

    public function __construct() {
        parent::__construct();
    }
/**
 * 
 * @return type
 */
    function insert() {

        $post = $this->input->post();
        
//        if ($post && $id_cliente==NULL) {
            foreach ($this->array_variaveis as $value) {
                if (isset($post[$value])) {
                    $this->$value = $post[$value];
                }
            }
            if ($this->id_dono_bonus==2){
                $this->nome_completo = $this->nome_completo_agencia;
            }
            $this->senha = md5($this->senha);
            $this->ativo = 0;
            $this->id_nivel_usuario = 3;
            
            $this->db->insert('tb_usuario', $this);
            return  $this->db->insert_id();


        
    }

    
//function insert_old() {
//        $post = $this->input->post();
//  
////        $this->usuario = $post["usuario"];
////        $this->senha = md5('');
////        $this->ativo = 1;   
////        $this->id_nivel_usuario = 3;
//        
////        $this->db->insert('Tb_usuario', $this);
//        $this->id_usuario = $this->db->insert_id();
//        return $this->id_usuario;
//    }

    function busca_todos($nivel_usuarios = NULL) {
        if (isset($nivel_usuarios)){
            $this->db->where('id_nivel_usuario',$nivel_usuarios);
        }
        
        $query = $this->db->get('tb_usuario');
        return $query->result();
    }

    function busca_todos_nivel_usuario() {


        $query = $this->db->get('tb_nivel_acesso');
        return $query->result();
    }
/**
 * 
 * @param int $id
 * @param string $usuario
 * @return usuario
 */
    function busca_um($id=NULL,$usuario = NULL) {
        if (isset($id)) {
            $this->db->where('id_usuario', $id);
        }
         if (isset($usuario)) {
            $this->db->where('usuario', $usuario);
        }
       $query = $this->db->get('tb_usuario');
        return $query->result();
    }
    

    function update() {
        $post = $this->input->post();
       
        
        $this->db->where('id_usuario', $post['id_usuario']);
        $query = $this->db->get('tb_usuario')->result();

        $query = $query[0];
        foreach ($this->array_variaveis as $value) {
            $this->$value = $query->$value;
        }
        
  foreach ($this->array_variaveis as $value) {
            if (isset($post[$value])) {
                if ($post[$value] != null) {
                    $this->$value = $post[$value];
                }
            }
        }
        
        $this->atualizado=1;
        $this->db->where('id_usuario', $this->id_usuario);
        $retorno = $this->db->update('tb_usuario', $this);
        return $retorno;
    }

    function trocaDeSenha() {
        $post = $this->input->post();
        $this->db->where('id_usuario', $post['id_usuario']);
        $query = $this->db->get('tb_usuario')->result();

        $query = $query[0];
        foreach ($this->array_variaveis as $value) {
            $this->$value = $query->$value;
        }

        $this->senha = md5($post['senha']);

        $this->db->where('id_usuario', $this->id_usuario);
        $retorno = $this->db->update('tb_usuario', $this);

        return $retorno;
    }

}
