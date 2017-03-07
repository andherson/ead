<!DOCTYPE html>
<html>
<head lang="pt-br">
	<meta charset="utf-8">
	<title>Cadastro Usuários - EAD</title>
</head>
<body>
<div>
	<h2>Cadastrar Usuário</h2>
	<form method="post" action="../dao/daoUsuario.php">
		<label for="usuario">Usuário: </label><input type="text" name="user" id="usuario" required /><br />
		<label for="senha">Senha: </label><input type="password" name="pass" id="senha" required /><br />
		<label for="userNome">Nome: </label><input type="text" name="userNome" id="userNome" required /><br />
		<label>Usuário ativo</label><br />
		<input type="radio" id="usuarioativo" name="userAtivo" value="1"><label for="usuarioativo" required>Sim</label><br />
		<input type="radio" id="usuarioinativo" name="userAtivo" value="2"><label for="usuarioinativo" required>Não</label><br />
		<label>Nível de Usuário</label><br />
		<input type="radio" id="usuarioadm" name="userNivel" value="1"><label for="usuarioadm" required>Administrador</label><br />
		<input type="radio" id="usuariocadastro" name="userNivel" value="2"><label for="usuariocadastro" required>Cadastro</label><br />
		<input type="radio" id="usuarioconsulta" name="userNivel" value="3"><label for="usuarioconsulta" required>Consulta</label><br />
		
		<input type="Submit" name="Enviar">
	</form>
</div>
</body>
</html>