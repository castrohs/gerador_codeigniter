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
        <a href="<?php echo base_url()?>">Voltar</a><br>
        <div id="container">
            <form class="form-horizontal" action="<?php echo base_url('Gerador/gera') ?>"  method="post">
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

                                $auto_complete = "";

                                foreach ($bancos as $key => $banco) {
                                    ?>
                                    <option value=<?php echo $banco->Database; ?>><?php echo $banco->Database; ?></option>
                                    <?php
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    
                    <!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="bootstrap">Versão Bootsptra</label>
  <div class="col-md-4">
    <select id="bootstrap" name="bootstrap" class="form-control">
      <option value="3">3</option>
      <option value="4">4</option>
    </select>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="rules_ativo">Ativar form validation</label>
  <div class="col-md-4">
    <select id="rules_ativo" name="rules_ativo" class="form-control">
      <option value="1">SIM</option>
      <option value="0">NÃO</option>
    </select>
  </div>
</div>



                    <!-- Button -->
                    <div class="form-group ">
                        <label class="col-md-4 control-label" for="submit"></label>
                        <div class="col-md-4">
                            <button id="submit" name="submit" class="btn btn-warning">Buscar Dados</button>
                        </div>
                    </div>

                </fieldset>
            </form>
    </body>