<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$banco_a_ser_analisado = "Tables_in_busca_pessoas";
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once  './conexao.php';
require_once  './Configuracao.php';
$auto_complete = "";
$config = new Configuracao();
//var_dump($config);
//echo "config ".$config->db_base;

//while ($rowTable = $result->fetch_array()){
//echo $rowTable[0]."<br>";
//var_dump($result);
//}
//
?><pre><?php
$rowTable = $result->fetch_all();
var_dump($result->fetch_all());
foreach ($rowTable as $table){

    
    
    $show_table = "DESCRIBE " . $table[0];
//    echo "<br>";
//    echo $show_table."<br>";
    // Perform Query
    $result_table = $link->query($show_table)->fetch_all();

    if (!$result_table) {
        $message = 'Invalid query: ' . mysql_error() . "n";
        $message .= 'Whole query: ' . $show_table;
        die($message);
    }

//    var_dump($result_table);
//    $num =$result_table->num_rows();
    
    
    
    $nome_tabela = ($table[0]);
//    echo '----------------------------->'.$nome_tabela;

//   var_dump(substr($nome_tabela,3));
    $nome_tabela_model = ucwords(substr($nome_tabela, $config->quantas_letras_remover)) . "Model";

    $nome_tabela_control = ucwords(substr($nome_tabela, $config->quantas_letras_remover));
    $auto_complete=$auto_complete. " ".pre_add_escreve_auto_complete($nome_tabela_model);
    $auto_complete=$auto_complete. " ".pre_add_escreve_auto_complete($nome_tabela_control);
    $nome_view = lcfirst($nome_tabela_control);
//    var_dump($result_table);
//    var_dump(sizeof($result_table));
    $id_tabela=$result_table[0][0];
//    echo "id_tabela  ";
//    var_dump($id_tabela);
    foreach ($result_table as $key => $coluna) {
//        var_dump($key);
//    }

//    $num = $colunas->field_count();
////    var_dump( $colunas);
////foreach ($colunas as $coluna){
//    for ($x = 0; $x < $num; $x++) {
////        var_dump($coluna[0]);
////    echo '<br>Row '.$x;
////    $row=mysql_fetch_assoc($result_table,$x);
//        // $field = mysql_result($result,$x)
//        
////        var_dump($colum);
//        

        $variaveis = $variaveis . "\n var \$" . $coluna[0] . ";";
//        echo $variaveis."<br>";

        $variaveis_array = $variaveis_array . "'" . $coluna[0] . "'";
        if ($key < sizeof($result_table)-1) {
            $variaveis_array = $variaveis_array . ",";
        }
//        var_dump($variaveis_array);
    }


//    $num_rows = mysql_num_rows($result);
//    for ($i = 0; $i < $num_rows;$i++){
//        
//    }



echo "<Br>====================//==================";
    ECHO "

<br> controller " . $nome_tabela_control . "
<br>";
$controller = "
<br>//controller
\n
defined('BASEPATH') OR exit('No direct script access allowed');

class " . $nome_tabela_control . " extends CI_Controller {
\n
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    \n
    function __construct() {
        parent::__construct();
       
    }

    public function index() {
        \$this->listar();
    }
    \n

    public function listar() {
        \$this->SessaoModel->verificaSessaoAtivaSeNaoLogout();\n
        \$data['title'] = 'Lista de $nome_tabela_control';
        \$this->load->view('layout/web_head', \$data);
        
        

     \$data['menus'] = \$this->MenuModel->menus();\n      
     \$this->load->view('layout/menu', \$data);
        
        \$this->load->model('" . $nome_tabela_model . "');
        \$data['busca_todas']= \$this-> " . $nome_tabela_model . "->busca_todos();
            
            
        \$data['insert_result'] = \$this->session->flashdata('insert_result');
        \$this->load->view('" . $nome_view . "/listar', \$data);
        \$this->load->view('layout/web_footer');
    }
\n

    public function cadastrar() {
        \$this->SessaoModel->verificaSessaoAtivaAdminSeNaoLogout();
        \$post = \$this->input->post();
        
        if (isset(\$post)) {
            \$this->load->model('" . $nome_tabela_model . "');
            \$insert_result = \$this-> " . $nome_tabela_model . "->insert();
        }
        \$this->session->set_flashdata('insert_result', \$insert_result);
        redirect(base_url() . '" . $nome_tabela_control . "');
    }

   \n
    public function atualizar() {
        \$this->SessaoModel->verificaSessaoAtivaAdminSeNaoLogout();
        \$post = \$this->input->post();
        if (isset(\$post)) {
            \$this->load->model('" . $nome_tabela_model . "');
            \$insert_result = \$this-> " . $nome_tabela_model . "->update();
        }
        \$this->session->set_flashdata('insert_result', \$insert_result);
        redirect(base_url() . '" . $nome_tabela_control . "');
    }
\n
    public function atualizar" . $nome_tabela_control . "(\$id) {
        \$this->SessaoModel->verificaSessaoAtivaSeNaoLogout();
        \$data['title'] = 'Atualizar " . $nome_tabela_control . "';
            
        \$this->load->view('layout/web_head', \$data);
        \$this->load->model('" . $nome_tabela_model . "');
        \$" . $nome_tabela_control . " = \$this-> " . $nome_tabela_model . "->busca_um(\$id);
        
        

   \n
        \$data['" . $nome_view . "']= \$" . $nome_tabela_control . "[0];
\$data['menus'] = \$this->MenuModel->menus();\n      
     \$this->load->view('layout/menu', \$data);
        
        \$this->load->view('" . $nome_view . "/editar', \$data);
        \$this->load->view('layout/web_footer');
    }
\n
   

    public function excluir() {
        \$this->SessaoModel->verificaSessaoAtivaAdminSeNaoLogout();
        \$post = \$this->input->post();
        if (isset(\$post)) {
            \$this->load->model('" . $nome_tabela_model . "');
            \$this-> " . $nome_tabela_model . "->excluir();
        }

        redirect(base_url() . '" . $nome_tabela_control . "');
    }


}";

   
$model="php
   <br> //model
   <br>
class  " . $nome_tabela_model . " extends CI_Model {
    " .
    $variaveis
    . "
   \nvar \$array_variaveis = [" . $variaveis_array . " ];
\n
    public function __construct() {
   \n
        parent::__construct();
    }
\n
    function insert() {
        \$post = \$this->input->post();
        foreach (\$this->array_variaveis as \$value) {
            if (isset(\$post[\$value])) {
                \$this->\$value = \$post[\$value];
            }
        }
\n
        \$retorno = \$this->db->insert('" . $nome_tabela . "', \$this);

        return \$retorno;
    }
   \n

    function update() {
        \$post = \$this->input->post();
        \$this->db->where('" . $id_tabela . "', \$post['" . $id_tabela . "']);
        \$query = \$this->db->get('" . $nome_tabela . "')->result();

        \$query = \$query[0];
        foreach (\$this->array_variaveis as \$value) {
            \$this->\$value = \$query->\$value;
        }

        foreach (\$this->array_variaveis as \$value) {
            if (isset(\$post[\$value])) {
                if (\$post[\$value] != null) {
                    \$this->\$value = \$post[\$value];
                }
            }
        }

        \$this->db->where('" . $id_tabela . "', \$this->" . $id_tabela . ");
        \$retorno = \$this->db->update('" . $nome_tabela . "', \$this);

        return \$retorno;
    }
\n
    function busca_todos() {
        \$query = \$this->db->get('" . $nome_tabela . "');
        return \$query->result();
    }
\n
    function busca_um(\$id) {
        \$this->db->where('" . $id_tabela . "', \$id);
        \$query = \$this->db->get('" . $nome_tabela . "');
        return \$query->result();
    }
\n
    function excluir() {

        \$post = \$this->input->post();
        
        \$this->db->where('" . $id_tabela . "', \$post['" . $id_tabela . "']);
        \$this->db->delete('" . $nome_tabela . "');
    }
\n
}

";

    $variaveis = "";
    $variaveis_array = "";
    echo "<br>";

    echo "controller =".$controller;
    echo "<br>";
     echo "<Br><Br>====================//==================";
    echo " model " . $nome_tabela_model;
    echo "<br>";
    echo "model =".$model;
//    writeController($pasta_do_sistema,$nome_tabela_control,$controller);
//    writeModel($pasta_do_sistema,$nome_tabela_control,$model);
    
}

