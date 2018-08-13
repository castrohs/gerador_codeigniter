<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class GeradorDeCodigo {
    


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





function escreve_controller($nome_view,$nome_model) {
    
      $controller = "
          <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class " . $nome_view . " extends CI_Controller {
\n
    
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
        \$data['title'] = 'Lista de $nome_view';
        \$this->load->view('layout/web_head', \$data);
        
        

     \$data['menus'] = \$this->MenuModel->menus();\n      
     \$this->load->view('layout/menu', \$data);
        
        \$this->load->model('" . $nome_model . "');
        \$data['busca_todas']= \$this-> " . $nome_model . "->busca_todos();
            
            
        \$data['insert_result'] = \$this->session->flashdata('insert_result');
        \$this->load->view('" . $nome_view . "/listar', \$data);
        \$this->load->view('layout/web_footer');
    }
\n

    public function cadastrar() {
        \$this->SessaoModel->verificaSessaoAtivaAdminSeNaoLogout();
        \$post = \$this->input->post();
        
        if (!empty(\$post)) {
            \$this->load->model('" . $nome_model . "');
            \$insert_result = \$this-> " . $nome_model . "->insert();
        }
        \$this->session->set_flashdata('insert_result', \$insert_result);
        redirect(base_url() . '" . $nome_view . "');
    }

   \n
    public function atualizar() {
        \$this->SessaoModel->verificaSessaoAtivaAdminSeNaoLogout();
        \$post = \$this->input->post();
        if (!empty(\$post)) {
            \$this->load->model('" . $nome_model . "');
            \$insert_result = \$this-> " . $nome_model . "->update();
        }
        \$this->session->set_flashdata('insert_result', \$insert_result);
        redirect(base_url() . '" . $nome_view . "');
    }
\n
    public function atualizar" . $nome_view . "(\$id) {
        \$this->SessaoModel->verificaSessaoAtivaSeNaoLogout();
        \$data['title'] = 'Atualizar " . $nome_view . "';
            
        \$this->load->view('layout/web_head', \$data);
        \$this->load->model('" . $nome_model . "');
        \$" . $nome_view . " = \$this-> " . $nome_model . "->busca_um(\$id);
        
        

   \n
        \$data['" . $nome_view . "']= \$" . $nome_view . "[0];
\$data['menus'] = \$this->MenuModel->menus();\n      
     \$this->load->view('layout/menu', \$data);
        
        \$this->load->view('" . $nome_view . "/editar', \$data);
        \$this->load->view('layout/web_footer');
    }
\n
   

    public function excluir() {
        \$this->SessaoModel->verificaSessaoAtivaAdminSeNaoLogout();
        \$post = \$this->input->post();
        if (!empty(\$post)) {
            \$this->load->model('" . $nome_model . "');
            \$this-> " . $nome_model . "->excluir();
        }

        redirect(base_url() . '" . $nome_view . "');
    }


}

?>
"; 
return $controller;
}
function escreve_btn($nome_view) {
    
      $controller = "
<button data-clipboard-target='#".$nome_view."' class='copyButton'>
    Copy
</button>
    

"; 
return $controller;
}
function escreve_join($nome_tabela) {
    
      $controller = "
<button data-clipboard-target='#".$nome_view."' class='copyButton'>
    Copy
</button>
    

"; 
return $controller;
}
function escreve_model($nome_model,$nome_tabela,$variaveis,$variaveis_array,$id_tabela) {
 $query_where_primary_key ='';
 $query_where_input ='';
 $query_where_busca_um ='';
 $j=0;
 
    foreach ($id_tabela as $key => $id) {
        
    $query_where_primary_key .= '$this->db->where("'.$id.'", $post["'. $id.'"]);';    
    $query_where_input .= 'if (!empty( $id'.$j.')){';    
    $query_where_input .= '$this->db->where("'.$id.'", $id'.$j.');';    
    $query_where_input .= '}';    
    $query_where_busca_um .= '$id'.$j.'=null,';    
    
    $j=$j+1;
    }
    $query_where_busca_um=substr($query_where_busca_um,0,-1);
   
   
$model="
   <?php
class  " . $nome_model . " extends CI_Model {
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
            if (!empty(\$post[\$value])) {
                \$this->\$value = \$post[\$value];
            }
        }
\n
        \$retorno = \$this->db->insert('" . $nome_tabela . "', \$this);
         // \$retorno = \$this->db->insert_id();
         if (\$this->db->error()['code'] == 1062) {
           return \$retorno =-1;
        }
         
            \$this->load->model('LogModel');
        \$log = new LogModel();
        \$log->insert(\$this->db->select());
     
           
           return \$retorno;
        
        
    }
   \n

    function update() {
        \$post = \$this->input->post();
       
    ".$query_where_primary_key."
        
        \$query = \$this->db->get('" . $nome_tabela . "')->result();

        \$query = \$query[0];
        foreach (\$this->array_variaveis as \$value) {
            \$this->\$value = \$query->\$value;
        }

        foreach (\$this->array_variaveis as \$value) {
            if (!empty(\$post[\$value])) {
                if (\$post[\$value] != null) {
                    \$this->\$value = \$post[\$value];
                }
            }
        }

        ".$query_where_primary_key."
        \$retorno = \$this->db->update('" . $nome_tabela . "', \$this);
       \$this->load->model('LogModel');
        \$log = new LogModel();
        \$log->insert(\$this->db->select());     
        return \$retorno;
    }
