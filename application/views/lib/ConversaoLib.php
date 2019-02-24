<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ConversaoLib {

    public function valorRealParaBD($valor) {
        $valor = str_replace("R$", "", $valor);
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", ".", $valor);
        
       
        return $valor;
    }
    public function valordbparareal($valor, $formato = null) {
        return $this->valorBDParaReal($valor, $formato);
    } 

    public function valorBDParaReal($valor, $formato = null) {
//
    
        if (!empty($valor)){
//            $valor = number_format($valor, $formato);
            $valor = number_format($valor,2,',','.');
//
//        $valor = str_replace(",", ";", $valor);
//        
//        $valor = str_replace(".", ",", $valor);
//        $valor = str_replace(";", ".", $valor);


        return $valor;}
        else{
            return 0;
        }
    }

    public function valorDolarParaBD($valor =null) {
        if (isset($valor)){
            $valor = str_replace("$", "", $valor);        
            return $valor;
        }
        else{
            return 0;
        }
    }
    public function valor_real_para_pagarme($valor =null) {
        if (isset($valor)){
            $valor = number_format($valor, 2);
            $valor = str_replace("R$", "", $valor);        
            $valor = str_replace("$", "", $valor);        
            $valor = str_replace(",", "", $valor);
            $valor = str_replace(".", "", $valor);
            
            return $valor;
        }
        else{
            return 0;
        }
    }
    public function cpf_cnpj_para_pagarme($valor =null) {
        if (isset($valor)){
            
            $valor = str_replace("/", "", $valor);        
            $valor = str_replace("-", "", $valor);        
            $valor = str_replace(".", "", $valor);
            
            
            return $valor;
        }
        else{
            return 0;
        }
    }


    public function valorBDParaDolar($valor, $formato = null) {

        if (isset($formato))
            $valor = number_format($valor, $formato);

        $valor = "$".$valor;


        RETURN $valor;
    }

    public function dataparadb($data) {
        return $this->dataParaBD($data);
        
    }
    public function dataParaBD($data) {
        if (strlen($data)>11){
        $exp = explode(' ',$data);
        $p2 = $exp[1];
            $p1 = implode("-", array_reverse(explode("/", $exp[0])));
                
            if(!empty($p2))
                return $p1 .' '. $p2;
            else{
                return $p1;
            }
        
    }else{
            return implode("-", array_reverse(explode("/", $data)));
        }
    }
    
    function diferencaDeDatas($data_inicio,$data_fim){
        
        $date1=date_create($this->dataParaBD($data_inicio));
        $date2=date_create($this->dataParaBD($data_fim));
        $diff=date_diff($date1,$date2);
        
        return $diff->format("%a");
    }
    public function dataparaview($param,$formato = 1) {
        if(!empty($param)){
        return $this->dataBDparaView($param,$formato);
        }
 else {
     return null;
 }
    }
    public function dataBDparaView($data,$formato = 1) {
        
        if (strlen($data)>11){
        $exp = explode(' ',$data);
        $p2 = $exp[1];
            $p1 = implode("/", array_reverse(explode("-", $exp[0])));
                
            if($formato==1)
                return $p1 .' '. $p2;
            else{
                return $p1;
            }
        }else{
            return implode("/", array_reverse(explode("-", $data)));
        }
    }

    function getDatetimeNow() {
        $tz_object = new DateTimeZone('America/Sao_Paulo');
        //date_default_timezone_set('Brazil/East');

        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y\-m\-d\ H:i:s');
    }
       public function now($formato = 'Y-m-d H:i:s') {
        $tz_object = new DateTimeZone('America/Sao_Paulo');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format($formato);
    }

    public function escreve_um_mes($mes) {
        switch ($mes) {
            case '1':
                return 'janeiro';
            case '2':
                return 'fevereiro';
            case '3':
                return 'março';
            case '4':
                return 'abril';
            case '5':
                return 'maio';
            case '6':
                return 'junho';
            case '7':
                return 'julho';
            case '8':
                return 'agosto';
            case '9':
                return 'setembro';
            case '10':
                return 'outubro';
            case '11':
                return 'novembro';
            case '12':
                return 'dezembro';
        }
    }

   
    public function data_time_stamp_ParaBD($data) {
//        var_dump($data);
        if ("00:00:00" === $data) {

            return "1900-01-01 00:00:00";
        }
        $dia_hora = explode(" ", $data);
        if (sizeof($dia_hora) == 1) {
            return NULL;
        }


        $data = implode("-", array_reverse(explode("/", $dia_hora[0])));
        $data = $data . ' ' . $dia_hora[1];

        return $data;
    }

    
    
public function gerarCorAleatoriamente() {
   return "#".$this->random_color();
}

public function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

public function random_color() {
    return $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
}


public function mostra_conteudo($variavel) {
echo '<pre>';
var_dump($variavel);
echo '</pre>';
}


public function reordenadaLista($todas,$comparador) {
        
                for ($index = 0; $index < count($todas); $index++) {
        for ($indexj = 0; $indexj < count($todas); $indexj++) {
            $c1 = $todas[$index];
            
            $c2 = $todas[$indexj];
            $aux =null;
            
            if ($c1->$comparador>$c2->$comparador){
                $aux = $c1;
                $todas[$index] = $c2;
                $todas[$indexj] = $aux;
            }
            }
          
            
        }
        return $todas;
    }

    public function dias_uteis($mes, $ano, $hoje = null) {

        $uteis = 0;
        // Obtém o número de dias no mês 
        // (http://php.net/manual/en/function.cal-days-in-month.php)
        if (isset($hoje)) {
            $dias_no_mes = $hoje;
        } else {
            $dias_no_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
        }
        for ($dia = 1; $dia <= $dias_no_mes; $dia++) {

            // Aqui você pode verifica se tem feriado
            // ----------------------------------------
            // Obtém o timestamp
            // (http://php.net/manual/pt_BR/function.mktime.php)
            $timestamp = mktime(0, 0, 0, $mes, $dia, $ano);
            $semana = date("N", $timestamp);

            if ($semana < 6)
                $uteis++;
        }

        return $uteis;

}


        
    public function converte_formato_data($data,$formato = 'Y-m-d H:i:s') {
        $tz_object = new DateTimeZone('America/Sao_Paulo');
        $datetime = new DateTime($data);
        $datetime->setTimezone($tz_object);
        return $datetime->format($formato);
}    

public function converttextenconding($text) {
    

return mb_convert_encoding($text, 'utf-16', 'utf-8');
}        
}
