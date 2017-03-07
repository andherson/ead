<!DOCTYPE html>
<html>
<head lang="pt-br">
	<meta charset="utf-8">
	<title>Cadastro Usuários - EAD</title>
</head>
<body>
<div>
<?php
	session_start();
?>
	<h2>Alterar Usuário</h2>
	<form method="post" action="../dao/daoAltera.php">
		<label for="usuario">Usuário: </label><input type="text" name="user" id="usuario" value="<?php echo $_SESSION['userAltera'] ?>"  required /><br />
		<label for="senha">Senha: </label><input type="password" name="pass" id="senha" value="<?php echo $_SESSION['passAltera'] ?>" required /><br />
		<label for="userNome">Nome: </label><input type="text" name="userNome" id="userNome" value="<?php echo $_SESSION['userNomeAltera'] ?>" required /><br />
		<label>Usuário ativo:</label>
		<select id="userAtivo" name="userAtivo" required>
			<option selected value="<?php echo $_SESSION['userAtivoAltera'] ?>">
				<?php switch ($_SESSION['userAtivo']) {
					case '1':
						echo "Sim";
						break;
					case '2':
						echo "Não";
						break;
					default:
						echo "default";
						break;
				}?></option>
			<option value="1">Sim</option>
			<option value="2">Não</option>
		</select>
		<br /><label>Nível de Usuário</label>
		<select id="userNivel" name="userNivel" required>
			<option selected value="<?php echo $_SESSION['userNivelAltera']?>">
				<?php switch ($_SESSION['userAtivoAltera']) {
					case '1':
						echo "Administrador";
						break;
					case '2':
						echo "Cadastro";
						break;
					case '3':
						echo "Consulta";
						break;
				}?></option>
			<option value="1">Administrador</option>
			<option value="2">Cadastro</option>
			<option value="3">Consulta</option>
		</select><br />



		<!-- <input type="radio" id="usuarioadm" name="userNivel" value="1"><label for="usuarioadm" required>Administrador</label><br />
		<input type="radio" id="usuariocadastro" name="userNivel" value="2"><label for="usuariocadastro" required>Cadastro</label><br />
		<input type="radio" id="usuarioconsulta" name="userNivel" value="3"><label for="usuarioconsulta" required>Consulta</label><br />
		 -->
		<input type="Submit" name="Enviar">
	</form>
</div>
</body>
</html>
