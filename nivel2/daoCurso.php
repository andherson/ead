<?php

include "config.php";

//recebe os valores de _POST e trasforma o value em variável
foreach ($_POST as $key => $value) {
	$$key = $value;
}

// VERIFICAÇÃO DE ERROS
if (
	  empty($nomeCurso) 
	||empty($anoCurso) 
	||empty($cargaHoraria) 
	||empty($professor) 
	||empty($registro) 
	) {
	echo "Erro: <br />"; 

	if (empty($nomeCurso)) {
		echo "NomeCurso é obrigatório<br />";
	}
	if (empty($anoCurso)) {
		echo "Ano Lancamento é obrigatório<br />";
	}
	if (empty($cargaHoraria)) {
		echo "Carga Horaria é obrigatório<br />";
	}
	if (empty($professor)) {
		echo "Professor é obrigatório<br />";
	}
	if (empty($registro)) {
		echo "Registro é obrigatório<br />";
	}
	include "formulario_curso.php";
}else{
	
	//cria um array para ajudar fazer o bind: adicionar "?" e "s";
	$camposCurso = array(
		$nomeCurso,
		$anoCurso,
		$cargaHoraria,
		$professor,
		$registro
	);

	foreach ($camposCurso as $key) {
		$params_camposCurso[] = "?";
		$s_camposCurso[] = "s";
	}

	//adiciona , para separar os ? 
	$binds_camposCurso = implode(',', $params_camposCurso);
	$valorString_camposCurso = implode('', $s_camposCurso);

	//montando a instrução sql
	$sql_camposCurso = "INSERT INTO curso (nomeCurso, anoCurso, cargaHoraria, professor, registro) VALUES";
	$sql_envio_camposCurso = $sql_camposCurso."(".$binds_camposCurso.")";

	//prepare envio dos dados
	$prepararCurso = $conexao -> prepare($sql_envio_camposCurso);
	$prepararCurso -> bind_param(
		"$valorString_camposCurso",
		$nomeCurso,
		$anoCurso,
		$cargaHoraria,
		$professor,
		$registro
	);

	$valida_prepararCurso = $prepararCurso -> execute();

	if ($valida_prepararCurso) {
		echo "cadastrado";
	}else{
		echo "erro no cadastro";
	}
}
?>
<!-- 
$stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email); 
-->