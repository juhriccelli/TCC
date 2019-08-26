<?php

  //Conectar o banco de dados
  $servername = "localhost";
  $username = "id9315071_admin";
  $password = "admin";
  $database = "id9315071_tcc";


  $conexao = mysqli_connect($servername, $username, $password, $database);
  $conexao->set_charset("utf8");


 ?>
