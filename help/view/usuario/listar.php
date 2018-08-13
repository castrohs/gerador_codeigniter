


<div class="container-fluid">
    <div class="row">
        <div class=" col-md-12">
            <a href="#" data-toggle="modal" data-target="#adicionar" class="btn btn-sm btn-success pull-right"
               ><span class="glyphicon glyphicon-plus"></span></a>

        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Lista de Usuários
                    </h3>
                </div>
                <div class="panel-body">


                                <!--<div class="col-md-12 col-xs-12"><p>CNPJ</p><input class="form-control filter" placeholder="Digite o número do CNPJ"  autocomplete='off'  name='usuario'></div>-->

                    <br>
                    <br>

                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>

                                <th>usuario</th>
                                <th>nivel de acesso</th>
                                <th>nova senha</th>

                                <th></th>
                                <th></th>


                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if (isset($todos_usuarios)) {
//    var_dump($todos_usuarios);
                                foreach ($todos_usuarios as $key => $usuario) {
                                    ?>

                                    <tr >
                                <form action="<?php echo base_url(); ?>Usuario/trocaDeSenha" method="post" >    
                                    <td><?php echo $usuario->usuario;
                                    ?></td>
                                    <td>
                                        <?php
                                        if (isset($grupos_acessos)) {

                                            foreach ($grupos_acessos as $key => $grupo) {

                                                if ($usuario->id_nivel_usuario == $grupo->id_nivel_acesso) {
                                                    echo $grupo->nome;
                                                }
                                            }
                                        }
                                        ?>
                                    </td>



                                    <input type="hidden" name="id_usuario" value="<?php echo $usuario->id_usuario ?>">

                                    <td><input type="text" value="" placeholder="nova senha" name="senha" class="input-sm form-control"></td>
                                    <td><button class="btn  btn-primary right"  type="submit"><span class="glyphicon glyphicon-refresh"></span> </button></td>
                                    
                                </form>
                        <td><a href="<?php echo base_url()?>Usuario/editar/<?php echo $usuario->id_usuario ?>" class="btn  btn-info "  ><span class="glyphicon glyphicon-pencil"></span> </a></td>
                                </tr>



                                <?php
                            }
                        } else {
                            echo "nada a ser exibido!";
                        }
                        ?>
                        </form>
                        </tbody>
                    </table>
                    <!--                			<div class="panel-footer">
                                                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>

<!--modal adicionar --> 
<div id="adicionar" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url() ?>Usuario/inserir" method="post" name="adicionar" id="adicionar" class="form-horizontal">


                <fieldset>

                    <!-- Form Name -->
                    <legend>Novo Usuário</legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="usuario">usuario</label>  
                        <div class="col-md-4">
                            <input id="nome" name="usuario" placeholder="usuario" class="form-control input-md" required="" type="text">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="style_class_span">grupo de acesso</label>  
                        <div class="col-md-4">
                            <select name="id_nivel_usuario" class="form-control input-md">
                                <option value="">Nenhum</option>
                                <?php
                                if (isset($grupos_acessos)) {

                                    foreach ($grupos_acessos as $key => $grupo) {
//                                                var_dump($grupo);
                                        ?>
                                        <option value="<?php echo $grupo->id_nivel_acesso; ?>" >

                                            <?php echo $grupo->nome; ?></option>
                                        <?php
                                    }
                                }
                                ?>

                            </select> 

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="senha">Senha</label>  
                        <div class="col-md-4">
                            <input id="email" name="senha" placeholder="" class="form-control input-md" type="text">

                        </div>
                    </div>

                </fieldset>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="submit"></label>
                    <div class="col-md-4">
                        <button id="submit" name="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div> 