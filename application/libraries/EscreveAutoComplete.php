<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EscreveAutoComplete {

    var $funcoes_basicas_ci_lib = "<?php
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
 \n* @property SessaoModel \$SessaoModel";
    var $funcoes_basicas_ci_model =" \n*/
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
 \n*";
    function pre_add_escreve_auto_complete($modelOrControll){
    if($modelOrControll !== 'SessionsModel' &&$modelOrControll!=='Sessions')
      return "\n* @property $modelOrControll $$modelOrControll";
}


    function escreve_auto_complete($entrada) {
        $retorno = $this->funcoes_basicas_ci_lib. $entrada . " ".
                $this->funcoes_basicas_ci_model."


 \n* @property ConversaoLib \$conversaolib
 \n* @property GeradorDeCodigo \$geradorDeCodigos
 \n* @property MobileDetect \$mobiledetect
 \n* @property Curl \$curl
 \n* @property EnviaEmailLib \$enviaemailib
 \n* @property Util \$util
 \n* @property CalculaPlano \$calculaplano
 \n* @property Pagarme \$pagarme
 */
class CI_Model {};
?>";
        return $retorno;
    }

}
