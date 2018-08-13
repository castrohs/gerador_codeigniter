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
    <form class="form-horizontal" action="<?php echo base_url('Welcome/mostra_dados_de_um_banco')?>">
<fieldset>

<!-- Form Name -->
<legend>Escolha um banco de dados</legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="novo_banco">Banco de Dados</label>
  <div class="col-md-4">
    <select id="novo_banco" name="novo_banco" class="form-control">
<?php 
//    var_dump($tabelas);

$auto_complete="";

foreach ($bancos as $key => $banco) {
    ?>
          <option value=<?php echo $banco->Database ;?>><?php echo $banco->Database ;?></option>
        <?php
}
?>
        
            </select>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-warning">Buscar Dados</button>
  </div>
</div>

</fieldset>
</form>
</body>