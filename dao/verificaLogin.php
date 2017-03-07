<?php
ini_set('display_errors', '1'); // mostra erro do php
session_start(); // Inicia a session

include '../config/config.php';

// pega os posts e os define como variáveis
foreach ($_POST as $key => $value) {
    $$key = $value;
}

$pass = md5($pass);

$camposLogin = array(
	$user,
	$pass,
);

$sql_usuarios = "SELECT * FROM usuario WHERE user = '{$user}' AND pass = '{$pass}' AND userAtivo = '1' ";// 
$resultado = $conexao -> query($sql_usuarios);
$cont = mysqli_affected_rows($conexao);



//se cont for maior que 0, ou seja, se detectar o registro do usuário no banco entra na condição
if ($cont > 0) {

// enquanto estiver logado
	while ($rows = $resultado->fetch_array(MYSQLI_ASSOC)) {

		// cria variáveis dinâmicas com os valores dos índices do resultado do array anterior
		foreach ($rows as $key => $value ) {
			$$key = $value;

			$_SESSION[$key]=$$key;
		}

		var_dump($rows);
		//salva na sessão dados para serem utilizados em outras páginas
		//$_SESSION['userId'] = $userId;
		//$_SESSION['user'] = $user;
		//$_SESSION['userNivel'] = $userNivel;
		//$_SESSION['userNome'] = $userNome;

		//altera o ultimo login do usuário para possíveis consultas posteriormente
		$sql_alteraultimologin = "UPDATE usuario SET ultimoLogin = now() WHERE user = '{$user}'";

		$resultado_alteraultimologin = $conexao->query($sql_alteraultimologin);
		
		$nivel = $_SESSION['userNivel'];
		$_SESSION['userNome'] = $userNome;

		switch ($nivel) {
			case '1':
				$caminho = "../nivel1/index.php?id=entradaLogin";
				header("Location:$caminho");
				break;
			case '2':
				$caminho = "../nivel2/index.php?id=entradaLogin";
				header("Location:$caminho");
				break;
			case '3':
				$caminho = "../nivel3/index.php?id=entradaLogin";
				header("Location:$caminho");
				break;	
		}
	}

	$conexao->close();
	exit;
}else {
	echo "Usuário ou senha não são válidos!<br />";
	echo "<a href='../index.php'>Voltar</a>";
	$conexao->close();
	exit;
}
?>