



<!DOCTYPE html>
<html dir="ltr">
    <head>

        <script>
            var themeHasJQuery = !!window.jQuery;
        </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js?1.0.657"></script>
        <script>
            window._$ = jQuery.noConflict(themeHasJQuery);
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css?1.0.657" media="screen" />
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js?1.0.657"></script>
        <!--[if lte IE 9]>
        <link rel="stylesheet" href="./assets/css/layout.ie.css?1.0.657">
        <script src="./assets/js/layout.ie.js?1.0.657"></script>
        <![endif]-->
        <link class="" href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,regular,italic,600,600italic,700,700italic,800,800italic&subset=latin' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/layout.core.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/CloudZoom.js?1.0.657"></script>

        <title>Home Page</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css?1.0.657">
        <script src="<?php echo base_url(); ?>assets/js/script.js?1.0.657"></script>
        <meta charset="utf-8">



        <meta name="keywords" content="HTML, CSS, JavaScript">


        <style>a {
                transition: color 250ms linear;
            }
        </style>

        <!--
        personalização
        -->
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.maskedinput.js" ></script>
    </head>

    <?php
    ?>
    <body class=" bootstrap bd-body-1 
          bd-homepage bd-pagebackground bd-margins"
          
          >
        <header class=" bd-headerarea-1 bd-margins">

        </header>

        <div class=" bd-stretchtobottom-1 bd-stretch-to-bottom" data-control-selector=".bd-contentlayout-1">
            <div class="bd-contentlayout-1 bd-page-width   bd-sheetstyles  bd-no-margins bd-margins"  style="background-color: #cdcdcd">
                <div class="bd-container-inner">

                    <div class="bd-flex-vertical bd-stretch-inner bd-no-margins">

                        <div class="bd-flex-horizontal bd-flex-wide bd-no-margins">

                            <div class="bd-flex-vertical bd-flex-wide bd-no-margins">


                                <div class=" bd-layoutitemsbox-1 bd-flex-wide bd-margins">
                                    <div class=" bd-content-13">

                                        <div class=" bd-htmlcontent-1 bd-margins" 
                                             data-page-id="page.0">
                                            <section class=" bd-section-8 bd-page-width bd-tagstyles " id="section8" data-section-title="Section" style="background-color: #cdcdcd">
                                                <div class="bd-container-inner bd-margins clearfix">
                                                    <form class=" bd-form-2 bd-page-width animated bd-animation-6  " data-animation-name="bounce" data-animation-event="onload" data-animation-duration="1000ms" data-animation-delay="0ms" data-animation-infinited="false"
                                                          action="<?php echo base_url() ?>Usuario/recuperarSenha"
                                                          name="Usuarioinserir" method="post"
                                                          
                                                          >
                                                        <div class="row">
                    <div class="col-md-12 text-center hidden-lg hidden-md">
                        <br>
                        <br>

                        <img alt="Viking Image " src="<?php echo base_url('uploads/img_menor') ?>" />
                        <br>
                    </div>
                    <div class="col-md-12 text-center hidden-sm hidden-xs">
                        <br>
                        <br>

                        <img alt="Viking Image" src="<?php echo base_url('uploads/img_maior') ?>" />
                        <br>                            <br>

                    </div>

                </div>
                                                        
                                                        <div class="bd-container-inner">
                                                            <div class="container-fluid">
                                                                <h1 class=" bd-textblock-21 bd-content-element">
                                                                    Trocar de Senha:
                                                                </h1>

                                                          
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
                                                               

                                                                <div class=" bd-input-19 animated bd-animation-21 form-group" data-animation-name="fadeIn" data-animation-event="hover" data-animation-duration="1000ms" data-animation-delay="0ms" data-animation-infinited="false">
                                                                    <label class="bd-form-label"
                                                                           for="usuario">Digite  <span class="emissor"> seu <b>CPF</b></span><span class="agencia"> <b>CNPJ</b> da Agência</span></label>


                                                                    <input type="text"
                                                                           id="usuario" 
                                                                           class="bd-form-input usuario"

                                                                           name="usuario" required="">


                                                                </div>



                                                                <div class=" bd-input-19 animated bd-animation-21 form-group" data-animation-name="fadeIn" data-animation-event="hover" data-animation-duration="1000ms" data-animation-delay="0ms" data-animation-infinited="false">
                                                                    <label class="bd-form-label"
                                                                           for="senha">Digite sua nova senha para acessar o sistema</label>


                                                                    <input type="password"
                                                                           id="senha" class="bd-form-input"
                                                                           placeholder="9999"
                                                                           name="senha" 
                                                                           required=""
                                                                           >


                                                                </div>



                                                               
                                                            </div>

                                                            <div class="">
                                                                <button id="submit" name="submit" class="btn btn-warning form-control" style="background-color: #ed9c28;border-color: #d58512" > <b>Atualizar</b></button>
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

