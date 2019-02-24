<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Util {

    public function now($formato = 'Y-m-d H:i:s') {
        $tz_object = new DateTimeZone('America/Sao_Paulo');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format($formato);
    }

    public function proximoMes($formato = 'm', $de_uma_data = null) {
        if (isset($de_uma_data)) {

            return $date = date($formato, strtotime('+1 month', $de_uma_data));
        } else {
            return date($formato, strtotime('+1 month'));
        }
    }

    function getDatetimeNow() {
        $tz_object = new DateTimeZone('America/Sao_Paulo');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y\-m\-d\ H:i:s');
    }
   
            function calculaIdade($data) {
        if (!empty($data) && $data != '0000-00-00') {
            // Separa em dia, mês e ano
            list($dia, $mes, $ano) = explode('/', $data);

            $now = $this->now();
            $now_ano = $this->now('Y');
            $aniversario = $this->now('Y-' . $mes . "-" . $dia." h:i:s");
            $diff_anos = $now_ano-$ano ;

            $diff=$this->diferencaDeDatas($now, $aniversario);
            
            if($diff<0){
                return $diff_anos;
            }else{
                 return $diff_anos-1;
            }
            
        } else {
            return -1;
        }
    }
    

    function diferencaDeDatas($hoj, $aniver) {

        $date1 = date_create($hoj);
        $date2 = date_create($aniver);
        $diff = date_diff($date1, $date2);
        
//        $retorno = $diff->format("%d");
        
        
        if ($date1 > $date2)
            return -1;
        else {
            return $diff->days;
        }
    }

}
