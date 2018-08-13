<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curl {

 private $ch;
 
 public function post($url,$data)
 {
  echo $url."<br>";
  
  $this->init($url);
  
  curl_setopt($this->ch,CURLOPT_POST, 1);
  curl_setopt($this->ch,CURLOPT_POSTFIELDS, $data);
  
  return $this->exec();
  
 }
 /**
  *  public function GetPlanosLista() {
// Sua chave:
        $parametrosURL['chave'] = '0';

// Sua mensagem:
        $parametrosURL['mensagem'] = "<?xml version='1.0' encoding='UTF-8' ?> 
        <requisicao>
        <login>" . $this->login . "</login>
        <senha>" . $this->senha . "</senha>
        </requisicao>";

        $parametrosURL = http_build_query($parametrosURL);

        $url = $this->url_conexao . 'getPlanosLista/?' . $parametrosURL;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-type: application/xml']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        $data = curl_exec($ch);
        curl_close($ch);
        $array_data = json_decode(json_encode(simplexml_load_string($data)), true);
        return  $array_data['plano'];
    }

  */
 /**
  * 
  * @param type $url
  * @param type $data
  * @return type
  */
 public function get($url,$data)
 {
//  echo $url."<br>";
  
  
  
  
  $url = $url.'?' . $data;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        $data = curl_exec($ch);
        curl_close($ch);
        $array_data = json_decode($data, true);
//        echo $data."<br>";
        return $array_data;
  
 }
 
 private function init($url)
 {
  
  $this->ch = curl_init();
  curl_setopt($this->ch,CURLOPT_URL, $url);
  
 }

    private function exec()
    {
 
  $result = curl_exec($this->ch);
  curl_close($this->ch);
  
  return $result;
  
    }
 
}