echo "<BR><BR>"
 . "<BR><BR>"
 . "Colocar em :\nbproject\CI_Autocompletes\CI_Autocompletes.php"
        . "<BR><BR>"
 . "<\?php";
echo escreve_auto_complete($auto_complete);

function writeController($pasta_do_sistema,$nome_arquivo,$escrita){

$file = fopen($pasta_do_sistema. "//application//controllers//".$nome_arquivo.".php","w");
 fwrite($file,$escrita);
fclose($file);

}
function writeModel($pasta_do_sistema,$nome_arquivo,$escrita){

$file = fopen($pasta_do_sistema. "//application//models//".$nome_arquivo."Model.php","w");
 fwrite($file,$escrita);
fclose($file);

}

function pre_add_escreve_auto_complete($modelOrControll){
    if($modelOrControll !== 'SessionsModel' &&$modelOrControll!=='Sessions')
      return "\n* @property $modelOrControll $$modelOrControll";
}

function escreve_auto_complete($entrada){
    $retorno= "

/**
 \n* @property CI_DB_active_record \$db
 \n* @property CI_DB_forge \$dbforge
 \n* @property CI_Benchmark \$benchmark
 \n* @property CI_Calendar \$calendar
 \n* @property CI_Cart \$cart
 \n* @property CI_Config \$config
 \n* @property CI_Controller \$controller
 \n* @property CI_Email \$email
 \n* @property CI_Encrypt \$encrypt
 \n* @property CI_Exceptions \$exceptions
 \n* @property CI_Form_validation \$form_validation
 \n* @property CI_Ftp \$ftp
 \n* @property CI_Hooks \$hooks
 \n* @property CI_Image_lib \$image_lib
 \n* @property CI_Input \$input
 \n* @property CI_Language \$language
 \n* @property CI_Loader \$load
 \n* @property CI_Log \$log
 \n* @property CI_Model \$model
 \n* @property CI_Output \$output
 \n* @property CI_Pagination \$pagination
 \n* @property CI_Parser \$parser
 \n* @property CI_Profiler \$profiler
 \n* @property CI_Router \$router
 \n* @property CI_Session \$session
 \n* @property CI_Sha1 \$sha1
 \n* @property CI_Table \$table
 \n* @property CI_Trackback \$trackback
 \n* @property CI_Typography \$typography
 \n* @property CI_Unit_test \$unit_test
 \n* @property CI_Upload \$upload
 \n* @property CI_URI \$uri
 \n* @property CI_User_agent \$user_agent
 \n* @property CI_Validation \$validation
 \n* @property CI_Xmlrpc \$xmlrpc
 \n* @property CI_Xmlrpcs \$xmlrpcs
 \n* @property CI_Zip \$zip
 \n* 
 \n* Add addtional libraries you wish
 \n* to use in your controllers here
 \n* @property SessaoModel \$SessaoModel
".$entrada."

 \n*/
class CI_Controller {};
 \n/**
 \n* @property CI_DB_query_builder \$db
 \n* @property CI_DB_forge \$dbforge
 \n* @property CI_Config \$config
 \n* @property CI_Loader \$load
 \n* @property CI_Session \$session
 \n*
 \n* Add addtional libraries you wish
 \n* to use in your models here.
 \n*
 \n* @property ConversaoLib \$conversaolib
 \n* @property GeradorDeCodigo \$geradorDeCodigos
 \n* @property MobileDetect \$mobiledetect
 \n* @property Curl \$curl
 \n* @property EnviaEmailLib \$enviaemailib
 */
class CI_Model {};
?>";
  return   $retorno;
}


