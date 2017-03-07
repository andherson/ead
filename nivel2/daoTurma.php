<?php

include "config.php";
//recebe os valores de _POST e transforma o value em variável
foreach ($_POST as $key => $value) {
	$$key = $value;
}

/* VERIFICAÇÃO DE ERROS */
if (
	  empty($curso_id) 
	||empty($numeroTurma) 
	||empty($dataInicio) 
	||empty($dataFinal) 
	) {
	echo "Erro: <br />"; 

	if (empty($curso_id)) {
		echo "Id do Curso é obrigatório<br />";
	}
	if (empty($numeroTurma)) {
		echo "Numero da Turma é obrigatório<br />";
	}
	if (empty($dataInicio)) {
		echo "Data de início é obrigatório<br />";
	}
	if (empty($dataFinal)) {
		echo "Data de término é obrigatório<br />";
	}
	
	include "formulario_turma.php";
}else{
	//criando array para agrupar as variáveis para o bind

	$camposTurma = array(
		$curso_id,
		$numeroTurma,
		$dataInicio,
		$dataFinal
	);

	foreach ($camposTurma as $key) {
		$params_camposTurma[] = "?";
		$s_camposTurma[] = "s";
	}
	//separar os ? e os s
	$bind_camposTurma = implode(',', $params_camposTurma);
	$valorString_camposTurma = implode('', $s_camposTurma);

	//montando a instrução sql
	$sql_camposTurma = "INSERT INTO turma (curso_id, numeroTurma, dataInicio, dataFinal) VALUES";
	$sql_envio_camposTurma = $sql_camposTurma."(".$bind_camposTurma.")";


	//prepare envio dos dados
	$prepararTurma = $conexao -> prepare ($sql_envio_camposTurma);
	$prepararTurma -> bind_param(
		"$valorString_camposTurma",
		$curso_id,
		$numeroTurma,
		$dataInicio,
		$dataFinal
	);

	$valida_prepararCurso = $prepararTurma -> execute();


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