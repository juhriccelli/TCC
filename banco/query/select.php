<?php
  //Conectar o banco de dados
  require_once('../conectarBD.php');

  $sql = "SELECT * FROM filiados";
  $query = $conexao->query($sql);

  while ($dados = $query->mysqli_fetch_array()) {
    echo $dados[1];
  }

  echo 'Registros encontrados: ' . $query->num_rows;

 ?>
