<?php
  //Conectar o banco de dados
  require_once('../banco/conectarBD.php');

  //Inserir a barra de navegação
  //require_once('../assets/barra.php');

  //Inserir o CSS e o Javascript
  require_once('../assets/custom.php');


  if (isset($_GET["partido"])) {
    $partido = $_GET["partido"];
  }
?>

<!DOCTYPE HTML>
<html lang="pt-br">
<body>
  <div class="base-tabela">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Nome: </th>
          <th scope="col">Estado: </th>
          <th scope="col">Município: </th>
          <th scope="col">Partido: </th>
        </tr>
      </thead>
      <tbody>
        <?php
            foreach ($conexao->query("SELECT * FROM filiados where sigla_partido like '%$partido%' AND situacao_registro like 'REGULAR'") as $linha) {
              echo "<tr class='detalhar' data-nome={$linha['numero_inscricao']}>";
              echo "<td>{$linha['nome_filiado']}</td>";
              echo "<td>{$linha['uf']}</td>";
              echo "<td>{$linha['nome_municipio']}</td>";
              echo "<td>{$linha['sigla_partido']}</td>";
              echo "</tr>";
            }
          ?>
      </tbody>
    </table>
  </div>
</body>
</html>
