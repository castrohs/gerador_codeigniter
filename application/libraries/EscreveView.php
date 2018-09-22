<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EscreveView {
    
    
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
 
    $result =  ""
           ."<form action='<?php echo base_url('".$tabela."/cadastrar') ?>' method='post' name='adicionar' id='adicionar' class='form-horizontal'>"
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

function escreve_btn($nome_view) {
    
      $controller = "
<button data-clipboard-target='#".$nome_view."' class='copyButton'>
    Copy
</button>
    

"; 
return $controller;
}


    
}