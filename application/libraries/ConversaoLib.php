<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ConversaoLib {

    public function valorRealParaBD($valor) {
        $valor = str_replace("R$", "", $valor);
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", ".", $valor);
        return $valor;
    }

    public function valorBDParaReal($valor, $formato = null) {

        if (isset($formato))
            $valor = number_format($valor, $formato);

        $valor = str_replace(",", ";", $valor);
        ;
        $valor = str_replace(".", ",", $valor);
        $valor = str_replace(";", ".", $valor);


        RETURN $valor;
    }

    public function dataParaBD($data) {
        return implode("-", array_reverse(explode("/", $data)));
    }

    public function dataBDparaView($data) {
        return implode("/", array_reverse(explode("-", $data)));
    }

    function getDatetimeNow() {
        $tz_object = new DateTimeZone('America/Sao_Paulo');
        //date_default_timezone_set('Brazil/East');

        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y\-m\-d\ H:i:s');
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

    public function hotel_nome($data) {
        if (!isset($data))
            return null;
        if (sizeof($data) >= 1) {

            return explode("-", $data)[0];
        }return null;
    }

    public function hotel_cidade($data) {
//        var_dump($data);
        if (!isset($data))
            return null;
        $data = explode("-", $data);
        unset($data[0]);
        if (sizeof($data) <= 0)
            return null;
        $data = explode(",", $data[1]);
        if (sizeof($data) >= 1) {
            $teste = explode(' ', $data[0]);
            if ($teste[0] === '') {
                $data = substr($data[0], 1);
                return $data;
            }
//            var_dump($data);
//            die();
            return $data[0];
        }
        return null;
    }

    public function hotel_estado($data_origem) {
        if (!isset($data_origem))
            return null;
        if (sizeof($data_origem) <= 0)
            return null;
        $data = explode("-", $data_origem);
        if (sizeof($data) <= 0)
            return null;
//REMOVO o nome do hotel
        unset($data[0]);
        $data = explode(",", $data[1]);



        if (sizeof($data) >= 2) {
            if (sizeof($data) !== 3) {
                return null;
            } else {
                $teste = explode(' ', $data[1]);
                if ($teste[0] === '') {
                    $data = substr($data[1], 1);
                    return $data;
                }
                return $data[1];
            }
            return null;
        } else {
            return null;
        }
    }

    public function hotel_pais($data) {
        if (!isset($data))
            return null;
        $data = explode(",", $data);
        //     var_dump(sizeof($data));
        if (sizeof($data) >= 2) {
            if (sizeof($data) !== 3) {
                $teste = explode(' ', $data[1]);
                if ($teste[0] === '') {
                    $data = substr($data[1], 1);
                    return $data;
                }
                return $data[1];
            } else {
                $teste = explode(' ', $data[2]);
                if ($teste[0] === '') {
                    $data = substr($data[2], 1);
                    return $data;
                }
                return $data[2];
            }
            return null;
        } else {
            return null;
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



    
}
