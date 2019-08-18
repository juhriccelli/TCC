<?php
  //Conectar o banco de dados
  require_once('../banco/conectarBD.php');

  //Inserir a barra de navegação
  //require_once('../assets/barra.php');

  //Inserir o CSS e o Javascript
  require_once('../assets/custom.php');

  if (isset($_GET["titulo"])) {
    $titulo = $_GET["titulo"];
  }
?>

<!DOCTYPE HTML>
<html lang="pt-br">

<body>
  <div class="topo-detalhes">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nome: </th>
          <th scope="col">Estado: </th>
          <th scope="col">Município: </th>
          <th scope="col">Sigla do Partido: </th>
          <th scope="col">Nome do Partido: </th>
          <th scope="col">Data de Filiação: </th>
          <th scope="col">Situação da Filiação: </th>
        </tr>
      </thead>
      <tbody>
        <?php
            foreach ($conexao->query("SELECT * FROM filiados where numero_inscricao like '%$titulo%'") as $linha) {
              echo "<tr>";
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
  <div class="base-detalhes">
    <ul class="nav nav-pills" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="filiacao" data-toggle="pill" href="#pills-filiacao" role="tab" aria-controls="pills-filiacao" aria-selected="true">
          Histórico de Filiação</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-candidatura" role="tab" aria-controls="pills-candidatura" aria-selected="false">
          Histórico de Candidaturas</a>
      </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-filiacao" role="tabpanel" aria-labelledby="pills-filiacao-tab">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Estado: </th>
              <th scope="col">Município: </th>
              <th scope="col">Partido: </th>
              <th scope="col">Situação da Filiação: </th>
              <th scope="col">Data de Filiação: </th>
              <th scope="col">Data de Cancelamento: </th>
              <th scope="col">Motivo do Cancelamento: </th>
            </tr>
          </thead>
          <tbody>
            <?php
                foreach ($conexao->query("SELECT * FROM filiados where numero_inscricao like '%$titulo%'") as $linha) {
                  echo "<td>{$linha['uf']}</td>";
                  echo "<td>{$linha['nome_municipio']}</td>";
                  echo "<td>{$linha['sigla_partido']}</td>";
                  echo "<td>{$linha['situacao_registro']}</td>";
                  $aux = $linha['situacao_registro'];
                  $data1 = date('d/m/Y', strtotime($linha['data_filiacao']));
                  echo "<td>{$data1}</td>";
                  if($aux == "REGULAR"){
                    $data2 = "";
                  }else{
                    $data2 = date('d/m/Y', strtotime($linha['data_cancelamento']));
                  }
                  echo "<td>{$data2}</td>";
                  echo "<td>{$linha['motivo_cancelamento']}</td>";
                  echo "</tr>";
                }
            ?>
          </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="pills-candidatura" role="tabpanel" aria-labelledby="pills-candidatura-tab">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Ano: </th>
              <th scope="col">Nome na Urna: </th>
              <th scope="col">Cargo: </th>
              <th scope="col">Estado: </th>
              <th scope="col">Município: </th>
              <th scope="col">Partido: </th>
              <th scope="col">Número do Candidato: </th>
              <th scope="col">Situação da Candidatura: </th>
              <th scope="col">Votos: </th>
            </tr>
          </thead>
          <tbody>
            <?php
                foreach ($conexao->query("SELECT * FROM candidatos where nr_titulo_eleitoral_candidato like '%$titulo%'") as $linha) {
                  echo "<td>{$linha['ano_eleicao']}</td>";
                  echo "<td>{$linha['nm_urna_candidato']}</td>";
                  echo "<td>{$linha['ds_cargo']}</td>";
                  echo "<td>{$linha['sg_uf']}</td>";
                  echo "<td>{$linha['nm_ue']}</td>";
                  echo "<td>{$linha['nm_partido']}</td>";
                  echo "<td>{$linha['nr_candidato']}</td>";
                  echo "<td>{$linha['ds_sit_tot_turno']}</td>";
                  echo "<td>{$linha['nr_candidato']}</td>";

                  echo "</tr>";
                }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>
