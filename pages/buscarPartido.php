<?php
  //Conectar o banco de dados
  require_once('../banco/conectarBD.php');

  //Inserir a barra de navegação
  require_once('../assets/barra.php');

  //Inserir o CSS e o Javascript
  require_once('../assets/custom.php');
?>

<!DOCTYPE HTML>
<html lang="pt-br">

<body>
  <div class="conteudo" id="ajaxDetalhes">
    <div class="base-flex">
      <div class="base-objeto">
        <div class="base-Img">
          <div class="linhaImg">
            <img class="imagem imgPartido" id="avante" src="../assets/img/partidos/avante.png" />
            <img class="imagem imgPartido" id="dc" src="../assets/img/partidos/dc.png" />
            <img class="imagem imgPartido" id="dem" src="../assets/img/partidos/dem.png" />
            <img class="imagem imgPartido" id="mdb" src="../assets/img/partidos/mdb.png" />
            <img class="imagem imgPartido" id="novo" src="../assets/img/partidos/novo.png" />
          </div>
          <div class="linhaImg">
            <img class="imagem imgPartido" id="patriota" src="../assets/img/partidos/patriota.png" />
            <img class="imagem imgPartido" id="pcb" src="../assets/img/partidos/pcb.png" />
            <img class="imagem imgPartido" id="pcdob" src="../assets/img/partidos/pcdob.png" />
            <img class="imagem imgPartido" id="pco" src="../assets/img/partidos/pco.png" />
            <img class="imagem imgPartido" id="pdt" src="../assets/img/partidos/pdt.png" />
          </div>
          <div class="linhaImg">
            <img class="imagem imgPartido" id="pl" src="../assets/img/partidos/pl.png" />
            <img class="imagem imgPartido" id="pmb" src="../assets/img/partidos/pmb.png" />
            <img class="imagem imgPartido" id="pmn" src="../assets/img/partidos/pmn.png" />
            <img class="imagem imgPartido" id="podemos" src="../assets/img/partidos/podemos.png" />
            <img class="imagem imgPartido" id="pp" src="../assets/img/partidos/pp.png" />
          </div>
          <div class="linhaImg">
            <img class="imagem imgPartido" id="pps" src="../assets/img/partidos/pps.png" />
            <img class="imagem imgPartido" id="prb" src="../assets/img/partidos/prb.png" />
            <img class="imagem imgPartido" id="pros" src="../assets/img/partidos/pros.png" />
            <img class="imagem imgPartido" id="prtb" src="../assets/img/partidos/prtb.png" />
            <img class="imagem imgPartido" id="psb" src="../assets/img/partidos/psb.png" />
          </div>
          <div class="linhaImg">
            <img class="imagem imgPartido" id="psc" src="../assets/img/partidos/psc.png" />
            <img class="imagem imgPartido" id="psd" src="../assets/img/partidos/psd.png" />
            <img class="imagem imgPartido" id="psdb" src="../assets/img/partidos/psdb.png" />
            <img class="imagem imgPartido" id="psl" src="../assets/img/partidos/psl.png" />
            <img class="imagem imgPartido" id="psol" src="../assets/img/partidos/psol.png" />
          </div>
          <div class="linhaImg">
            <img class="imagem imgPartido" id="pstu" src="../assets/img/partidos/pstu.png" />
            <img class="imagem imgPartido" id="pt" src="../assets/img/partidos/pt.png" />
            <img class="imagem imgPartido" id="ptb" src="../assets/img/partidos/ptb.png" />
            <img class="imagem imgPartido" id="ptc" src="../assets/img/partidos/ptc.png" />
            <img class="imagem imgPartido" id="pv" src="../assets/img/partidos/pv.png" />
          </div>
          <div class="linhaImg">
            <img class="imagem imgPartido" id="rede" src="../assets/img/partidos/rede.png" />
            <img class="imagem imgPartido" id="sd" src="../assets/img/partidos/sd.png" />
          </div>
        </div>
      </div>
      <div class="base-resultado" id="ajaxNormal">
        <div class="base-texto">
          <span>
            Clique no logo ou na tabela com o partido desejado
            para realizar a busca!</span>
          <table class="table table-striped" style="width: 90%;">
            <tr>
              <td class="imgPartido" id="prb" style="width: 25%; text-align: center;">
                <p>10 - REP
                  <!-- Republicanos --><br />
                </p>
              </td>
              <td class="imgPartido" id="pp" style="width: 25%; text-align: center;">
                <p>11 - PP
                  <!-- <br /> Progressistas -->
                </p>
              </td>
              <td class="imgPartido" id="pdt" style="width: 25%; text-align: center;">
                <p>12 - PDT
                  <!-- <br /> Partido Democrático Trabalhista -->
                </p>
              </td>
              <td class="imgPartido" id="pt" style="width: 25%; text-align: center;">
                <p>13 - PT
                  <!-- <br /> Partido dos Trabalhadores -->
                </p>
              </td>
            </tr>
            <tr>
              <td class="imgPartido" id="ptb" style="width: 25%; text-align: center;">
                <p>14 - PTB
                  <!-- <br /> Partido Trabalhista Brasileiro -->
                </p>
              </td>
              <td class="imgPartido" id="mdb" style="width: 25%; text-align: center;">
                <p>15 - MDB
                  <!-- <br /> Movimento Democrático Brasileiro -->
                </p>
              </td>
              <td class="imgPartido" id="pstu" style="width: 25%; text-align: center;">
                <p>16 - PSTU
                  <!-- <br /> Partido Socialista dos Trabalhadores Unificado -->
                </p>
              </td>
              <td class="imgPartido" id="psl" style="width: 25%; text-align: center;">
                <p>17 - PSL
                  <!-- <br /> Partido Social Liberal -->
                </p>
              </td>
            </tr>
            <tr>
              <td class="imgPartido" id="rede" style="width: 25%; text-align: center;">
                <p>18 - REDE
                  <!-- <br /> Rede Sustentabilidade -->
                </p>
              </td>
              <td class="imgPartido" id="podemos" style="width: 25%; text-align: center;">
                <p>19 - PODE
                  <!-- <br /> Podemos -->
                </p>
              </td>
              <td class="imgPartido" id="psc" style="width: 25%; text-align: center;">
                <p>20 - PSC
                  <!-- <br /> Partido Social Cristão -->
                </p>
              </td>
              <td class="imgPartido" id="pcb" style="width: 25%; text-align: center;">
                <p>21 - PCB
                  <!-- <br /> Partido Comunista Brasileiro -->
                </p>
              </td>
            </tr>
            <tr>
              <td class="imgPartido" id="pl" style="width: 25%; text-align: center;">
                <p>22 - PL
                  <!-- <br /> Partido Liberal -->
                </p>
              </td>
              <td class="imgPartido" id="pps" style="width: 25%; text-align: center;">
                <p>23 - CDN
                  <!-- <br /> Cidadania -->
                </p>
              </td>
              <td class="imgPartido" id="dem" style="width: 25%; text-align: center;">
                <p>25 - DEM
                  <!-- <br /> Democratas -->
                </p>
              </td>
              <td class="imgPartido" id="dc" style="width: 25%; text-align: center;">
                <p>27 - DC
                  <!-- <br /> Democracia Cristã -->
                </p>
              </td>
            </tr>
            <tr>
              <td class="imgPartido" id="prtb" style="width: 25%; text-align: center;">
                <p>28 - PRTB
                  <!-- <br /> Partido Renovador Trabalhista Brasileiro -->
                </p>
              </td>
              <td class="imgPartido" id="pco" style="width: 25%; text-align: center;">
                <p>29 - PCO
                  <!-- <br /> Partido da Causa Operária -->
                </p>
              </td>
              <td class="imgPartido" id="novo" style="width: 25%; text-align: center;">
                <p>30 - NOVO
                  <!-- <br /> Partido Novo -->
                </p>
              </td>
              <td class="imgPartido" id="pmn" style="width: 25%; text-align: center;">
                <p>33 - PMN
                  <!-- <br /> Partido da Mobilização Nacional -->
                </p>
              </td>
            </tr>
            <tr>
              <td class="imgPartido" id="pmb" style="width: 25%; text-align: center;">
                <p>35 - PMB
                  <!-- <br /> Partido da Mulher Brasileira -->
                </p>
              </td>
              <td class="imgPartido" id="ptc" style="width: 25%; text-align: center;">
                <p>36 - PTC
                  <!-- <br /> Partido Trabalhista Cristão -->
                </p>
              </td>
              <td class="imgPartido" id="psb" style="width: 25%; text-align: center;">
                <p>40 - PSB
                  <!-- <br /> Partido Socialista Brasileiro -->
                </p>
              </td>
              <td class="imgPartido" id="pv" style="width: 25%; text-align: center;">
                <p>43 - PV
                  <!-- <br /> Partido Verde -->
                </p>
              </td>
            </tr>
            <tr>
              <td class="imgPartido" id="psdb" style="width: 25%; text-align: center;">
                <p>45 - PSDB
                  <!-- <br /> Partido da Social Democracia Brasileira -->
                </p>
              </td>
              <td class="imgPartido" id="psol" style="width: 25%; text-align: center;">
                <p>50 - PSOL
                  <!-- <br /> Partido Socialismo e Liberdade -->
                </p>
              </td>
              <td class="imgPartido" id="patriota" style="width: 25%; text-align: center;">
                <p>51 - PATRIOTA
                  <!-- <br /> Patriota -->
                </p>
              </td>
              <td class="imgPartido" id="psd" style="width: 25%; text-align: center;">
                <p>55 - PSD
                  <!-- <br /> Partido Social Democrático -->
                </p>
              </td>
            </tr>
            <tr>
              <td class="imgPartido" id="pcdob" style="width: 25%; text-align: center;">
                <p>65 - PCdoB
                  <!-- <br /> Partido Comunista do Brasil -->
                </p>
              </td>
              <td class="imgPartido" id="avante" style="width: 25%; text-align: center;">
                <p>70 - AVANTE
                  <!-- <br /> Avante -->
                </p>
              </td>
              <td class="imgPartido" id="sd" style="width: 25%; text-align: center;">
                <p>77 - SD
                  <!-- <br /> Solidariedade -->
                </p>
              </td>
              <td class="imgPartido" id="pros" style="width: 25%; text-align: center;">
                <p>90 - PROS
                  <!-- <br /> Partido Republicano da Ordem Social -->
                </p>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
