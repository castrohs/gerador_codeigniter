<?php

class DBA extends CI_Model {
    
    var $novo_banco;
    var $hostname;
    var $administrador;
    var $senha='';
    var $quantas_letras_remover;
    
    var $db1;
    public function __construct() {

        parent::__construct();
    }
    
    
    function busca_lista_de_tabelas($db1) {
        
        return $db1->query("show tables")->result();
    }
    function conecta($banco) {
        
        $this->novo_banco=$banco;
          
        $config['hostname'] = $this->hostname ;
        $config['username'] = $this->administrador;
        $config['password'] = $this->senha;
        $config['database'] = $this->novo_banco;
        $config['dbdriver'] = 'mysqli';
        $config['dbprefix'] = '';
        $config['pconnect'] = FALSE;
        $config['db_debug'] = TRUE;
        $config['cache_on'] = FALSE;
        $config['cachedir'] = '';
        $config['char_set'] = 'utf8';
        $config['dbcollat'] = 'utf8_general_ci';
        
        $this->db1 = $this->load->database($config,true);
        
    return $this->db1;    
    
    
    
    }
   
    function busca_lista_de_banco_de_dados($db) {
        
        $teste =  $db->query("show databases");
        
        return $teste->result();
    }

    function descreve_uma_tabela($table) {

        $sql = "DESCRIBE " . $table;

        return $this->db1->query($sql)->result();
    }

    function busca_todas_referencias($table) {
        $sql = "SELECT 
                `TABLE_SCHEMA`,                          -- Foreign key schema
                `TABLE_NAME`,                            -- Foreign key table
                `COLUMN_NAME`,                           -- Foreign key column
                `REFERENCED_TABLE_SCHEMA`,               -- Origin key schema
                `REFERENCED_TABLE_NAME`,                 -- Origin key table
                `REFERENCED_COLUMN_NAME`                 -- Origin key column
              FROM
                `INFORMATION_SCHEMA`.`KEY_COLUMN_USAGE`  -- Will fail if user don't have privilege
              WHERE
                `TABLE_SCHEMA` = SCHEMA()                -- Detect current schema in USE 
                AND `REFERENCED_TABLE_NAME` IS NOT NULL  -- Only tables with foreign keys
                and TABLE_NAME = '" . $table . "';";



        return $this->db1->query($sql)->result();
    }

}