\n
    function busca_todos(\$limit=null, \$apartir_de_que_registro=null) {       
        if(!empty(\$limit)&&!empty(\$apartir_de_que_registro)){
            \$this->db->limit(\$limit, \$apartir_de_que_registro);
        }
        \$query = \$this->db->get('" . $nome_tabela . "');
        return \$query->result();
    }
\n
    function busca_um(".$query_where_busca_um.") {
      ".$query_where_input."
          
        \$query = \$this->db->get('" . $nome_tabela . "');
       \$result= \$query->result();
       
        if(sizeof(\$result) > 0){
          return \$result[0];
        }else{
            return null;
        }
    }
\n


/*\$arry_where = array(
                    'campo'=>\$cliente
                        );
  */                      
    function busca_um_array(\$arry_where) {
       foreach (\$arry_where as \$key => \$value) {
               \$this->db->where(\$key, \$value);
        }
          
        \$query = \$this->db->get('" . $nome_tabela . "');
       \$result= \$query->result();
       
        if(sizeof(\$result) > 0){
          return \$result;
        }else{
            return null;
        }

    }
\n
    function excluir() {

        \$post = \$this->input->post();
        
        ".$query_where_primary_key."
        \$this->db->delete('" . $nome_tabela . "');
            \$this->load->model('LogModel');
        \$log = new LogModel();
        \$log->insert(\$this->db->select());
    }
\n
}

