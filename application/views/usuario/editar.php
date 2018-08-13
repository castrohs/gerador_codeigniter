
<div class="col-md-12">

    <form action="<?php echo base_url(); ?>Usuario/editar" method="post" class="form-horizontal">    
        <fieldset>

            <!-- Form Name -->
            <legend><center>Editar usuário</center></legend>

            

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="usuario">usuario</label>  
                <div class="col-md-4">
                    <input id="usuario" name="usuario" placeholder="" class="form-control input-md" required="" type="text" value="<?php echo $usuario->usuario ?>">

                </div>
            </div>

 

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="style_class_span">grupo de acesso</label>  
                <div class="col-md-4">
                    <select name="grupo_acesso_id" class="form-control input-md">
                        <option value=""   <?php if ($usuario->grupo_acesso_id == null) echo "selected" ?>>Nenhum</option>
                        <?php
                        if (isset($grupos_acessos)) {

                            foreach ($grupos_acessos as $key => $grupo) {
//                                                var_dump($grupo);
                                ?>
                                <option value="<?php echo $grupo->id_nivel_acesso; ?>" 
                                        <?php if ($usuario->grupo_acesso_id == $grupo->id_nivel_acesso) echo "selected" ?>>
                                    <?php echo $grupo->nome; ?></option>
                                <?php
                            }
                        }
                        ?>

                    </select> 

                </div>
            </div>


            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
                    <input type="hidden" name="usuario_id" value="<?php echo $usuario->usuario_id ?>">
                    <button id="singlebutton" name="submit" class="btn btn-success">Atualizar</button>
                </div>
            </div>

</form>

            </div>
<div class="col-md-12">

    <form action="<?php echo base_url(); ?>Usuario/editar" method="post" class="form-horizontal">    
        <fieldset>

            <!-- Form Name -->
            <legend><center>Desativar usuário</center></legend>

            <?php
//            $usuario = $todos_usuarios[0];
            ?>


            <?php if($usuario->ativo == 1){?>
            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
                    <input type="hidden" name="usuario_id" value="<?php echo $usuario->usuario_id ?>">
                    <input type="hidden" name="ativo" value="0">
                    <button id="singlebutton" name="submit" class="btn btn-danger"><span></span>Desativar</button>
                    <br><small> (usuário impossibilitado de login no sistema)</small>
                </div>
            </div>
            <?php }else{?>
              <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
                    <input type="hidden" name="usuario_id" value="<?php echo $usuario->usuario_id ?>">
                    <input type="hidden" name="ativo" value="1">
                    <button id="singlebutton" name="submit" class="btn btn-success"><span></span>Ativar</button>
                    
                </div>
            </div>
            <?php }?>

</form>

            </div>
