<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EscreveMysqlBackup {
  
    var $ci;

    function gera($onde_salvar,$tabelas) {
        $this->ci = &get_instance();
        $retorno = '';
      
        foreach ($tabelas as $tabela) {
            
            $tabela_temp = 'Tables_in_'.$this->ci->novo_banco;
            $tabela_temp = $tabela->$tabela_temp;
            $retorno.='mysqldump -h '.$this->ci->DBA->hostname.' -u'.$this->ci->DBA->administrador.' -p'.$this->ci->DBA->senha.' '.$this->ci->novo_banco.' '.$tabela_temp.' > "'.$onde_salvar.''.$this->ci->novo_banco.'-'.$tabela_temp.'-$DATA-$HORA.sql"'." \n " ;
          
        }
        return $retorno;
         
        }

        
}
