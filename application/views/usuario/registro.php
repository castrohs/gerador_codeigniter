
<?php
if (isset($insert_result)) {

    if ($insert_result) {
        $msg = "salvo com sucesso. Espere pela a sua ativação";
    } else {
        $msg = "não salva.";
    }
    ?>
    <script type="text/javascript">
        alert('Usuário <?php echo $msg; ?>');

    </script>	
    <?php
}
?>

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
          bd-homepage bd-pagebackground bd-margins">
        <header class=" bd-headerarea-1 bd-margins">

        </header>

        <div class=" bd-stretchtobottom-1 bd-stretch-to-bottom" data-control-selector=".bd-contentlayout-1">
            <div class="bd-contentlayout-1 bd-page-width   bd-sheetstyles  bd-no-margins bd-margins" >
                <div class="bd-container-inner">

                    <div class="bd-flex-vertical bd-stretch-inner bd-no-margins">

                        <div class="bd-flex-horizontal bd-flex-wide bd-no-margins">

                            <div class="bd-flex-vertical bd-flex-wide bd-no-margins">


                                <div class=" bd-layoutitemsbox-1 bd-flex-wide bd-margins">
                                    <div class=" bd-content-13">

                                        <div class=" bd-htmlcontent-1 bd-margins" 
                                             data-page-id="page.0">
                                            <section class=" bd-section-8 bd-page-width bd-tagstyles " id="section8" data-section-title="Section">
                                                <div class="bd-container-inner bd-margins clearfix">
                                                    <form class=" bd-form-2 bd-page-width animated bd-animation-6  " data-animation-name="bounce" data-animation-event="onload" data-animation-duration="1000ms" data-animation-delay="0ms" data-animation-infinited="false"
                                                          action="<?php echo base_url() ?>Usuario/inserir"
                                                          name="Usuarioinserir" method="post">
                                                        <div class="bd-container-inner">
                                                            <div class="container-fluid">
                                                                <h2 class=" bd-textblock-21 bd-content-element">
                                                                    Registre-se:
                                                                </h2>

                                                                

                                                                <div class="bd-separator-2 bd-page-width   bd-separator-center bd-separator-content-center clearfix" >
                                                                    <div class="bd-container-inner">
                                                                        <div class="bd-separator-inner">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="row">  <span style="color:blue" >Azul campos com os dados da Free Lancer</span></div>
                                                                    <div class="row"> <span  style="color:red">Vermelho campos com os dados da Agência</span></div>
                                                                </div>
                                                               
                                                                <label class="bd-form-label ">Selecione seu tipo de perfil</label>
                                                                <div class=" bd-radiobutton-4  form-inline" data-animation-name="fadeIn" data-animation-event="hover" data-animation-duration="1000ms" data-animation-delay="0ms" data-animation-infinited="false">

                                                                    <div class="radio bd-form-radiobutton radio-inline">
                                                                        <label for="id_dono_bonus-1">
                                                                            <input name="id_dono_bonus" id="id_dono_bonus-1" value="1" type="radio" class="bd-form-radiobutton-label id_dono_bonus" checked="checked">
                                                                            <span style="color:blue" >Free Lancer</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="radio bd-form-radiobutton radio-inline">
                                                                        <label for="id_dono_bonus-0">
                                                                            <input name="id_dono_bonus" id="id_dono_bonus-0" value="2"  type="radio" class="bd-form-radiobutton-label id_dono_bonus ">

                                                                            <span  style="color:red">Agência</span>
                                                                        </label>
                                                                    </div> 



                                                                </div>
                                                                <div class="bd-separator-2 bd-page-width   bd-separator-center bd-separator-content-center clearfix" >
                                                                    <div class="bd-container-inner">
                                                                        <div class="bd-separator-inner">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--<br>-->
                                                                <div class=" bd-input-2 animated bd-animation-2 form-group" data-animation-name="fadeIn" data-animation-event="hover" data-animation-duration="1000ms" data-animation-delay="0ms" data-animation-infinited="false">
                                                                    <label class="bd-form-label freelancer"
                                                                           for="nome_completo" id="lb_nome_completo">Nome completo do   <span>freelancer</span></label>


                                                                    <input type="text"
                                                                           id="nome_completo" class="bd-form-input freelancer"
                                                                           placeholder="Digite seu nome"
                                                                           name="nome_completo" 
                                                                           required=""
                                                                           >


                                                                </div>

                                                                <div class=" bd-input-5 animated bd-animation-4 form-group" data-animation-name="fadeIn" data-animation-event="hover" data-animation-duration="1000ms" data-animation-delay="0ms" data-animation-infinited="false">
                                                                    <label class="bd-form-label"
                                                                           style="color:red"
                                                                           for="nome_completo_agencia" id="lb_nome_completo_agencia">Nome completo de sua   <span>Agência</span></label>


                                                                    <input type="text"
                                                                           id="nome_completo_agencia" class="bd-form-input"
                                                                           placeholder="Nome de sua Agência"
                                                                           required=""
                                                                           name="nome_completo_agencia" title="Digite neste campo o nome ou Free Lancer ou da Agência">


                                                                </div>

                                                                <div class="bd-separator-6 bd-page-width   bd-separator-center bd-separator-content-center clearfix" >
                                                                    <div class="bd-container-inner">
                                                                        <div class="bd-separator-inner">

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class=" bd-select-2 animated bd-animation-5 form-group" data-animation-name="fadeIn" data-animation-event="hover" data-animation-duration="1000ms" data-animation-delay="0ms" data-animation-infinited="false">
                                                                    <label class="bd-form-label"
                                                                           for="id_estado">Selecione o Estado <span class="freelancer"> do Free Lancer</span><span class="agencia"> da Agência</span></label>



                                                                    <select id="id_estado" name="id_estado" class="form-control">
                                                                        <?php
                                                                        foreach ($estados as $estado) {
                                                                            ?>
                                                                            <option value="<?php echo $estado->id_estado; ?>"><?php echo $estado->nome; ?></option>
                                                                        <?php }
                                                                        ?>
                                                                    </select>


                                                                </div>

                                                                <div class=" bd-select-5 animated bd-animation-9 form-group" data-animation-name="fadeIn" data-animation-event="hover" data-animation-duration="1000ms" data-animation-delay="0ms" data-animation-infinited="false">
                                                                    <label class="bd-form-label"
                                                                           for="id_banco">Selecione o Banco <span class="freelancer"> do Free Lancer</span><span class="agencia"> da Agência</span></label>



                                                                    <select
                                                                        id="id_banco" class="bd-form-input" required=""
                                                                        name="id_banco">
                                                                            <?php
                                                                            foreach ($bancos as $banco) {
                                                                                ?>
                                                                            <option value="<?php echo $banco->id_banco; ?>"><?php echo $banco->banco; ?></option>
                                                                        <?php }
                                                                        ?>
                                                                    </select>


                                                                </div>

                                                                <div class=" bd-input-9 animated bd-animation-11 form-group" data-animation-name="fadeIn" data-animation-event="hover" data-animation-duration="1000ms" data-animation-delay="0ms" data-animation-infinited="false">
                                                                    <label class="bd-form-label"
                                                                           for="agencia">Digite o número da Agência <span class="freelancer"> do freelancer</span><span class="agencia"> da Agência</span></label>


                                                                    <input type="text"
                                                                           id="agencia" class="bd-form-input"
                                                                           placeholder="999"
                                                                           name="agencia" required="" title="Este é um dos dados essências para o pagamento da promoção">


                                                                </div>

                                                                <div class=" bd-input-12 animated bd-animation-14 form-group" data-animation-name="fadeIn" data-animation-event="hover" data-animation-duration="1000ms" data-animation-delay="0ms" data-animation-infinited="false">
                                                                    <label class="bd-form-label"
                                                                           for="conta_corrente">Digite o número da Conta Corrente <span class="freelancer"> do freelancer</span><span class="agencia"> da Agência</span></label>


                                                                    <input type="text"
                                                                           id="conta_corrente" class="bd-form-input"
                                                                           placeholder="999"
                                                                           name="conta_corrente"required="" >


                                                                </div>

                                                                <div class=" bd-input-14 animated bd-animation-16 form-group" data-animation-name="fadeIn" data-animation-event="hover" data-animation-duration="1000ms" data-animation-delay="0ms" data-animation-infinited="false">
                                                                    <label class="bd-form-label"
                                                                           for="email">Digite e-mail de contato <br>(este é usado para a recuperação de senha)</label>


                                                                    <input type="email"
                                                                           id="email" class="bd-form-input"
                                                                           placeholder="seuemail.com.br"
                                                                           name="email" required="">


                                                                </div>
                                                                <div class=" bd-input-14 animated bd-animation-16 form-group" data-animation-name="fadeIn" data-animation-event="hover" data-animation-duration="1000ms" data-animation-delay="0ms" data-animation-infinited="false">
                                                                    <label class="bd-form-label"
                                                                           for="email">Digite telefone de contato</label>


                                                                    <input type="tel"
                                                                           id="email" class="bd-form-input telefone"
                                                                           placeholder="(99)999.999.999"
                                                                           name="telefone" required="">


                                                                </div>

                                                                <div class=" bd-input-19 animated bd-animation-21 form-group" data-animation-name="fadeIn" data-animation-event="hover" data-animation-duration="1000ms" data-animation-delay="0ms" data-animation-infinited="false">
                                                                    <label class="bd-form-label"
                                                                           for="usuario">Digite  <span class="freelancer"> seu <b>CPF</b></span><span class="agencia"> <b>CNPJ</b> da Agência</span> ( ele será seu login)</label>


                                                                    <input type="text"
                                                                           id="usuario" 
                                                                           class="bd-form-input usuario"

                                                                           name="usuario" required="">


                                                                </div>



                                                                <div class=" bd-input-19 animated bd-animation-21 form-group" data-animation-name="fadeIn" data-animation-event="hover" data-animation-duration="1000ms" data-animation-delay="0ms" data-animation-infinited="false">
                                                                    <label class="bd-form-label"
                                                                           for="senha">Digite sua senha para acessar o sistema</label>


                                                                    <input type="password"
                                                                           id="senha" class="bd-form-input"
                                                                           placeholder="9999"
                                                                           name="senha" 
                                                                           required=""
                                                                           >


                                                                </div>



                                                                <div class="bd-checkbox-2 form-group h3">
                                                                    <a href="<?php echo base_url(); ?>upload/termos.pdf">Leia aqui os termos da promoção </a>
                                                                </div>


                                                                <div class="bd-checkbox-2 form-group">
                                                                    <!--<label class="col-md-4 control-label" for="checkboxes">Multiple Checkboxes</label>-->
                                                                    <div class="col-md-12">
                                                                        <center>
                                                                            <div class="checkbox">
                                                                                <label for="checkboxes-0">
                                                                                    <input  required="" type="checkbox" title="Caso aceite os termos de serviço, você está de acordo com as regras desta promoção">
                                                                                    Aceite os termos de serviço
                                                                                </label>
                                                                            </div>
                                                                        </center>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="">
                                                                <button id="submit" name="submit" class="btn btn-success form-control" style="background-color: green">Cadastrar</button>
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
                 * id_dono_bonus = 1 - freelancer
                 * id_dono_bonus = 2 - agencia
                 */
