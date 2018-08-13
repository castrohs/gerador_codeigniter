
<section>

    <nav class="navbar navbar-default" >

        <div class="col-md-12 col-xs-12">


            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <?php
            if ($this->SessaoModel->verificaSessao()) {
                ?>

            <div class="pull-left">
<!--                <a href="<?php echo base_url()?>usuario">
                        <img src="<?php echo base_url(); ?>img/logo-super.png">
                    </a>-->
                </div>     
                <div class=" pull-right">
                    <div class="collapse navbar-collapse navbar-right pull-right" id="bs-example-navbar-collapse-1">

                        <?php
                                     
                        if (isset($menus)) {
                            foreach ($menus as $menu) {
                                ?>

                                <?php
                                if (isset($menu->children)) {
                                    ?>
                                    <ul class="nav navbar-nav">
                                        <li class="dropdown"> 
                                            <a  data-toggle="dropdown" class="dropdown-toggle" role="button" aria-expanded="false" href="#"><span class="<?php echo $menu->class_span; ?>" style="<?php echo $menu->style_class_span ?>"></span> <span style="<?php echo $menu->style_span_titulo ?>"><?php echo $menu->titulo; ?></span> <b class="<?php echo $menu->class_b ?>" style="<?php echo $menu->style_class_b ?>"></b></a>
                                            <ul class="dropdown-menu"  role="menu">


                                                <?php foreach ($menu->children as $child) {
                                                    ?>
                                                    <li class="">
                                                        <a href="<?php echo base_url() . $child->caminho; ?>"><span class="<?php echo $child->class_span; ?>" style="<?php echo $child->style_class_span ?>"></span> <?php echo $child->titulo; ?>
                                                        </a>
                                                    </li>

                                                <?php }
                                                ?>
                                            </ul>
                                        </li>
                                    </ul>
                                    <?php
                                } else {
                                    ?> 
                                    <ul class="nav navbar-nav">
                                        <li >
                                            <a href="<?php echo base_url() . $menu->caminho; ?>" >                                    
                                                <span class="<?php echo $menu->class_span; ?>" style="<?php echo $menu->style_class_span ?>"></span> <span style="<?php echo $menu->style_span_titulo ?>"><?php echo $menu->titulo; ?></span> <b class="<?php echo $menu->class_b ?>" style="<?php echo $menu->style_class_b ?>"></b>

                                            </a>

                                        </li>



                                    </ul>
                                    <?php
                                }
                            }
                        }
                        ?>
                        <ul class="nav navbar-nav navbar-right margin-left-100">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php if (!$this->SessaoModel->verificaSessao()) {
                                        ?>
                                        <span class="glyphicon glyphicon-user"></span> Usuário <b class="caret"></b>
                                        <?php
                                    } else {
                                        ?>
                                        <span class="glyphicon glyphicon-user"></span> <?php
                                        echo $_SESSION['nome_completo'];
                                        ?> <b class="caret"></b>
                                        <?php
                                    }
                                    ?>
                                </a>
                                <ul class="dropdown-menu" role="menu">

                                    <li><a href="<?php echo base_url() ?>Usuario/trocaDeSenha/<?php echo $_SESSION['id_usuario'] ?>">Trocar Senha</a></li>  
                                    <li><a href="<?php echo base_url() ?>Usuario/det/<?php echo $_SESSION['id_usuario'] ?>">Atualizar Informações</a></li>
                                    <li><a href="<?php echo base_url() ?>Usuario/logout">Desconectar</a></li>

                                </ul>
                            </li>
                        </ul></ul>    
                    </div>
                    <?php
                }
                ?>
                <?php
                if (!$this->SessaoModel->verificaSessao()) {
                    ?>

                    <form class="form-inline" action="<?php echo base_url() ?>Usuario/login" method="post">
                        <fieldset>

                            <div class="pull-left"> 
                            </div>                        
                            <div class=" pull-right" style="margin-bottom: 20px;">
                                <div class="visible-lg visible-md"> <BR></div> 
                                <!-- Form Name -->
                                <!--<legend>Form Name</legend>-->

                                <!-- Text input-->
                                <div class="form-group" >

                                    <label class="col-md-4 control-label" for="usuario">Usuario</label>  
                                    <div class="col-md-2">
                                        <input title="Digite um seu CPF" id="usuario" name="usuario" placeholder="999.999.999-99" class="form-control input-md cpf" required="" type="text"> 

                                    </div>
                                </div>
                                
                                <!-- Password input-->
                                <div class="form-group" style="margin-left: 30px;">
                                    <label class="col-md-4 control-label" for="senha">Senha</label>
                                    <div class="col-md-4">
                                        <input title="Digite sua senha" id="senha" name="senha" placeholder="999" class="form-control input-md" required="" type="password">

                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="submit"></label>
                                    <div class="col-md-4">
                                        <button id="submit" name="submit" class="btn btn-success" style="margin-right: 60px;">Autenticar-se</button>
                                    </div>
                                </div>
                                <?php
                                    if (isset($erro_login)) {
                                        ?>
                                <center>
                                    <br>
                                        <b><p style="color:red"><?php echo $erro_login ?></p></b>
                                        </center>
                                            <?php
                                    }
                                    ?>
                                <center>
                                            <b><p><a href="<?php echo base_url('Usuario/recuperarSenha')?>" style="color:black">Esqueceu sua senha? Deseja troca-la?</a></p></b>

                                        </center>

                            </div>
                        </fieldset>
                    </form>
                <?php }
                ?>
            </div>
    </nav>
</section>



<script>

    jQuery(".cpf").mask("999.999.999-99");
</script>
