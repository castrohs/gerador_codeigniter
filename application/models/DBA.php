<?php



class  DBA extends CI_Model {
    
   
     public function __construct() {
   

        parent::__construct();
    }

    
    function busca_lista_de_tabelas() {



return $this->db->query( "show tables")->result();
        
    }
   
    function descreve_uma_tabela($table) {

$sql = "DESCRIBE ". $table;

return $this->db->query( $sql)->result();
        
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
  and TABLE_NAME = ".$table.";";



return $this->db->query( $sql)->result();
        
    }
    
    
//    function show_databases() {
//        $sql = "show databvase"
//;
//        return $this->db->query( $sql)->result();
//
//        
//    }
}