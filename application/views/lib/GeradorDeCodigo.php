<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class GeradorDeCodigo {
    

function gerador_de_codigos($length=16)
{
 $salt = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
 $len = strlen($salt);
 $pass = '';
 mt_srand(10000000*(double)microtime());
 for ($i = 0; $i < $length; $i++)
 {
   $pass .= $salt[mt_rand(0,$len - 1)];
 }
 return $pass;
}
//

function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
    
}


}