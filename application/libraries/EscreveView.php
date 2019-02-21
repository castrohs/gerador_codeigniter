<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EscreveView {
    var $icone_editar ;
    var $icone_remover ;
    var $icone_adicionar ;
    var $ci;

    function escreve_formulario($tabela = null, $formulario, $rules_ativo = null) {
        $this->ci = &get_instance();
        $form = '';
        $rules = '';

        foreach ($formulario as $key => $f) {
            if ($rules_ativo==1) {
                $rules = "<?php echo form_error('" . $f->campo->Field . "'); ?>";
            }
            $form .= $rules . "<div class='form-group'>
  <label class='col-md-4  control-label' for='" . $f->campo->Field . "'>" . $f->campo->Field . "</label>"  
  ."<div class='col-md-4'>
  ". $f->formulario 
  . "</div>"
. "</div>";
        }

        $result = ""
                . "<form action='<?php echo base_url('" . $tabela . "/cadastrar') ?>' method='post' name='adicionar' id='adicionar' class='form-horizontal'>"
                . "<legend>" . $tabela . "</legend>
" . $form . "<div class='form-group'> \n"
                . "<label class='col-md-4 control-label' for='submit'></label> \n"
                . "<div class='col-md-4'> \n"
                . " <button id='submit' name='submit' class='btn btn-success'>Enviar</button>\n"
                . "  </div>\n"
                . "</div>\n"
                . "</fieldset>\n"
                . "</form>\n"
                . "";

        return ($result);
    }

    function escreve_pagina_listar($nome_controller = null, $formulario,$bootstrap=3,$rules_ativo=null) {
        $this->icones_bootstrap($bootstrap);
        $cabecalho_tabela = '';
        $item_tabela = '';
        $item_key = '';
        $item_key_ = '';
        $data_target_item_key = '';
        foreach ($formulario as $key => $f) {
            $cabecalho_tabela .= '<th class="">' . $f->campo->Field . '</th>';
            $item = "<?php echo \$item->" . $f->campo->Field . " ?>";
            $item_tabela .= '<td >' . $item . '</td>';
            if (!empty($f->campo->Key)) {
                $item_key_ .= $f->campo->Field . "_";
                $item_key .= $f->campo->Field . "";
                $data_target_item_key .= 'echo $item->'.$f->campo->Field . "; ";
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

        $result = ""
                . '<div class="col-md-12 col-lg-12">
    <div class="col-md-12 col-lg-12">
        <a href="#" data-toggle="modal" data-target="#adicionar" class="btn btn-sm btn-success pull-right"
           >' . $this->icone_adicionar . '</a>
        <br>    
    </div>
    <br><br>    
    

    <div class="col-md-12 col-xs-12 col-lg-12">

        <div class="panel panel-info">

            <div class="panel-heading">Lista de  ' . $nome_controller . '</div>
            <div class="panel-body">


                <div class="col-md-12 col-xs-12"><p></p><input class="form-control filter" placeholder="Digite o ' . strtolower($nome_controller) . ' a ser buscado"  autocomplete="off"  name="titul"></div>

                

                <table class="table table-responsive table-hover">
                    <thead>
                        <tr>

                        ' . $cabecalho_tabela . '
                        <th class=""></th>
                        <th class=""></th>


                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (isset($busca_todas)) {

                            foreach ($busca_todas as $key => $item) {
                              //  var_dump($item);
                                ?>
                                <tr >
                                   ' . $item_tabela . '
                                    <td><a href="#" class="btn  btn-primary right" data-toggle="modal"
                                    data-target="#editar_<?php ' . $data_target_item_key . '?>">
                                    ' . $this->icone_editar .'" </a></td>

                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#remover_<?php ' . $data_target_item_key . '?>" class="btn btn-danger">
                                            ' . $this->icone_remover . '
                                        </a>
                                    </td>

                                </tr>


//formularios
//#
//#
//#
//editar
//#
//#

                                <div class="modal fade" id="editar_<?php ' . $data_target_item_key . '?>" tabindex="-1" role="dialog" aria-labelledby="editar_<?php ' . $data_target_item_key . '?>" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edição : '.$nome_controller.'</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        '.
                                        $this->escreve_formulario_edit($nome_controller, $formulario,$rules_ativo)
                                        .'
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Excluir</button>
                                        
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            
//#
//#
//remover
//#
//#

<div class="modal fade" id="remover_<?php ' . $data_target_item_key . '?>" tabindex="-1" role="dialog" aria-labelledby="remover_<?php ' . $data_target_item_key . '?>" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Remoção: ' . $nome_controller . '</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <form action="<?php echo base_url() ?>' . $nome_controller . '/excluir" method="post" class="form-horizontal">
                                      <div class="modal-body">
                                       '.
                                        $this->escreve_formulario_remover($nome_controller, $formulario,$tamanho_da_col ='col-md-4',$rules_ativo)
                                        .'
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Remover</button>
                                      </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>

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
                
<div class="modal fade" id="adicionar" tabindex="-1" role="dialog" aria-labelledby="adicionar" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Adicionar novo Item</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                                                                    '.
                                        $this->escreve_formulario($nome_controller, $formulario,$rules_ativo)
                                        .'
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
            </div>

        </div>
    </div>
</div>'
                . "";

        return ($result);
    }

    function escreve_formulario_edit($tabela, $formulario, $tamanho_da_col = 'col-md-4', $rules_ativo = true) {


        $form = '';
        $rules = '';
        
        
        
        foreach ($formulario as $key => $f) {
            if ($rules_ativo) {
                $rules = "<?php echo form_error('" . $f->campo->Field . "'); ?>";
            }
          $form.=  "<div class='form-group'>"
                    . "<label class='" . $tamanho_da_col . " control-label"
                    . "' for='" . $f->campo->Field . "'>" . $f->campo->Field . "</label>"
                    . "<div class='" . $tamanho_da_col . "'>"
                    . $f->formulario_edit
                    . "</div>"
                    . "</div> \n";
        }

        $result = ""
                . "<form action='<?php echo base_url('" . $tabela . "/atualizar') ?>' method='post' name='editar' id='editar' class='form-horizontal' \n"
                . "<fieldset>"
                
                . $form
                . "\n <div class='form-group'> \n"
                . "<label class='col-md-4 control-label' for='submit'></label>"
                . "    <button id='submit' name='submit' class='btn btn-success '>Enviar</button> \n"
                . "</div> \n"
                . "</fieldset> \n"
                . "</form> \n"
                . "";

        return ($result);
    }

    /**
     * 
     * @param type $tabela
     * @param type $keys
     * @param type $tamanho_da_col
     * @return type
     * Sob analise ainda
     */
    function escreve_formulario_remover($tabela, $formulario,$tamanho_da_col ='col-md-4',$rules_ativo) {
$form="";
 foreach ($formulario as $key => $f) {
 
       

                   $form .= $this->gen_form_remover($f->campo);
 
//        }
        }



        
        
        $result = ""
                
                . "<fieldset>"
                
                . "<div class='form-group'>"
                . $form
                . "\n <label class='col-md-4 control-label' for='submit'></label>"
                
                . "</div>"
                . "</fieldset>"
               
                . "";

        return ($result);
    }

    function gen_form($campo) {
        $exp = explode('(', $campo->Type);
        $required = "";
        if ($campo->Null == "NO") {
            $required = "required=''";
        }
        $text = '';
        if (count($exp) > 1) {

            $exp[1] = trim($exp[1], ')');


            $text = " <input type='text' id = '" . $campo->Field . "' "
                    . "name = '" . $campo->Field . "' maxlength = '" . $exp[1] . "'  class='form-control input-md' " . $required . ">";
//        }   
        } else if ($campo->Type == "text") {


            $text = " <textarea rows='4' cols='50' name = '" . $campo->Field . "' id = '" . $campo->Field . "'> </textarea >";
        } else {


//        double;
            $text = " <input type='text'  name = '" . $campo->Field . "' id = '" . $campo->Field . "' maxlength = '200'  class='form-control input-md'>";
        }
        return "" . $text . " \n";
    }

    function gen_form_edit($campo) {
        $exp = explode('(', $campo->Type);
        $required = "";
        if ($campo->Null == "NO") {
            $required = "required=''";
        }
        $text = '';
        if (count($exp) > 1) {

            $exp[1] = trim($exp[1], ')');


            $text = " <input type='text' id = '" . $campo->Field . "' name = '" . $campo->Field . "'"
                    . " maxlength = '" . $exp[1] . "'  class='form-control input-md'"
                    . "value = '<?php echo \$item->" . $campo->Field . "?>' " . $required . " >";
        } else if ($campo->Type == "text") {


            $text = " <textarea rows='4' cols='50' name = '" . $campo->Field . "' id = '" . $campo->Field . "'><?php echo \$item->" . $campo->Field . " ?></textarea >";
        } else {


//        double;
            $text = " <input type='text'  name = '" . $campo->Field . "' id = '" . $campo->Field . "' maxlength = '200'  class='form-control input-md' value = '<?php echo \$item->" . $campo->Field . "?>'>";
        }

        return "" . $text . "";
    }

    function escreve_btn($nome_view) {

        $controller = "
<button data-clipboard-target='#" . $nome_view . "' class='copyButton'>
    Copy
</button>
    

";
        return $controller;
    }

    public function icones_bootstrap($bootstrap) {

        if ($bootstrap == 3) {
            $this->icone_editar = '<span class="glyphicon glyphicon-pencil"></span>';
            $this->icone_remover = '<span class="glyphicon glyphicon-remove"></span>';
            $this->icone_adicionar = '<span class="glyphicon glyphicon-plus"></span>';
        } else {
            /**
             *
             * bootstrap4
             */
            $this->icone_editar = '<i class="fas fa-edit"></i>';
            $this->icone_remover = '<i class="fas fa-trash"></i>';
            $this->icone_adicionar = '<i class="fas fa-plus"></i>';
        }
    }
    
    function gen_form_remover($campo) {
        //       public 'campo' => 
//        object(stdClass)[54]
//          public 'Field' => string 'agencia_capital_social' (length=22)
//          public 'Type' => string 'double' (length=6)
//          public 'Null' => string 'YES' (length=3)
//          public 'Key' => string '' (length=0)
//          public 'Default' => null
//          public 'Extra' => string '' (length=0)
//          public 'obrigatorio' => boolean false
        
        $exp = explode('(', $campo->Type);
        $required = "";
        if($campo->Key =="PRI"){
      
        
        $text = "<div class='form-group' hidden>";
       
            $text .= " <input type='text' id = '" . $campo->Field . "' name = '" . $campo->Field . "'"
                    
                    . "value = '<?php echo \$item->" . $campo->Field . "?>' > "
                    ."</div>";
            
        }else{
            $text = "<div class='form-group' >";
           $text .="<span>" . $campo->Field . " <?php echo \$item->" . $campo->Field . "?></span>"
                   ."</div>";
        } 

        return "" . $text . "";
    }

}
