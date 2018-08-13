<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ConversaoLib {

        public  function valorRealParaBD($valor) {
        $valor = str_replace("R$", "", $valor);
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", ".", $valor);
        return $valor;
        }
        
        public function dataParaBD($data){
            return  implode("-", array_reverse(explode("/", $data)));
        }
        

}