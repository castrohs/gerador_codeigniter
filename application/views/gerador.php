<script src="https://cdn.jsdelivr.net/clipboard.js/1.5.3/clipboard.min.js"></script>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bem vindo ao gerador</title>

	
</head>
<body>

<div id="container">
<a href="<?php echo base_url()?>">Voltar</a><br>
Não vou inventar a roda então para formatar o texto <a href="https://www.freeformatter.com/html-formatter.html">Free Formatter</a>
<?php 
    

$auto_complete="";
echo "<a name='Voltar'></a> ";
foreach ($tabelas as $key => $tabela) {
    $nome_tabela_sem_prefixo = strtolower(substr($tabela->$tables_in,$quantas_letras_remover));
   if($tabela->$tables_in != 'ci_sessions'){
        echo "<br><a href='#".$tabela->$tables_in."'>".$nome_tabela_sem_prefixo."</a> ";
        
   
   }
    
}
echo "<br><a href='#AutoComplete'>AutoComplete</a> ";
echo "<br>";
echo "<br>";
echo "<br>";
foreach ($tabelas as $key => $tabela) {
    
    if($tabela->$tables_in != 'ci_sessions'){
    echo "<h1>" .$tabela->$tables_in."</h1>";
    echo "<a name='" .$tabela->$tables_in."'></a> ";
    echo "<a href='#Voltar'>Voltar</a> ";

    
     $campos = $this->DBA->descreve_uma_tabela($tabela->$tables_in);

         
    
             
$primary_key=array();   
$formulario=array();   
$variaveis="";
$variaveis_array="";
foreach ($campos as $key => $campo) {
    

   if($campo->Key =="PRI"){
       
       array_push($primary_key, $campo->Field);
       $campo->obrigatorio = true;
   }else{
       $campo->obrigatorio=false;
   }
      $variaveis = $variaveis . "\n var \$" . $campo->Field . ";";
//        echo $variaveis."<br>";

        $variaveis_array = $variaveis_array . "'" . $campo->Field. "'";
        if ($key < sizeof($campos)-1) {
            $variaveis_array = $variaveis_array . ",";
        } 
           $object = new stdClass();
           $object->formulario =  $this->escreveview->gen_form($campo);
           $object->formulario_edit =$this->escreveview-> gen_form_edit($campo);
           
           $object->campo = $campo;
           
        array_push($formulario,  $object);
    }
//    var_dump($primary_key);
//    var_dump($tabela->$tables_in);

//
    $nome_tabela_sem_prefixo = strtolower(substr($tabela->$tables_in,$quantas_letras_remover));
    $prefixoModel = ("Model");
    $nome_tabela = strtolower(($tabela->$tables_in));
    $nome_controller = ucwords($nome_tabela_sem_prefixo);
    $nome_model = ucwords($nome_tabela_sem_prefixo).$prefixoModel;
    
    
    $auto_complete=$auto_complete. " ".$this->escreveautocomplete->pre_add_escreve_auto_complete($nome_model);
    
//    $auto_complete=$auto_complete. " ".$this->escreve->pre_add_escreve_auto_complete($tabela->$tables_in);
    $nome_view = lcfirst($nome_tabela_sem_prefixo);
    
    echo "<div id=div_".$nome_tabela.">";
    echo "<h3>controller: ".$nome_controller."</h3>";
    
    echo $this->escreveview->escreve_btn("div_".$nome_controller."_vw") ;
    echo "<div id='div_".$nome_controller."_vw'>";
     $echo = $this->escrevecontroller->escreve_controller($nome_view,$nome_model,$primary_key,$rules_ativo)  ;
     highlight_string($echo);
    echo "</div>";
    
    echo "<h3>model: ".$nome_model."</h3>";   
    echo $this->escreveview->escreve_btn("div_".$nome_model."_model") ;
    echo "<div id='div_".$nome_model."_model'>";
    $echo = $this->escrevemodel->escreve_model($nome_model,$nome_tabela,$variaveis,$variaveis_array,$primary_key) ;
    
    highlight_string($echo);
    echo "</div>";
//    echo "<h3>Novo Item</h3>";   
//    echo $this->escreveview->escreve_btn("div_".$nome_tabela."_add") ;
//    echo "<div id='div_".$nome_tabela."_add'>";
//    $echo = $this->escreveview->escreve_formulario($nome_controller,$formulario) ;
//    highlight_string($echo);
//    echo "</div>";
//    echo "<h3>Edição de Item</h3>";   
//    echo $this->escreveview->escreve_btn("div_".$nome_tabela."_edit") ;
//    echo "<div id='div_".$nome_tabela."_edit'>";
//    $echo = $this->escreveview->escreve_formulario_edit($nome_controller,$formulario) ;
//    highlight_string($echo);
    echo "</div>";
    echo "<h3>Pagina listar</h3>";   
    echo $this->escreveview->escreve_btn("div_".$nome_tabela."_pagina_listar") ;
    echo "<div id='div_".$nome_tabela."_pagina_listar'>";
    
    $echo = $this->escreveview->escreve_pagina_listar($nome_controller,$formulario,$bootstrap,$rules_ativo);
    highlight_string($echo);
    echo "</div>";

    echo "</div>";
    }
    }   
   
        
    ?>
<div style="border-top-color: black ; border-width: 1px;">
        <h3>Auto complete</h3><?php
    echo "<a href='#Voltar'>Voltar</a> ";
    echo "<a name='AutoComplete'></a> ";
    echo "<br> ";
    
    echo $this->escreveview->escreve_btn("div_auto_complete") ;
    
    
  echo "<div id='div_auto_complete'>";
    $echo = $this->escreveautocomplete->escreve_auto_complete($auto_complete); 
    highlight_string($echo);
echo "</div>";

    ?>

</div>
<div style="border-top-color: black ; border-width: 1px;">
        <h3>Backup Mysql Link</h3><?php
    echo "<a href='#Voltar'>Voltar</a> ";
    echo "<a name='backup_data_base'></a> ";
    echo "<br> ";
    
    echo $this->escreveview->escreve_btn("backup_data_base") ;
    
    
  echo "<div id='backup_data_base'>";
  
  
    highlight_string($this->escrevemysqlbackup->gera($onde_salvar,$tabelas));
echo "</div>";

    ?>

</div>
</div>
    <br>
    <br>
    <br>
    <br>
</body>
</html>


<?php





?>


<style>
    
    code{
        overflow:auto;  /* barra de rolagem*/

        border:1px solid #000;  /* edite cor e tipo de borda */
        color:#00a1dc;  /* cor da fonte*/
        font-size:85%;  /* tamanho da fonte */
        height:150px; /* edite a altura máxima da caixa*/
        display:block;
        white-space:pre;
        text-align:left;
        word-wrap:break-word;
        padding:0 10px 5px 20px;
}
    
</style>





<script>
var clipboard = new Clipboard('.copyButton');
clipboard.on('success', function(e) {
//    console.log(e);
});
clipboard.on('error', function(e) {
//    console.log(e);
});
</script>