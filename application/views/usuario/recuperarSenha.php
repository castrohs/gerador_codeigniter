


<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Viva</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url(); ?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url(); ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    
                    <div class="login-panel panel panel-default" style="margin-top: 5px;">
                        <div class="panel-heading">
                            <h3 class="panel-title"> Trocar de Senha:</h3>
                            
                        </div>
                        <div class="panel-body">
                            <form class=" bd-form-2 bd-page-width animated bd-animation-6  " data-animation-name="bounce" data-animation-event="onload" data-animation-duration="1000ms" data-animation-delay="0ms" data-animation-infinited="false"
                                                          action="<?php echo base_url() ?>Usuario/recuperarSenha"
                                                          name="Usuarioinserir" method="post">
                            <div class="bd-container-inner">
                                <div class="container-fluid">
                               
                           

                                    <div class="bd-separator-2 bd-page-width   bd-separator-center bd-separator-content-center clearfix" >
                                        <div class="bd-container-inner">
                                            <div class="bd-separator-inner">

                                            </div>
                                        </div>
                                    </div>



<div class=" bd-input-14 animated bd-animation-16 form-group" data-animation-name="fadeIn" data-animation-event="hover" data-animation-duration="1000ms" data-animation-delay="0ms" data-animation-infinited="false">
                                                                    <label class="bd-form-label"
                                                                           for="email">Digite e-mail de contato</label>


                                                                    <input type="email"
                                                                           id="email" class="bd-form-input"
                                                                           placeholder="seuemail.com.br"
                                                                           name="email" required="">


                                                                </div>

<div class=" bd-input-14 animated bd-animation-16 form-group" data-animation-name="fadeIn" data-animation-event="hover" data-animation-duration="1000ms" data-animation-delay="0ms" data-animation-infinited="false">
                                                                    <label class="bd-form-label"
                                                                           for=""></label>


    <p>Uma nova senha será reencaminhada para o seu email favor conferi-lo</p>


                                                                </div>
                                                               

                                                                



                                    <div class="bd-separator-6 bd-page-width   bd-separator-center bd-separator-content-center clearfix" >
                                        <div class="bd-container-inner">
                                            <div class="bd-separator-inner">

                                            </div>
                                        </div>
                                    </div>


                                </div>

                             <div class="">
                                                                <button id="submit" name="submit" class="btn btn-warning form-control" style="background-color: #ed9c28;border-color: #d58512" > <b>Recuperação de Senha</b></button>
                                                            </div>

                            </div>
                        </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.maskedinput.js" ></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url(); ?>vendor/metisMenu/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url(); ?>dist/js/sb-admin-2.js"></script>

    </body>

</html>
<script>

    $(".cpf").mask("999.999.999-99");
                $(".telefone").mask("(99)9999.99999");

</script>
                                                        
                                                     
                                                               


                                                                    

                                                                



                                                               
                                                            </div>

                                                           

                                                        </div>
                                                </div>
                                                </form>
                                        </div>
                                        </section>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                </div>

            </div>
        </div></div>

    <div data-smooth-scroll data-animation-time="250" class=" bd-smoothscroll-3"><a href="#" class=" bd-backtotop-1 ">
            <span class="bd-icon-67 bd-icon "></span>
        </a></div>


</body>
</html>


<script>
            $ = jQuery;
            $(function () {

          


                /**
                 * id_dono_bonus = 1 - emissor
                 * id_dono_bonus = 2 - agencia
                 */
//                console.log(jQuery(".id_dono_bonus:checked").val());;
                $("#nome_completo").val('');
                $("#nome_completo_agencia").val('');
                if ($(".id_dono_bonus:checked").val() == 2) {
//                    var value = $("#nome_completo").val();                   
                    // $('#nome_completo').prop('readonly', true);
                    $('.emissor').addClass('hidden');
                    $('.emissor').addClass('hidden');
                    $('.agencia').removeClass('hidden');
                    $('.agencia').removeClass('hidden');
                    $('.usuario').mask("99.999.999/9999-99");
//                    $('.usuario').removeClass('cpf');
                    $('#nome_completo').removeAttr('required');

                } else {
                    $('#nome_completo').prop('required', true);
                    $("#nome_completo_agencia").val('');
//                    $('#nome_completo_agencia').prop('readonly', false);
                    $('.agencia').addClass('hidden');
                    $('.agencia').addClass('hidden');
                    $('.emissor').removeClass('hidden');
                    $('.emissor').removeClass('hidden');
//                     $('.usuario').removeClass('cnpj');
                    $('.usuario').mask("999.999.999-99");
//                    console.log('.usuario');

                }
            }
                    );

            $(".id_dono_bonus").change(function () {


                /**
                 * id_dono_bonus = 1 - emissor
                 * id_dono_bonus = 2 - agencia
                 */
//                console.log(jQuery(".id_dono_bonus:checked").val());;
                $("#nome_completo").val('');
                $("#nome_completo_agencia").val('');
                if ($(".id_dono_bonus:checked").val() == 2) {
//                    var value = $("#nome_completo").val();                   
                    // $('#nome_completo').prop('readonly', true);
                    $('.emissor').addClass('hidden');
                    $('.emissor').addClass('hidden');
                    $('.agencia').removeClass('hidden');
                    $('.agencia').removeClass('hidden');
                    $('.usuario').mask("99.999.999/9999-99");
//                    $('.usuario').removeClass('cpf');
                    $('#nome_completo').removeAttr('required');

                } else {
                    $('#nome_completo').prop('required', true);
                    $("#nome_completo_agencia").val('');
//                    $('#nome_completo_agencia').prop('readonly', false);
                    $('.agencia').addClass('hidden');
                    $('.agencia').addClass('hidden');
                    $('.emissor').removeClass('hidden');
                    $('.emissor').removeClass('hidden');
//                     $('.usuario').removeClass('cnpj');
                    $('.usuario').mask("999.999.999-99");
//                    console.log('.usuario');

                }
            }
            );
            $(function () {
                /**
                 * id_dono_bonus = 1 - emissor
                 * id_dono_bonus = 2 - agencia
                 */
           
                if ($(".id_login:checked").val() == 2) {
//              
                    $('.usuario_login').mask("99.999.999/9999-99");
//                 

                } else {
                   
                    $('.usuario_login').mask("999.999.999-99");

                }
            }
                    );

            $(".id_login").change(function () {


                /**
                 * id_dono_bonus = 1 - emissor
                 * id_dono_bonus = 2 - agencia
                 */
//                console.log(jQuery(".id_dono_bonus:checked").val());;
                
                if ($(".id_login:checked").val() == 2) {
                    $('.usuario_login').mask("99.999.999/9999-99");
                } else {    
                    $('.usuario_login').mask("999.999.999-99");
                }
            }
            );



            jQuery(".cpf").mask("999.999.999-99");
            jQuery(".cnpj").mask("99.999.999/9999-99");
            jQuery(".telefone").mask("(99)999.999.99?9");
//            jQuery(".telefone").mask("(99)322.500.64");;
//            jQuery(".telefone").mask("(99)992.028.196");
           
</script>
<style>
    .emissor{
        color:blue;
    }
    .agencia{
        color:red;
    }

</style>

