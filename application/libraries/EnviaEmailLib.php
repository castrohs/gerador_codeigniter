<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EnviaEmailLib   {

    public function envia_kate() {
    
        
        
        date_default_timezone_set('America/Sao_Paulo');
        
        $config['protocol'] = "smtp";

        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "keitieuroplus@gmail.com";
        $config['smtp_pass'] = "Euro@365";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";

        return $config;
        
      
    }

}
