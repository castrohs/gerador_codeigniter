<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EscreveView {
    /**
     * bootstrap 3
     */
    
//    var $icone_editar = '<span class="glyphicon glyphicon-pencil"></span>';
//    var $icone_remover = '<span class="glyphicon glyphicon-remove"></span>';
//    var $icone_adicionar = '<span class="glyphicon glyphicon-plus"></span>';
    
    /**
     *
     * bootstrap4
     */
    var $icone_editar = '<i class="fas fa-edit"></i>';
    var $icone_remover = '<i class="fas fa-trash"></i>';
    var $icone_adicionar = '<i class="fas fa-plus"></i>';
    
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

}
    function escreve_pagina_listar($nome_controller=null,$formulario) {
 $cabecalho_tabela ='';
 $item_tabela ='';
 $item_key ='';
    foreach ($formulario as $key => $f) {
      $cabecalho_tabela .='<th class="">'.$f->campo->Field.'</th>';
      $item  = "<?php echo \$item->".$f->campo->Field ." '?>";
      $item_tabela .='<td >'.$item.'</td>';
      if(!empty($f->campo->Key)){
        $item_key .=$f->campo->Field."_"; 
       }
//       public 'campo' => 
//        object(stdClass)[54]
//          public 'Field' => string 'agencia_capital_social' (length=22)
//          public 'Type' => string 'double' (length=6)
//          public 'Null' => string 'YES' (length=3)
//          public 'Key' => string '' (length=0)
//          public 'Default' => null
//          public 'Extra' => string '' (length=0)
//          public 'obrigatorio' => boolean false
              
    }

    $result =  ""
            . '<div class="col-md-12 col-lg-12">
    <div class="col-md-12 col-lg-12">
        <a href="#" data-toggle="modal" data-target="#adicionar" class="btn btn-sm btn-success pull-right"
           >'.$this->icone_adicionar.'</a>
        <br>    
    </div>
    <br><br>    
    

    <div class="col-md-12 col-xs-12 col-lg-12">

        <div class="panel panel-info">

            <div class="panel-heading">Lista de  '.$nome_controller.'</div>
            <div class="panel-body">


                <div class="col-md-12 col-xs-12"><p></p><input class="form-control filter" placeholder="Digite o '. strtolower($nome_controller).' a ser buscado"  autocomplete="off"  name="titul"></div>

                

                <table class="table table-responsive table-hover">
                    <thead>
                        <tr>

                        '.$cabecalho_tabela.'



                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (isset($busca_todas)) {

                            foreach ($busca_todas as $key => $item) {
                              //  var_dump($item);
                                ?>
                                <tr >
                                   '.$item_tabela.'
                                    <td><a href="#" class="btn  btn-primary right" data-toggle="modal"
                                    data-target="#editar'.$item_key.'">
                                    '.$this->icone_editar.' </a></td>

                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#remover'.$item_key.'" class="btn btn-danger">
                                            '.$this->icone_remover.'
                                        </a>
                                    </td>

                                </tr>



                                <?php
                            }
                            ?>

                            <?php
                        } else {
                            echo "nada a ser exibido!";
                        }
                        ?>

                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>'
            
            ."";

    return ($result);

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
 
   

}
function escreve_formulario_remover($tabela,$formulario,$tamanho_da_col = 'col-md-4') {
    
  
    $result =  ""
           ."<form action='<?php echo base_url() ?>".$tabela."/remover' method='post' class='form-horizontal'>"
            ."<fieldset>"
            . "<legend>".$tabela."</legend>"
            
            ."<div class='form-group'>"
            ."<label class='col-md-4 control-label' for='submit'></label>"
            
            ."    <button id='submit' name='submit' class='btn btn-success '>Enviar</button>"

            ."</div>"

            ."</fieldset>"
            ."</form>"
            
            ."";

    return html_escape($result);



}




function gen_form($campo ){
    $exp = explode('(',$campo->Type);
    $required = "";
            if($campo->Null=="NO"){
                $required ="required=''";
            }
    $text='';
        if(count($exp)>1){

           $exp[1]=trim($exp[1],')');
           
           
            $text=" <input type='text' id = '".$campo->Field."' "
                    . "name = '".$campo->Field."' maxlength = '".$exp[1]."'  class='form-control input-md' ".$required.">";
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
     $required = "";
            if($campo->Null=="NO"){
                $required ="required=''";
            }
    $text='';
        if(count($exp)>1){

           $exp[1]=trim($exp[1],')');
           
           
            $text=" <input type='text' id = '".$campo->Field."' name = '".$campo->Field."'"
                    . " maxlength = '".$exp[1]."'  class='form-control input-md'"
                    . "value = '<?php echo \$item->".$campo->Field."?>' ".$required." >";
 
    
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