";

    return $model;

}
function escreve_formulario($tabela=null,$formulario) {
 $form ='';
    foreach ($formulario as $key => $f) {
      $form .="<div class='form-group'>
  <label class='col-md-4  control-label' for='".$f->campo->Field."'>".$f->campo->Field."</label>  
  <div class='col-md-4'>
  ".$f->formulario."
  
  
  </div>
</div>";
              
    }
    
//    
    
    
    
    
    $result =  ""
           ."<form action='<?php echo base_url('".$tabela."/cadastrar') ?> method='post' name='adicionar' id='adicionar' class='form-horizontal'>"
            . "<legend>".$tabela."</legend>
".$form."<div class='form-group'>"
    ."<label class='col-md-4 control-label' for='submit'></label>"
  ."<div class='col-md-4'>"
."    <button id='submit' name='submit' class='btn btn-success'>Enviar</button>"
."  </div>"
."</div>"

."</fieldset>"
."</form>"
            
            ."";

    return html_escape($result);


    
//    
    
    
    
    
    $result =  ""
           ."<form action='<?php echo base_url() ?>".$tabela."/cadastrar' method='post' name='adicionar' id='adicionar' class='form-horizontal'>"
            . "<legend>".$tabela."</legend>
".$form."<div class='form-group'>"
    ."<label class='col-md-4 control-label' for='submit'></label>"
  ."<div class='col-md-4'>"
."    <button id='submit' name='submit' class='btn btn-success'>Enviar</button>"
."  </div>"
."</div>"

."</fieldset>"
."</form>"
            
            ."";

    return html_escape($result);

}
function escreve_formulario_edit($tabela,$formulario,$tamanho_da_col = 'col-md-4') {
    
    
 $form = '';
        foreach ($formulario as $key => $f) {
            $form .= 
                    "<div class='form-group'>"
                    ."<label class='".$tamanho_da_col." control-label"
                    ."' for='" . $f->campo->Field . "'>" . $f->campo->Field . "</label>"
                    ."<div class='".$tamanho_da_col."'>"
                    . $f->formulario_edit 
                    
                    . "</div>"
                     . "</div>";
        }
    
//    
    
    
    
    
    $result =  ""
           ."<form action='<?php echo base_url('".$tabela."/atualizar') ?> method='post' name='editar' id='editar' class='form-horizontal'>"
            ."<fieldset>"
            . "<legend>".$tabela."</legend>"
            .$form
            ."<div class='form-group'>"
            ."<label class='col-md-4 control-label' for='submit'></label>"
            
            ."    <button id='submit' name='submit' class='btn btn-success '>Enviar</button>"

            ."</div>"

            ."</fieldset>"
            ."</form>"
            
            ."";

    return html_escape($result);


    
//    
    
    
    
    
    $result =  ""
           ."<form action='<?php echo base_url() ?>".$tabela."/cadastrar' method='post' name='adicionar' id='adicionar' class='form-horizontal'>"
            . "<legend>".$tabela."</legend>
".$form."<div class='form-group'>"
    ."<label class='col-md-4 control-label' for='submit'></label>"
  ."<div class='col-md-4'>"
."    <button id='submit' name='submit' class='btn btn-success'>Enviar</button>"
."  </div>"
."</div>"

."</fieldset>"
."</form>"
            
            ."";

    return html_escape($result);

}
function escreve_formulario_remover($tabela,$formulario,$tamanho_da_col = 'col-md-4') {
    
    
 $form = '';
        foreach ($formulario as $key => $f) {
            $form .= 
                    "<div class='form-group'>"
                    ."<label class='".$tamanho_da_col." control-label"
                    ."' for='" . $f->campo->Field . "'>" . $f->campo->Field . "</label>"
                    ."<div class='".$tamanho_da_col."'>"
                    . $f->formulario_edit 
                    
                    . "</div>"
                     . "</div>";
        }
    
//    
    
    
    
    
    $result =  ""
           ."<form action='<?php echo base_url() ?>".$tabela."/atualizar' method='post' name='editar' id='editar' class='form-horizontal'>"
            ."<fieldset>"
            . "<legend>".$tabela."</legend>"
            .$form
            ."<div class='form-group'>"
            ."<label class='col-md-4 control-label' for='submit'></label>"
            
            ."    <button id='submit' name='submit' class='btn btn-success '>Enviar</button>"

            ."</div>"

            ."</fieldset>"
            ."</form>"
            
            ."";

    return html_escape($result);


    
//    
    
    
    
    
    $result =  ""
           ."<form action='<?php echo base_url() ?>".$tabela."/cadastrar' method='post' name='adicionar' id='adicionar' class='form-horizontal'>"
            . "<legend>".$tabela."</legend>
".$form."<div class='form-group'>"
    ."<label class='col-md-4 control-label' for='submit'></label>"
  ."<div class='col-md-4'>"
."    <button id='submit' name='submit' class='btn btn-success'>Enviar</button>"
."  </div>"
."</div>"

."</fieldset>"
."</form>"
            
            ."";

    return html_escape($result);

}




function gen_form($campo ){
    $exp = explode('(',$campo->Type);
    
    $text='';
        if(count($exp)>1){

           $exp[1]=trim($exp[1],')');
           
           
            $text=" <input type='text' id = '".$campo->Field."' name = '".$campo->Field."' maxlength = '".$exp[1]."'  class='form-control input-md'>";
//        }   
    
    }else if ($campo->Type =="text"){
        
            
            $text=" <textarea rows='4' cols='50' name = '".$campo->Field."' id = '".$campo->Field."'> </textarea >";
        
    }
    else{
        
        
//        double;
         $text=" <input type='text'  name = '".$campo->Field."' id = '".$campo->Field."' maxlength = '200'  class='form-control input-md'>";
    }
    return "". $text."";
}





function gen_form_edit($campo ){
    $exp = explode('(',$campo->Type);
    
    $text='';
        if(count($exp)>1){

           $exp[1]=trim($exp[1],')');
           
           
            $text=" <input type='text' id = '".$campo->Field."' name = '".$campo->Field."'"
                    . " maxlength = '".$exp[1]."'  class='form-control input-md'"
                    . "value = '<?php echo \$item->".$campo->Field."?>'>";
 
    
    }else if ($campo->Type =="text"){
        
            
            $text=" <textarea rows='4' cols='50' name = '".$campo->Field."' id = '".$campo->Field."'><?php echo \$item->".$campo->Field." ?></textarea >";
        
    }
    else{
        
        
//        double;
         $text=" <input type='text'  name = '".$campo->Field."' id = '".$campo->Field."' maxlength = '200'  class='form-control input-md' value = '<?php echo \$item->".$campo->Field."?>'>";
    }
    
    return "". $text."";
}


}