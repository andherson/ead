<?php 
	include '../config/config.php';
	session_start();
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
			include "formulario_alterarUsuario.php";
	}else{
		$pass = md5($pass);

		//montando a instrução sql
		$sql_consultaUsuario = "SELECT  user, pass, userNome,userNivel, userAtivo FROM usuario WHERE user = '{$_SESSION['userAltera']}'";

		//envio dos dados
		$resultado_Consulta = $conexao->query($sql_consultaUsuario);//pesquisa no banco
		$cont = mysqli_affected_rows($conexao);//verifica se a consulta retornou linhas
		
		if ($cont > 0) {
			while($rows = $resultado_Consulta->fetch_array(MYSQLI_ASSOC)){
				// cria variáveis dinâmicas com os valores dos índices do resultado
				foreach ($rows as $key => $value ) {
					$$key = $value;
					$camposAltera[] = $key;//criando o array que vai ser utilizado no bind
				}
				
				foreach ($camposAltera as $key) {
					$params_camposAltera[] = $key;
					$s_camposAltera[] = "s";
				}
				//adiciona virgura para separar os '?' 
				$binds_camposAltera = implode(' = ?, ', $params_camposAltera)."=?";
				$valorString_camposAltera = implode('', $s_camposAltera);
				var_dump($valorString_camposAltera);

				//montando a instrução sql
				$sql_camposAltera = "UPDATE usuario SET ";
				//$sql_camposAltera = "INSERT INTO usuario (user, pass, userNome, userNivel, userAtivo) VALUES";
				$sql_envio_camposAltera = $sql_camposAltera.$binds_camposAltera." WHERE user = '{$_SESSION['userAltera']}'";
				echo $sql_envio_camposAltera;

				//envio dos dados
				$prepararAltera = $conexao -> prepare($sql_envio_camposAltera) or die($conexao -> error);
				$prepararAltera -> bind_param(
					"$valorString_camposAltera",
					$user,
					$pass,
					$userNome,
					$userNivel,
					$userAtivo
				);
				$valida_prepararAltera = $prepararAltera -> execute();

			}

				if ($valida_prepararAltera) {
					echo "<br />Alterado<br />";
					$prepararAltera -> close();
					$conexao -> close();
					echo "<a href='index.php'>Voltar</a><br />";
				}else{
					echo "erro no cadastro";
					$prepararAltera -> close();
					$conexao -> close();
				}
		}else {
			echo "entrou";
		}
	}
exit;
?>
<!-- 		echo "<a href='../formularios/formulario_consultarUsuario.php'>Nova Consulta</a><br />";
		echo "<a href='../index.php?id=entradaLogin'>Finalizar Consulta</a>"; -->
		