<?php

//public function  send_email(){
//      date_default_timezone_set('America/Sao_Paulo');
//      $this->load->library('email');
//        $config['protocol'] = "smtp";
//
//        $config['smtp_host'] = "ssl://smtp.gmail.com";
//        $config['smtp_port'] = "465";
//        $config['smtp_user'] = "gustavoeuroplus@gmail.com";
//        $config['smtp_pass'] = "Euro@365";
//        $config['charset'] = "utf-8";
//        $config['mailtype'] = "html";
//        $config['newline'] = "\r\n";
//
//      
//        $this->email->initialize($config);
//
//        $this->email->from('gustavoeuroplus@gmail.com', 'Gustavo Europlus');
////        $list = array('xxx@gmail.com');
//        $this->email->to('gustavoeuroplus@gmail.com');
////        $this->email->reply_to('my-email@gmail.com', 'Explendid Videos');
//        $this->email->subject('Teste de envio do gmail através do codeigniter');
//        $this->email->message('It is working. Great!');
////        $this->email->send();
//       if ($this->email->send()) {
//            echo "e-mail enviado";
//        } else {
//            echo $this->email->print_debugger();
//        }
//    }
//    }