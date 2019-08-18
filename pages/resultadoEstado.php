<?php
  //Conectar o banco de dados
  require_once('../banco/conectarBD.php');

  //Inserir a barra de navegação
  //require_once('../assets/barra.php');

  //Inserir o CSS e o Javascript
  require_once('../assets/custom.php');
?>

<!DOCTYPE HTML>
<html lang="pt-br">

<body>
  <div class="base-flex">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Nome: </th>
          <th scope="col">Estado: </th>
          <th scope="col">Municipio: </th>
          <th scope="col">Sigla do Partido: </th>
          <th scope="col">Nome do Partido: </th>
          <th scope="col">Data de Filiação: </th>
          <th scope="col">Situação da Filiação: </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php
            $estado = "rr";
            foreach ($dbh->query("SELECT * FROM filiados where uf = $estado") as $linha) {
              echo "<td>{$linha['nome_filiado']}</td>";
              echo "<td>{$linha['uf']}</td>";
              echo "<td>{$linha['nome_municipio']}a</td>";
              echo "<td>{$linha['sigla_partido']}</td>";
              echo "<td>{$linha['nome_partido']}</td>";
              echo "<td>{$linha['data_filiacao']}</td>";
              echo "<td>{$linha['situacao_registro']}</td>";
            }
          ?>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
