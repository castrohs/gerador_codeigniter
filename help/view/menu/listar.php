
<?php
if (isset($insert_result)) {

    if ($insert_result) {
        $msg = "salvo com sucesso.";
    } else {
        $msg = "não salva.";
    }
    ?>
    <script type="text/javascript">
        alert('Menu <?php echo $msg; ?>');

    </script>	
    <?php
}
?>

<div class="col-md-12">
    <div class="col-md-12">
        <a href="#" data-toggle="modal" data-target="#adicionar" class="btn btn-sm btn-success pull-right"
           ><span class="glyphicon glyphicon-plus"></span></a>
        <br>    
    </div>
    <br><br>    
    <div class="col-md-12 hidden-xs"></div>

    <div class="col-md-12 col-xs-12">

        <div class="panel panel-warning">

            <div class="panel-heading">Lista de Menu</div>
            <div class="panel-body">


                <div class="col-md-12 col-xs-12"><p></p><input class="form-control filter" placeholder="Digite o menu a ser buscado"  autocomplete='off'  name='titul'></div>

                <!--                <br>
                                <br>
                                <br>
                                <br>-->

                <table class="table table-responsive table-hover">
                    <thead>
                        <tr>

                            <th class="hidden">titul</th>

                            <th >titulo</th>
                            <th class="col-sm-2">grupo de acesso</th>
                            <th></th>
                            <th></th>



                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (isset($busca_todas)) {

                            foreach ($busca_todas as $key => $menu) {
//                                var_dump($menu);
                                ?>

                                <tr >
                                    <td  class="hidden"><?php echo $menu->titulo; ?></td>





            <!--<input type="text" class="form-control" name="id_menu_pai" value="<?php echo $menu->id_menu_pai; ?>">-->

                                    <td ><?php echo $menu->titulo; ?></td>

                                    <td >


                                        <?php
                                        if (isset($grupos_acessos)) {

                                            foreach ($grupos_acessos as $key => $grupo) {
//                                                var_dump($grupo);
                                                if ($menu->id_nivel_acesso == $grupo->id_nivel_acesso) {
                                                    echo $grupo->nome;
                                                    break;
                                                }
                                            }
                                        }
                                        ?>


                                    </td>



                                    <td><a href="#" class="btn  btn-primary right" data-toggle="modal" data-target="#editar<?php echo $menu->id_menu; ?>"><span class="glyphicon glyphicon-pencil"></span> </a></td>

                            <input type="hidden" name="id_menu" value="<?php echo $menu->id_menu; ?>">
                            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id_usuario'] ?>">
                            <td>
                                <a href="#" data-toggle="modal" data-target="#remover<?php echo $menu->id_menu; ?>" class="btn btn-danger">

                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>
                            </td>
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
</div>

<?php
if (isset($busca_todas)) {
//                            var_dump($busca_todas);
    foreach ($busca_todas as $key => $menu) {
        ?>

        <!-- The Modal -->

        <div class="modal fade" id="editar<?php echo $menu->id_menu; ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body">

                        <form action="<?php echo base_url(); ?>Menu/atualizar" method="post" class="form-horizontal">    
                            <fieldset>

                                <!-- Form Name -->
                                <legend>Editar Menu: </legend>


                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="style_class_span">posicao</label>  
                                    <div class="col-md-4">
                                        <input type="text" class="form-control input-md" name="posicao" value="<?php echo $menu->posicao; ?>">

                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="style_class_span">grupo de acesso</label>  
                                    <div class="col-md-4">
                                        <select name="id_nivel_acesso" class="form-control input-md">
                                            <option value=""   <?php if ($grupo->id_nivel_acesso == null) echo "selected" ?>>Nenhum</option>
                                            <?php
                                            if (isset($grupos_acessos)) {

                                                foreach ($grupos_acessos as $key => $grupo) {
//                                                var_dump($grupo);
                                                    ?>
                                                    <option value="<?php echo $grupo->id_nivel_acesso; ?>" 
                                                            <?php if ($menu->id_nivel_acesso == $grupo->id_nivel_acesso) echo "selected" ?>>
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
                                    <label class="col-md-4 control-label" for="style_class_span">Titulo</label>  
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="titulo" value="<?php echo $menu->titulo; ?>">

                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="caminho">Caminho</label>  
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="caminho" value="<?php echo $menu->caminho; ?>">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="style_class_span">menu vinculado</label>  
                                    <div class="col-md-4">
                                        <select name="id_menu_pai" class="form-control">
                                            <option value=""   <?php if ($menu->id_menu_pai == null) echo "selected" ?>>Nenhum</option>
                                            <?php
                                            if (isset($busca_todas)) {
//                                            var_dump($busca_todas);
                                                foreach ($busca_todas as $key => $menu_select) {
                                                    ?>
                                                    <option value="<?php echo $menu_select->id_menu; ?>" 
                                                            <?php if ($menu_select->id_menu == $menu->id_menu_pai) echo "selected" ?>>
                                                        <?php echo $menu_select->titulo; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>

                                        </select> 
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="style_class_span">style_class_span</label>  
                                    <div class="col-md-4">
                                        <input id="style_class_span" name="style_class_span" placeholder="" class="form-control input-md" type="text" value="<?php echo $menu->style_class_span ?>">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="class_span">class_span</label>  
                                    <div class="col-md-4">
                                        <input id="class_span" name="class_span" placeholder="" class="form-control input-md" type="text" value="<?php echo $menu->class_span ?>">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="style_span_titulo">style_span_titulo</label>  
                                    <div class="col-md-4">
                                        <input id="style_span_titulo" name="style_span_titulo" placeholder="" class="form-control input-md" type="text" value="<?php echo $menu->style_span_titulo ?>">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="style_class_b">style_class_b</label>  
                                    <div class="col-md-4">
                                        <input id="style_class_b" name="style_class_b" placeholder="" class="form-control input-md" type="text" value="<?php echo $menu->style_class_b ?>">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="class_b">class_b</label>  
                                    <div class="col-md-4">
                                        <input id="class_b" name="class_b" placeholder="" class="form-control input-md" type="text" value="<?php echo $menu->class_b ?>">

                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="submit"></label>
                                    <div class="col-md-4">
                                        <input type="hidden" name="id_menu" value="<?php echo $menu->id_menu; ?>">
                                        <button id="submit" name="submit" class="btn btn-success">Atualizar</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>

                    </div>



                </div>
            </div>
        </div>
        <?php
    }
}
?>
<?php
if (isset($busca_todas)) {
//                            var_dump($busca_todas);
    foreach ($busca_todas as $key => $menu) {
        ?>

        <!-- The Modal -->

        <div class="modal fade" id="remover<?php echo $menu->id_menu; ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body">

                        <form action="<?php echo base_url(); ?>Menu/excluir" method="post" class="form-horizontal">    
                            <fieldset>

                                <!-- Form Name -->
                                <legend>Remover Menu: <?php echo $menu->titulo; ?></legend>


                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="submit"></label>
                                    <div class="col-md-4">
                                        <input type="hidden" name="id_menu" value="<?php echo $menu->id_menu; ?>">
                                        <button id="submit" name="submit" class="btn btn-danger">Excluir</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>

                    </div>



                </div>
            </div>
        </div>
        <?php
    }
}
?>

<?php $this->load->view("scripts/formato_data"); ?>
<?php $this->load->view("scripts/formato_monetario"); ?>
<?php $this->load->view("scripts/multifilter"); ?>
<style>
    table{width:200px;}
    td{width:40%}
</style>
<!--modal adicionar --> 
<div id="adicionar" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="<?php echo base_url() ?>Menu/cadastrar" method="post" name="adicionar" id="adicionar" class="form-horizontal">

                <fieldset>

                    <!-- Form Name -->
                    <legend>Novo Menu </legend>


                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="style_class_span">posicao</label>  
                        <div class="col-md-4">
                            <input type="text" class="form-control input-md" name="posicao" value="<?php echo $menu->posicao; ?>">

                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="style_class_span">grupo de acesso</label>  
                        <div class="col-md-4">
                            <select name="id_nivel_acesso" class="form-control input-md">
                                <option value=""   <?php if ($menu->id_menu_pai == null) echo "selected" ?>>Nenhum</option>
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
                        <label class="col-md-4 control-label" for="titulo">Titulo</label>  
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="titulo" value="">

                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="caminho">Caminho</label>  
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="caminho" value="">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="style_class_span">menu vinculado</label>  
                        <div class="col-md-4">
                            <select name="id_menu_pai" class="form-control">
                                <option value=""   <?php if ($menu->id_menu_pai == null) echo "selected" ?>>Nenhum</option>
                                <?php
                                if (isset($busca_todas)) {
//                                            var_dump($busca_todas);
                                    foreach ($busca_todas as $key => $menu_select) {
                                        ?>
                                        <option value="<?php echo $menu_select->id_menu; ?>"> 

                                            <?php echo $menu_select->titulo; ?></option>
                                        <?php
                                    }
                                }
                                ?>

                            </select> 
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="style_class_span">style_class_span</label>  
                        <div class="col-md-4">
                            <input id="style_class_span" name="style_class_span" placeholder="" class="form-control input-md" type="text" >

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="class_span">class_span</label>  
                        <div class="col-md-4">
                            <input id="class_span" name="class_span" placeholder="" class="form-control input-md" type="text">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="style_span_titulo">style_span_titulo</label>  
                        <div class="col-md-4">
                            <input id="style_span_titulo" name="style_span_titulo" placeholder="" class="form-control input-md" type="text">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="style_class_b">style_class_b</label>  
                        <div class="col-md-4">
                            <input id="style_class_b" name="style_class_b" placeholder="" class="form-control input-md" type="text">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="class_b">class_b</label>  
                        <div class="col-md-4">
                            <input id="class_b" name="class_b" placeholder="" class="form-control input-md" type="text">

                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="submit"></label>
                        <div class="col-md-4">

                            <button id="submit" name="submit" class="btn btn-success">Cadastrar</button>
                        </div>
                    </div>

                </fieldset>
            </form>

        </div>
    </div>
</div>