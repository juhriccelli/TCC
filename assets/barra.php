<?php
  //Conectar o banco de dados
  //require_once('../banco/conectarBD.php');

  //Inserir a barra de navegação
  //require_once('../assets/barra.php');

  //Inserir o CSS e o Javascript
  require_once('custom.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <span class="navbar-brand">CandMap</span>

    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Home <span class="sr-only">(página atual)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/buscarEstado.php">Busca por Estado</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/buscarPartido.php">Busca por Partido</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/buscarNome.php">Busca por Nome</a>
        </li>
      </ul>
    </div>
  </nav>
</body>

</html>
