<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EscreveModel {

    function writeModel($pasta_do_sistema, $nome_arquivo, $escrita) {

        $file = fopen($pasta_do_sistema . "//application//models//" . $nome_arquivo . "Model.php", "w");
        fwrite($file, $escrita);
        fclose($file);
    }

    function escreve_model($nome_model, $nome_tabela, $variaveis, $variaveis_array, $id_tabela) {
        $join = "";
        if (!empty($nome_tabela)) {

            $join = $this->escreve_join($nome_tabela);
        }

        $query_where_primary_key = '';
        $query_where_input = '';
        $query_where_busca_um = '';
        $j = 0;

        foreach ($id_tabela as $key => $id) {

            $query_where_primary_key .= '$this->db->where("' . $id . '", $post["' . $id . '"]);';
            $query_where_input .= 'if (!empty( $id' . $j . ')){';
            $query_where_input .= '$this->db->where("' . $id . '", $id' . $j . ');';
            $query_where_input .= '}';
            $query_where_busca_um .= '$id' . $j . '=null,';

            $j = $j + 1;
        }
        $query_where_busca_um = substr($query_where_busca_um, 0, -1);


        $model = "
   <?php
class  " . $nome_model . " extends CI_Model {
    " .
                $variaveis
                . "
   \nvar \$array_variaveis = [" . $variaveis_array . " ];
\n
    public function __construct() {
   \n
        parent::__construct();
    }
\n
    function insert() {
        \$post = \$this->input->post();
        foreach (\$this->array_variaveis as \$value) {
            if (!empty(\$post[\$value])) {
                \$this->\$value = \$post[\$value];
            }
        }
\n
        \$retorno = \$this->db->insert('" . $nome_tabela . "', \$this);
         // \$retorno = \$this->db->insert_id();
         if (\$this->db->error()['code'] == 1062) {
           return \$retorno =-1;
        }
         
            \$this->load->model('LogModel');
        \$log = new LogModel();
        \$log->insert(\$this->db->select());
     
           
           return \$retorno;
        
        
    }
   \n

    function update() {
        \$post = \$this->input->post();
       \n\$this->db->reset_query();\n
    " . $query_where_primary_key . "
        
        \$query = \$this->db->get('" . $nome_tabela . "')->result();

        \$query = \$query[0];
        foreach (\$this->array_variaveis as \$value) {
            \$this->\$value = \$query->\$value;
        }

        foreach (\$this->array_variaveis as \$value) {
            if (!empty(\$post[\$value])) {
                if (\$post[\$value] != null) {
                    \$this->\$value = \$post[\$value];
                }
            }
        }

        " . $query_where_primary_key . "
        \$retorno = \$this->db->update('" . $nome_tabela . "', \$this);
       \$this->load->model('LogModel');
        \$log = new LogModel();
        \$log->insert(\$this->db->select());     
        return \$retorno;
    }
\n
    function busca_todos(\$limit=null, \$apartir_de_que_registro=null) {       
    \n\$this->db->reset_query();\n
        if(!empty(\$limit)&&!empty(\$apartir_de_que_registro)){
            \$this->db->limit(\$limit, \$apartir_de_que_registro);
        }
        " . $join . "
        \$query = \$this->db->get('" . $nome_tabela . "');
        return \$query->result();
    }
\n
    function busca_um(" . $query_where_busca_um . ") {
\n\$this->db->reset_query();\n       
         " . $query_where_input . "
          " . $join . "
        \$query = \$this->db->get('" . $nome_tabela . "');
       \$result= \$query->result();
       
        if(sizeof(\$result) > 0){
          return \$result[0];
        }else{
            return null;
        }
    }
\n


/*\$arry_where = array(
                    'campo'=>\$cliente
                        );
  */                      
    function busca_um_array(\$arry_where) {
       foreach (\$arry_where as \$key => \$value) {
               \$this->db->where(\$key, \$value);
        }
          " . $join . "
        \$query = \$this->db->get('" . $nome_tabela . "');
       \$result= \$query->result();
       
        if(sizeof(\$result) > 0){
          return \$result;
        }else{
            return null;
        }

    }
\n
    function excluir() {
        \n\$this->db->reset_query();\n
        \$post = \$this->input->post();
        
        " . $query_where_primary_key . "
        \$this->db->delete('" . $nome_tabela . "');
            \$this->load->model('LogModel');
        \$log = new LogModel();
        \$log->insert(\$this->db->select());
    }
\n
}

";

        return $model;
    }

    public function escreve_join($tabela) {
        $ci = & get_instance();

        $referencias = $ci->DBA->busca_todas_referencias($tabela);
        $join = "";
        if (!empty($referencias)) {

            foreach ($referencias as $key => $referencia) {

                $join .= "\n\$this->db->join('" . $tabela . "', '" . $tabela . "." . $referencia->COLUMN_NAME . " = " . $referencia->REFERENCED_TABLE_NAME . "." . $referencia->REFERENCED_COLUMN_NAME . "');";
            }
            return $join;
        }
    }

}
