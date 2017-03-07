<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>EAD</title>
	<link rel="stylesheet" type="text/css" href="css/geral.css">
</head>

<body>
	<div id="cadastroAluno">
		<form id="form-cadastroAluno" method="post" action="daoAluno.php">
			<fieldset id="faluno"><legend>CADASTRO ALUNO</legend>
				<!--<label for="idAluno">Id: </label><input type="text" id="idAluno" name="idAluno"><br /> -->
				<label for="cpf">CPF: </label> <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" maxlength="14"><br/>
				<label for="nomeAluno">Nome: </label> <input type="text" id="nomeAluno" name="nomeAluno" maxlength="100"> <br />
				<label for="ocupacao">Ocupação: </label> 
					<select id="ocupacao" name="ocupacao">
						<option value="">---</option> 
						<option value="fisioterapia">FISIOTERAPIA</option>
						<option value="terapia ocupacional">TERAPIA OCUPACIONAL</option>
						<option value="estudante de fisioterapia">ESTUDANTE DE FISIOTERAPIA</option>
						<option value="estudante de terapia ocupacional">ESTUDANTE DE TERAPIA OCUPACIONAL</option>
					</select> <br/>
				<label for="crefito">CREFITO: </label>
					<select id="crefito" name="crefito">
						<option value="">---</option>
						<option value="CREFITO-1">CREFITO-1</option>
						<option value="CREFITO-2">CREFITO-2</option>
						<option value="CREFITO-3">CREFITO-3</option>
						<option value="CREFITO-4">CREFITO-4</option>
						<option value="CREFITO-5">CREFITO-5</option>
						<option value="CREFITO-6">CREFITO-6</option>
						<option value="CREFITO-7">CREFITO-7</option>
						<option value="CREFITO-8">CREFITO-8</option>
						<option value="CREFITO-9">CREFITO-9</option>
						<option value="CREFITO-10">CREFITO-10</option>
						<option value="CREFITO-11">CREFITO-11</option>
						<option value="CREFITO-12">CREFITO-12</option>
						<option value="CREFITO-13">CREFITO-13</option>
						<option value="CREFITO-14">CREFITO-14</option>
						<option value="CREFITO-15">CREFITO-15</option>
						<option value="CREFITO-16">CREFITO-16</option>
					</select>
			</fieldset>
			<input id="enviar" type="submit" name="Submit" value="Enviar" />
		</form>
	</div>
</body>
</html>