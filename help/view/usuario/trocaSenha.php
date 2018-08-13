

<script type='text/javascript'>
    $(document).ready(function () {
        $('.filter').multifilter()
    });

</script>



<div class="col-md-12">
    <div class="col-md-12 hidden-xs"></div>
    <div class="col-md-12 col-xs-12">
        <div class="panel panel-warning">
            <div class="panel-heading">Lista de Usuários</div>
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


                        </tr>
                    </thead>
                    <tbody>
<form action="<?php echo base_url(); ?>Usuario/trocaDeSenha" method="post" >    
                        <?php
                        
                        if (isset($todos_usuarios)) {
//    var_dump($todos_usuarios);
                            foreach ($todos_usuarios as $key => $usuario) {
                                 
                                ?>

                                <tr >

                                    <td><?php echo $usuario->usuario; ?></td>
                                    <td><?php  if (isset($grupos_acessos)) {
                                                
                                                foreach ($grupos_acessos as $key => $grupo) {
                                                    
                                                    if ($usuario->id_nivel_usuario == $grupo->id_nivel_acesso) {
                                                            echo $grupo->nome;
                                                        }
                                                    }
                                            }?>
                </td>

                
                
                <input type="hidden" name="id_usuario" value="<?php echo $usuario->id_usuario?>">
                    
                <td><input type="text" value="" placeholder="nova senha" name="senha" class="input-sm form-control"></td>
                <td><button class="btn  btn-primary right"  type="submit"><span class="glyphicon glyphicon-refresh"></span> </button></td>
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
            </div>
        </div>
    </div>
</div>
