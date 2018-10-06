<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EscreveModel {

    var $ci;

    function writeModel($pasta_do_sistema, $nome_arquivo, $escrita) {

        $file = fopen($pasta_do_sistema . "//application//models//" . $nome_arquivo . "Model.php", "w");
        fwrite($file, $escrita);
        fclose($file);
    }

    function escreve_model($nome_model, $nome_tabela, $variaveis, $variaveis_array, $id_tabela) {
        $this->ci = &get_instance();
        $join = "";
        if (!empty($nome_tabela)) {

            $join = $this->escreve_join($nome_tabela);
        }

        $query_where_primary_key = '';
        $query_where_input = '';
        $query_where_busca_um = '';
        $query_where_busca_um_quantidade = 0;
        $j = 0;

        foreach ($id_tabela as $key => $id) {

            $query_where_primary_key .= ' ' . '$this->db->where("' . $nome_tabela . "." . $id . '", $post["' . $id . '"]);';
            $query_where_input .= 'if (!empty( $id' . $j . ')){';
            $query_where_input .= '$this->db->where("' . $nome_tabela . "." . $id . '", $id' . $j . ');';
            $query_where_input .= '}';
            $query_where_busca_um .= '$id' . $j . '=null,';
            $query_where_busca_um_quantidade++;

            $j = $j + 1;
        }
        $query_where_busca_um = substr($query_where_busca_um, 0, -1);

        $model = "<?php
class  " . $nome_model . " extends CI_Model {
    " .
                $variaveis
                . "
   \nvar \$array_variaveis = [" . $variaveis_array . " ];

    public function __construct() {
  
        parent::__construct();
    }
 
";


        $model .= "\n" . $this->escreve_insert($nome_tabela);
        $model .= "\n" . $this->escreve_update($nome_tabela, $query_where_primary_key);
        $model .= "\n" . $this->escreve_busca_todos($nome_tabela, $join);
        $model .= "\n" . $this->escreve_busca_um($nome_tabela, $query_where_busca_um, $query_where_input, $join, $query_where_busca_um_quantidade);
        $model .= "\n" . $this->escreve_busca_um_array($nome_tabela, $join);
        $model .= "\n" . $this->escreve_excluir($nome_tabela, $query_where_primary_key);
        $model .= "\n}";
        return $model;
    }

    public function escreve_insert($nome_tabela) {
        $retorno = "function ".$this->ci->lang->line('model_cadastrar')."() {
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
        
        
    }";
        return $retorno;
    }

    public function escreve_update($nome_tabela, $query_where_primary_key) {
        $retorno = " function update() {
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
    }";
        return $retorno;
    }

    public function escreve_busca_todos($nome_tabela, $join) {
        $retorno = " function " . $this->ci->lang->line('model_busca_todos') . "(\$limit=null, \$apartir_de_que_registro=null) {       
    \$this->db->reset_query();
        if(!empty(\$limit)){
            \$this->db->limit(\$limit, \$apartir_de_que_registro);
        }
        " . $join . "
        \$query = \$this->db->get('" . $nome_tabela . "');
        return \$query->result();
    }
    ";
        return $retorno;
    }

    public function escreve_busca_um($nome_tabela, $query_where_busca_um, $query_where_input, $join, $query_where_busca_um_quantidade) {

        $sizeof = "";
        if ($query_where_busca_um_quantidade == 1) {
            $sizeof = " if(sizeof(\$result) > 0){
          return \$result[0];
        }else{
            return null;
        }";
        } else {
            $sizeof = " if(sizeof(\$result) > 0){
          return \$result;
        }else{
            return null;
        }";
        }
        $retorno = "function " . $this->ci->lang->line('model_busca_um') . "(" . $query_where_busca_um . ") {
        \n\$this->db->reset_query();\n       
         " . $query_where_input . "
          " . $join . "
        \$query = \$this->db->get('" . $nome_tabela . "');
       \$result= \$query->result();
       " . $sizeof . "
       
    }";
        return $retorno;
    }

    public function escreve_busca_um_array($nome_tabela, $join) {
        $retorno = "  
        /*
        \$arry_where = array(
                    'campo'=>\$cliente
                        );
  */                      
  function " . $this->ci->lang->line('model_busca_um_array') . "(\$arry_where) {
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
";
        return $retorno;
    }

    public function escreve_excluir($nome_tabela, $query_where_primary_key) {
        $retorno = "function " . $this->ci->lang->line('model_excluir') . "() {
        \$this->db->reset_query();
        \$post = \$this->input->post();
        " . $query_where_primary_key . "
        \$this->db->delete('" . $nome_tabela . "');
        \$this->load->model('LogModel');
        \$log = new LogModel();
        \$log->insert(\$this->db->select());
    }
    ";
        return $retorno;
    }

    public function escreve_join($tabela) {
        $this->ci = & get_instance();

        $referencias = $this->ci->DBA->busca_todas_referencias($tabela);
        $join = "";
        if (!empty($referencias)) {

            foreach ($referencias as $key => $referencia) {
//                var_dump($referencia);
                $join .= "\n\$this->db->join('" . $referencia->REFERENCED_TABLE_NAME . "', '" . $tabela . "." . $referencia->COLUMN_NAME . " = " . $referencia->REFERENCED_TABLE_NAME . "." . $referencia->REFERENCED_COLUMN_NAME . "');";
            }
            return $join;
        }
    }

}
