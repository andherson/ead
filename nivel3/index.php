<?php require_once "top-interna.php" ?>
<?php

session_start();
include_once "../functions/functions.php";
session_checker();

$nivel = $_SESSION['userNivel'];

//verifica se usuário tem permissão para ver esse conteudo
if ($nivel == 3) {
    
    if(!isset($_GET['id'])){
      require_once "bot.php";  
      exit();
    }else {

      $pagina = $_GET['id'];

      if(isset($pagina)) {
          if ($pagina  == "entradaLogin") {
            echo "<h3>Bem vindo - ".$_SESSION['userNome']." - nível: ".$_SESSION['userNivel']."</h3>";

            require_once "formulario_consulta.php";

          }
          if ($pagina == "sairLogin") {
            echo "<a href='index.php?id=saiuLogin'>sim</a>
                  <a href='index.php?id=entradaLogin'>não</a>
                 ";
          }
          if ($pagina == "saiuLogin") {
            session_destroy();
            echo "Deslogado!";
          } 
      }else{
        echo "id não existe";
      }
    }
}else{
  //redireciona o usuário para sua sessao pois não tem permissão para essa etapa
  echo "Sem permissão <br />";
  $caminho = "../nivel$nivel/index.php";
  header("Location:$caminho");
}
?>
<?php require_once "bot.php" ?>