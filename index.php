<?php require_once "top.php" ?>
<?php

//colocar função check
if(!isset($_GET['id'])){
  require_once "bot.php";  
  exit();
}else {
  $pagina = $_GET['id'];
  if(isset($pagina)) {
    if ($pagina  == "entrar") {
    	echo "<h3>Login</h3>";
    	require_once "formularios/login.php";
    }
  }
}

/*if (isset($_SESSION['user'])) {
	var_dump($_SESSION['user']);
}*/
?>
<?php require_once "bot.php" ?>