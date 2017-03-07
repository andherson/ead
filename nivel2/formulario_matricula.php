<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>EAD</title>
	<link rel="stylesheet" type="text/css" href="css/geral.css">
</head>

<body>
	<div id="cadastroAlunoCurso">
		<form id="form-matricularAluno" method="post" action="daoMatricula.php">
	
			<fieldset id="falunocurso"><legend>MATRICULA</legend>
				<label for="matricula_aluno_id">Id aluno: </label><input type="number" id="matricula_aluno_id" name="aluno_id"><br/>
				<label for="matricula_turma_id">Id da turma: </label><input type="number" id="matricula_turma_id" name="turma_id" maxlength="2"><br/>
				<label for="status">Status:</label>
					<input type="Radio" id="aprovado" name="status" value="aprovado"><label for="aprovado"> Aprovado</label>
					<input type="Radio" id="reprovado" name="status" value="reprovado"><label for="reprovado"> Reprovado</label><br/>
				<label for="numeroCertificado">Número de Certificado de Aprovação: </label><input type="text" id="numeroCertificado" name="numeroCertificado" maxlength="14">
			</fieldset>
			<input id="enviar" type="submit" name="Submit" value="Enviar" />
		</form>
	</div>
</body>
</html>