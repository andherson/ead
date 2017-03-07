<?php

include "config.php";
//recebe as variáveis de _POST
foreach ($_POST as $key => $value) {
	$$key = $value;
}


//VERIFICAÇÃO DE CAMPOS VAZIOS
if (
	  empty($aluno_id) 
	||empty($turma_id) 
	||empty($status) 
	||empty($numeroCertificado) 
	) {
	echo "Erro: <br />"; 

	if (empty($aluno_id)) {
		echo "Id do Curso é obrigatório<br />";
	}
	if (empty($turma_id)) {
		echo "Numero da Turma é obrigatório<br />";
	}
	if (empty($status)) {
		echo "Data de início é obrigatório<br />";
	}
	if (empty($numeroCertificado)) {
		echo "Data de término é obrigatório<br />";
	}

	include "formulario_matricularAluno.php";
}else{
	//array para juntar as variáveis e fazer o bind
	$camposMatricula = array(
		$aluno_id,
		$turma_id,
		$status,
		$numeroCertificado
	);

	
	//montando os paramestros para o insert/prepare
	foreach ($camposMatricula as $key) {
		$params_camposMatricula[] = "?";
		$s_camposMatricula[] = "s";
	}
	//separar os ? e s
	$bind_camposTurma = implode(',', $params_camposMatricula);
	$valorString_camposTurma = implode('', $s_camposMatricula); 

	//montando a instru~ção sql
	$sql_camposMatricula = "INSERT INTO matricula (aluno_id, turma_id, status, numeroCertificado) VALUES";
	$sql_envio_camposMatricula = $sql_camposMatricula."(".$bind_camposTurma.")";

	//prepare o envio de dados
	$prepararMatricula = $conexao -> prepare($sql_envio_camposMatricula);
	$prepararMatricula -> bind_param(
		"$valorString_camposTurma",
		$aluno_id,
		$turma_id,
		$status,
		$numeroCertificado		
	);

	$valida_prepararMatricula = $prepararMatricula -> execute();


	if ($valida_prepararMatricula) {
		echo "cadastrado";
	}else{
		echo "erro no cadastro";
	}
}
?>