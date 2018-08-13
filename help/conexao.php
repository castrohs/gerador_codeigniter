
<?php


require_once './Configuracao.php';
$config = new Configuracao();

$link = mysqli_connect($config->mysql_local, $config->mysql_user,$config->mysql_password , $config->db_base);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;;


//
//
////CONECTA AO BANCO DE DADOS
//$conn = @mysql_connect($mysql_local, $mysql_user,$mysql_password) or die("ERRO NA CONEXAO usuario");
//
//
//
////SELECIONA A BASE DE DADOS A SER UTILIZADA
//$db = @mysql_select_db($db_base, $conn) or die("ERRO NA SELECAOO DA BASE DE DADOS");
//
