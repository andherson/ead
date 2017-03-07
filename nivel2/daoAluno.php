<?php

include "config.php";

//recebe os valores de _POST e trasforma o value em variável
foreach ($_POST as $key => $value) {
	$$key = $value;

} 

// VERIFICAÇÃO DE CAMPOS VAZIOS
if (
	  empty($cpf) 
	||empty($nomeAluno) 
	||empty($ocupacao) 
	||empty($crefito)    
	) {
	echo "Erro - Preencha os seguintes campos: <br />"; 

	if (empty($cpf)) {
		echo "CPF<br />";
	}
	if (empty($nomeAluno)) {
		echo "Nome<br />";
	}
	if (empty($ocupacao)) {
		echo "Ocupacão<br />";
	}
	if (empty($crefito)) {
		echo "Crefito<br />";
	}

	include "formulario_aluno.php";

}else{

	// cria o array para ajudar a fazer o bind
	$camposAluno = array (
		$cpf, 
		$nomeAluno, 
		$ocupacao, 
		$crefito
	);

	foreach ($camposAluno as $key) {
		$params_camposAluno[] = "?";
		$s_camposAluno[] = "s";
	}

	//adiciona virgura para separar os '?' 
	$binds_camposAluno = implode(',', $params_camposAluno);
	$valorString_camposAluno = implode('', $s_camposAluno);

	//montando a instrução sql
	$sql_camposAluno = "INSERT INTO aluno (cpf, nomeAluno, ocupacao, crefito) VALUES";
	$sql_envio_camposAluno = $sql_camposAluno."(".$binds_camposAluno.")";

	//envio dos dados
	$prepararAluno = $conexao -> prepare($sql_envio_camposAluno);	
	$prepararAluno -> bind_param(
		"$valorString_camposAluno", //$valorString_camposCurso
		$cpf,
		$nomeAluno,
		$ocupacao,
		$crefito
	);
	$valida_prepararAluno = $prepararAluno -> execute();



	if ($valida_prepararAluno) {
		echo "cadastrado";
	}else{
		echo "erro no cadastro";
	}
}
?>