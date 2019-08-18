<?php
  //Conectar o banco de dados
  require_once('../banco/conectarBD.php');

  //Inserir a barra de navegação
  //require_once('../assets/barra.php');

  //Inserir o CSS e o Javascript
  require_once('../assets/custom.php');


  if (isset($_GET["estado"])) {
    $estado = $_GET["estado"];
  }
?>

<!DOCTYPE HTML>
<html lang="pt-br">
<body>
  <div>
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
        <?php
            foreach ($conexao->query("SELECT * FROM filiados where uf like '%$estado%'") as $linha) {
              echo "<tr class='detalhar' data-nome={$linha['numero_inscricao']}>";
              echo "<td>{$linha['nome_filiado']}</td>";
              echo "<td>{$linha['uf']}</td>";
              echo "<td>{$linha['nome_municipio']}</td>";
              echo "<td>{$linha['sigla_partido']}</td>";
              echo "<td>{$linha['nome_partido']}</td>";
              $data = date('d/m/Y', strtotime($linha['data_filiacao']));
              echo "<td>{$data}</td>";
              echo "<td>{$linha['situacao_registro']}</td>";
              echo "</tr>";
            }
          ?>
      </tbody>
    </table>
  </div>
</body>
</html>
