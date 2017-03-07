<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>EAD</title>
	<link rel="stylesheet" type="text/css" href="css/geral.css">
</head>

<body>
	<div id="cadastroAlunoCurso">
		<form id="form-cadastroTurma" method="post" action="daoTurma.php">
	
			<fieldset id="falunocurso"><legend>CADASTRO TURMA</legend>
				<label for="nomeCursoAluno">Curso id: </label><input type="number" id="curso_id" name="curso_id"><br/>
				<label for="numeroTurma">Numero Turma: </label><input type="number" id="numeroTurma" name="numeroTurma"><br />
				<label for="dataInicio">Data Início: </label><input type="text" id="dataInicio" name="dataInicio" maxlength="9" placeholder="00/00/000"><br/>
				<label for="dataFinal">Data Final: </label><input type="text" id="dataFinal" name="dataFinal" maxlength="9" placeholder="00/00/000"><br/>
			</fieldset>
			<input id="enviar" type="submit" name="Submit" value="Enviar" />
		</form>
	</div>
</body>
</html>