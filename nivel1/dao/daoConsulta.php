<?php 
	include '../config/config.php';
	//transforma os _POST e os define como variáveis

	$user = $_POST['user'];
	session_start();
	//verificação de campos vazios
	if (empty($user)) {
		echo "Erro - Preencha o nome do Usuário: <br />"; 
		include "../formularios/formulario_consultarUsuario.php";
	}else{

		
		//montando a instrução sql
		$sql_consultaUsuario = "SELECT user, userNome, userId, userAtivo, userNivel, ultimoLogin, pass FROM usuario WHERE user = '{$user}'";

		//envio dos dados
		$resultado_Consulta = $conexao->query($sql_consultaUsuario);//pesquisa no banco
		$cont = mysqli_affected_rows($conexao);//verifica se a consulta retornou linhas
		
		if ($cont > 0) {
			while($rows = $resultado_Consulta->fetch_array(MYSQLI_ASSOC)){
				// cria variáveis dinâmicas com os valores dos índices do resultado
				foreach ($rows as $key => $value ) {
					$$key = $value;
				}

				echo "<table>
						<tr>
							<th>userId</th>
							<th>Usuário</th>
							<th>Nome</th>
							<th>userNivel</th>
							<th>userAtivo</th>
							<th>ultimoLogin</th>
						</tr>
						<tr>
							<td>$userId</td>
							<td>$user</td>
							<td>$userNome</td>
							<td>$userNivel</td>
							<td>$userAtivo</td>
							<td>$ultimoLogin</td>
						</tr>
					</table>";

				$pass = md5($pass);
				$_SESSION['userIdAltera'] = $userId;
				$_SESSION['userAltera'] = $user;
				$_SESSION['userNomeAltera'] = $userNome;
				$_SESSION['userNivelAltera'] = $userNivel;
				$_SESSION['userAtivoAltera'] = $userAtivo;
				$_SESSION['passAltera'] = $pass;
			}

		}else{
			echo "Não encontrado!<br />";
			include "../formularios/formulario_consultarUsuario.php";
		}
		echo "<a href='../formularios/formulario_alterarUsuario.php'>Alterar Usuário</a><br />";
		echo "<a href='../formularios/formulario_consultarUsuario.php'>Excluir Usuário</a><br />";
		echo "<a href='../formularios/formulario_consultarUsuario.php'>Nova Consulta</a><br />";
		echo "<a href='../index.php?id=entradaLogin'>Finalizar Consulta</a>";
		$conexao -> close();
	}
exit;
?>