<html lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

            <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="//europlus.systems/gerador_php/css/bootstrap.css">
                
                    <link rel="stylesheet" href="//europlus.systems/gerador_php/css/custom.css">
                    <link rel="stylesheet" href="//europlus.systems/gerador_php/css/custom2.css">
                    <!--<link rel="stylesheet" href="//europlus.systems/gerador_php/css/sb-admin.css">-->
                        <link rel="stylesheet" href="//europlus.systems/gerador_php/css/rotacao_animacao.css">
                            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
                            <link href="https://file.myfontastic.com/TCsiyXQLt2rYahnSL3o53m/icons.css" rel="stylesheet">
                                <script type="text/javascript" src="//europlus.systems/gerador_php/js/jquery.min.js" ></script>
                                <script src="//europlus.systems/gerador_php/js/clipboard.js" type="text/javascript"></script>
                                <script type="text/javascript" src="//europlus.systems/gerador_php/js/bootstrap.js"></script>                        


                                <script type="text/javascript" src="//europlus.systems/gerador_php/js/jquery.maskedinput.js" ></script>
                                <?php
                                if (isset($menu_side_active)) {
                                    if ($menu_side_active) {
                                        $this->load->view('scripts/menu_side');
                                    }
                                }
                                ?>
                                <title>
                                    <?php
                                    if (isset($title)) {

                                        echo $title;
                                    }
                                    ?>
                                </title>

                                <?php
                               $server = $_SERVER['SERVER_NAME'];

$endereco = $_SERVER ['REQUEST_URI'];

$url =  "http://" . $server . $endereco;
//$this->Log_acessoModel->insert($url);
?>



                                </head>
    <style>
        .bodycolor{
            background-color: #f9f9f9;
        }
        </style>
                                <body class="bodycolor">
                                    <div id="wrapper">


                                        <div id="page-wrapper">

                                            <div class="container-fluid">
                                     