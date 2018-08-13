<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class GeradorDeCodigo {
    
    ////gerando alfa de 6 caracteres
//echo uniqueAlfa(6);
////gerando alfa de 16 caracteres - padrao da function
////echo uniqueAlfa();

        

function voucher($length=16)
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

}