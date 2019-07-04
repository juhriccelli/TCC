<?php
  //Conectar o banco de dados
  require_once('banco/conectarBD.php');

  //Inserir a barra de navegação
  require_once('pages/barra.php');
?>

<!DOCTYPE HTML>
<html lang=”pt-br”>
<head>
  <meta charset=”UTF-8”>
  <link rel="stylesheet" href="assets/estilo.css">
  <link rel="stylesheet" href="assets/bootstrap.min.css">
  <script src="assets/script.js"></script>
  <script src="assets/jquery.min.js"></script>
  <script src="assets/bootstrap.min.js"></script>
  <title>
    CandMap - Sistema de monitoramento eleitoral
  </title>
  <body>
    <div class="capa">
      <div>
        <img id="brasil" class="svg brasil" src="assets/brasil.svg">
      </div>
    </div>
  </body>
  </html>
