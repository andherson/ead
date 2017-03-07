<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title> Conexão com servidor e banco</title>
</head>
<body>

<?php
/*  Host */
define('HOST', 'localhost');
/* Usuário do banco de dados */
define('BD_USER', 'root');
/*Senha do banco de dados */
define('BD_PASS', '');
/* nome do banco de dados */
define('BD_NAME', 'ead');

/* require_once ""; não abrir nada da tela se não tiver conectado*/


$conexao = new mysqli(HOST, BD_USER, BD_PASS, BD_NAME);

if (!$conexao) {
	 die("Não foi possível estabelecer conexão!".mysqli_connect_error());
}

//evitar caracteres estranhos no banco
$sql1 ="SET NAMES 'utf-8'";
$sql2 = "SET character_set_connection=utf8";
$sql3 = "SET character_set_client=utf8";
$sql4 = "SET character_set_results=utf8";


$ativa1= $conexao->query($sql1);
$ativa2= $conexao->query($sql2);
$ativa3= $conexao->query($sql3);
$ativa4= $conexao->query($sql4);
header('Content-Type: text/html; charset=utf-8');

?>

</body>
</html>
