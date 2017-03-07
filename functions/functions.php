<?php
//função que verifica se a session iniciada dá acesso 

	function session_checker(){
		if (!isset($_SESSION['user'])) {
			$caminho = "../index.php?";
			header("Location:$caminho");
			exit();
		}
	}
?>