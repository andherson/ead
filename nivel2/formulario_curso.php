<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>EAD</title>
	<link rel="stylesheet" type="text/css" href="css/geral.css">
</head>

<body>
	<div id="cadastroCurso">
		<form id="form-cadastroCurso" method="post" action="daoCurso.php">
			
			<fieldset id="fcurso"><legend>CADASTRO CURSO</legend>
				<label for="nomeCurso">Nome do Curso: </label><input type="text" id="nomeCurso" name="nomeCurso"><br/>
				<label for="anoCurso">Ano de Lançamento do Curso: </label><input type="text" id="anoCurso" name="anoCurso" maxlength="4"><br/>
				<!--<label for="quantidadeTurmas">Número de Turmas: </label><input type="number" id="quantidadeTurmas" name="quantidadeTurmas" min="0"><br/>
				<label for="quantidadeAlunos">Quantitativo de Alunos: </label><input type="number" id="quantidadeAlunos" name="quantidadeAlunos" min="0"><br/>-->
				<label for="cargaHoraria">Carga Horária: </label><input type="number" id="cargaHoraria" name="cargaHoraria" min="0"><br/>
				<label for="professor">Professor/Tutor: </label><input type="text" id="professor" name="professor"><br/>
				<label for="registro">Número de Registro: </label><input id="registro" type="text" name="registro" maxlength="4"><br/>
			</fieldset>
			<input id="enviar" type="submit" name="Submit" value="Enviar" />
		</form>
	</div>
</body>
</html>