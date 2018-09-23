<html lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

            <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
                            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
                            
                                


                                
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
                                     