<?php

/**
 * Created by PhpStorm.
 * User: Lamarques
 * Date: 21/10/2015
 * Time: 14:27
 */
class MenuModel extends CI_Model {

    var $id_usuario;
    var $posicao;
    var $id_nivel_acesso;
    var $titulo;
    var $id_menu;
    var $id_menu_pai;
    var $caminho;
    var $style_class_span;
    var $class_span;
    var $style_span_titulo;
    var $style_class_b;
    var $class_b;
    var $array_variaveis = [
        'id_menu', 'id_menu_pai', 'id_nivel_acesso', 'id_usuario',
        'titulo', 'caminho', 'style_class_span', 'class_span', 'posicao',
        'style_span_titulo', 'style_class_b', 'class_b'
    ];  

    public function __construct() {
        parent::__construct();
    }

    function insert() {
        $post = $this->input->post();
        foreach ($this->array_variaveis as $value) {

            
                $this->$value =  empty($post[$value]) ? NULL : $post[$value];
                
//                var_dump("<Br>");
        }
//        var_dump($this);
//        else{
//                $this->$value = null;
//            }
//        }
        

        $retorno = $this->db->insert('tb_menu', $this);
        return $retorno;
    }

    function update() {
        $post = $this->input->post();
//        var_dump($post);
        $this->db->where('id_menu', $post['id_menu']);
        $query = $this->db->get('tb_menu')->result();
        $query = $query[0];
        foreach ($this->array_variaveis as $value) {
            $this->$value = $query->$value;
        }

        foreach ($this->array_variaveis as $value) {
            if (isset($post[$value])) {
                
                 $this->$value =  empty($post[$value]) ? NULL : $post[$value];
                
            }
        }
        
//        var_dump($this);
//        return null;
        $this->db->where('id_menu', $this->id_menu);
        $retorno = $this->db->update('tb_menu', $this);

        return $retorno;
    }

    function all() {

        	return $this->db->get("tb_menu2")
					->result_array();
    }

    function excluir() {

        $post = $this->input->post();
        $this->db->where('id_menu', $post['id_menu']);
        $this->db->delete('tb_menu');
    }

    function menus() {

        if (isset($_SESSION['nivel'])) {

            $this->db->select("*");
            $this->db->where("id_menu_pai is null");
            $this->id_nivel_acesso = $_SESSION['nivel'];

            if ($this->id_nivel_acesso != 1) {
                $this->db->where("(id_nivel_acesso=". $this->id_nivel_acesso.' or id_nivel_acesso= 4)');
                
                
            }
            $this->db->from("tb_menu");
            $this->db->order_by('posicao');
            $this->db->order_by('titulo');
            $q = $this->db->get();
            echo ($this->db->queries);
            
            $final = array();
            if ($q->num_rows() > 0) {
                foreach ($q->result() as $row) {

                    $this->db->select("*");
                    $this->db->where("id_menu_pai", $row->id_menu);
                    if ($this->id_nivel_acesso != 1) {
                        $this->db->where("id_nivel_acesso", $this->id_nivel_acesso);
                       
                    }
                    $this->db->order_by('posicao');
                    $this->db->order_by('titulo');
                    $this->db->from("tb_menu");

                    $q = $this->db->get();
                    if ($q->num_rows() > 0) {
                        $row->children = $q->result();
                    }
                    array_push($final, $row);
                }
            }

            return $final;
        }
    }

}
