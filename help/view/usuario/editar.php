
<div class="col-md-12">

    <form action="<?php echo base_url(); ?>Usuario/editar" method="post" class="form-horizontal">    
        <fieldset>

            <!-- Form Name -->
            <legend><center>Editar usuário</center></legend>

            <?php
            $usuario = $todos_usuarios[0];
            ?>

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
                    <select name="id_nivel_usuario" class="form-control input-md">
                        <option value=""   <?php if ($usuario->id_nivel_usuario == null) echo "selected" ?>>Nenhum</option>
                        <?php
                        if (isset($grupos_acessos)) {

                            foreach ($grupos_acessos as $key => $grupo) {
//                                                var_dump($grupo);
                                ?>
                                <option value="<?php echo $grupo->id_nivel_acesso; ?>" 
                                        <?php if ($usuario->id_nivel_usuario == $grupo->id_nivel_acesso) echo "selected" ?>>
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
                    <input type="hidden" name="id_usuario" value="<?php echo $usuario->id_usuario ?>">
                    <button id="singlebutton" name="submit" class="btn btn-success">Atualizar</button>
                </div>
            </div>

</form>

            </div>
