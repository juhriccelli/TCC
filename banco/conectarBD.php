<?php

  //Conectar o banco de dados
  $servername = "localhost";
  $username = "id9315071_admin";
  $password = "admin";
  $database = "id9315071_tcc";
  $charset = "utf8mb4";

  $conexao = mysqli_connect($servername, $username, $password, $database);
  mysqli_set_charset($conexao, $charset);

 ?>