//                console.log(jQuery(".id_dono_bonus:checked").val());;
                $("#nome_completo").val('');
                $("#nome_completo_agencia").val('');
                if ($(".id_dono_bonus:checked").val() == 2) {
//                    var value = $("#nome_completo").val();                   
                    // $('#nome_completo').prop('readonly', true);
                    $('.freelancer').addClass('hidden');
                    $('.freelancer').addClass('hidden');
                    $('#nome_completo_agencia').removeClass('hidden');
                    $('#lb_nome_completo_agencia').removeClass('hidden');
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
                    $('#nome_completo_agencia').addClass('hidden');
                    $('#lb_nome_completo_agencia').addClass('hidden');
                    $('.freelancer').removeClass('hidden');
                    $('.freelancer').removeClass('hidden');
//                     $('.usuario').removeClass('cnpj');
                    $('.usuario').mask("999.999.999-99");
//                    console.log('.usuario');

                }
            }
                    );

            $(".id_dono_bonus").change(function () {


                /**
                 * id_dono_bonus = 1 - freelancer
                 * id_dono_bonus = 2 - agencia
                 */
//                console.log(jQuery(".id_dono_bonus:checked").val());;
                $("#nome_completo").val('');
                $("#nome_completo_agencia").val('');
                if ($(".id_dono_bonus:checked").val() == 2) {
//                    var value = $("#nome_completo").val();                   
                    // $('#nome_completo').prop('readonly', true);
                    $('.freelancer').addClass('hidden');
                    $('.freelancer').addClass('hidden');
                    $('.agencia').removeClass('hidden');
                    $('.agencia').removeClass('hidden');
                    $('#nome_completo_agencia').removeClass('hidden');
                    $('#lb_nome_completo_agencia').removeClass('hidden');
                    $('.usuario').mask("99.999.999/9999-99");
//                    $('.usuario').removeClass('cpf');
                    $('#nome_completo').removeAttr('required');

                } else {
                    $('#nome_completo').prop('required', true);
                    $("#nome_completo_agencia").val('');
//                    $('#nome_completo_agencia').prop('readonly', false);
                    $('.agencia').addClass('hidden');
                    $('.agencia').addClass('hidden');
                    $('#nome_completo_agencia').addClass('hidden');
                    $('#lb_nome_completo_agencia').addClass('hidden');
                    $('.freelancer').removeClass('hidden');
                    $('.freelancer').removeClass('hidden');
                    
//                     $('.usuario').removeClass('cnpj');
                    $('.usuario').mask("999.999.999-99");
//                    console.log('.usuario');

                }
            }
            );
            $(function () {
                /**
                 * id_dono_bonus = 1 - freelancer
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
                 * id_dono_bonus = 1 - freelancer
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
    .freelancer{
        color:blue;
    }
    .agencia{
        color:red;
    }

</style>

