<?php 
	// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
	date_default_timezone_set('America/Sao_Paulo');
	// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
	$ultimoLogin = date("Y-m-d H:i:s");

	include 'config/config.php';
	//transforma os _POST e os define como variáveis
	foreach ($_POST as $key => $value) {
		$$key = $value;
	}
	
	//verificação de campos vazios
	if (
	  	  empty($user) 
		||empty($pass)
		||empty($userNome)
		||empty($userNivel)
		||empty($userAtivo)
		||empty($ultimoLogin)
	) {
	echo "Erro - Preencha os seguintes campos: <br />"; 

	if (empty($user)) {
		echo "User<br />";
	}
	if (empty($pass)) {
		echo "Senha<br />";
	}
	if (empty($userNome)) {
		echo "Nome<br />";
	}
	if (empty($userNivel)) {
		echo "Nivel<br />";
	}
	if (empty($userAtivo)) {
		echo "Ativo<br />";
	}
	if (empty($ultimoLogin)) {
		echo "Ultimo Login<br />";
	}

	include "../formularios/formulario_usuario.php";
	
	}else{

		$pass = md5($pass);
		
		$camposLogin = array(
			$user,
			$pass,
			$userNome,
			$userNivel,
			$userAtivo,
			$ultimoLogin
		);
	

		foreach ($camposLogin as $key) {
			$params_camposLogin[] = "?";
			$s_camposLogin[] = "s";
		}

		//adiciona virgura para separar os '?' 
		$binds_camposLogin = implode(',', $params_camposLogin);
		$valorString_camposLogin = implode('', $s_camposLogin);

		//montando a instrução sql
		$sql_camposLogin = "INSERT INTO usuario (user, pass, userNome, userNivel, userAtivo, ultimoLogin) VALUES";
		$sql_envio_camposLogin = $sql_camposLogin."(".$binds_camposLogin.")";

		//envio dos dados
		$prepararLogin = $conexao -> prepare($sql_envio_camposLogin);	
		$prepararLogin -> bind_param(
			"$valorString_camposLogin",
			$user,
			$pass,
			$userNome,
			$userNivel,
			$userAtivo,
			$ultimoLogin
		);
		$valida_prepararLogin = $prepararLogin -> execute();



		if ($valida_prepararLogin) {
			echo "cadastrado<br />";
			$prepararLogin -> close();
			$conexao -> close();
			echo "<a href='index.php'>Voltar</a><br />";

		}else{
			echo "erro no cadastro";
			$prepararLogin -> close();
			$conexao -> close();
		}	
	}
exit;
?>