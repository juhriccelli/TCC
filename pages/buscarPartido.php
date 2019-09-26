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
        <div class="base-Img" >
          <div class="linhaImg">
            <img class="imagem imgPartido imgPartido" id="avante" src="../assets/img/partidos/avante.png" />
            <img class="imagem imgPartido" id="dc" src="../assets/img/partidos/dc.png" />
            <img class="imagem imgPartido" id="dem" src="../assets/img/partidos/dem.png" />
            <img class="imagem imgPartido" id="mdb" src="../assets/img/partidos/mdb.png" />
            <img class="imagem imgPartido" id="novo" src="../assets/img/partidos/novo.png" />
            <img class="imagem imgPartido" id="patriota" src="../assets/img/partidos/patriota.png" />

          </div>
          <div class="linhaImg">
            <img class="imagem imgPartido" id="pcb" src="../assets/img/partidos/pcb.png" />
            <img class="imagem imgPartido" id="pcdob" src="../assets/img/partidos/pcdob.png" />
            <img class="imagem imgPartido" id="pco" src="../assets/img/partidos/pco.png" />
            <img class="imagem imgPartido" id="pdt" src="../assets/img/partidos/pdt.png" />
            <img class="imagem imgPartido" id="phs" src="../assets/img/partidos/phs.png" />
            <img class="imagem imgPartido" id="pl" src="../assets/img/partidos/pl.png" />

          </div>
          <div class="linhaImg">
            <img class="imagem imgPartido" id="pmb" src="../assets/img/partidos/pmb.png" />
            <img class="imagem imgPartido" id="pmn" src="../assets/img/partidos/pmn.png" />
            <img class="imagem imgPartido" id="podemos" src="../assets/img/partidos/podemos.png" />
            <img class="imagem imgPartido" id="pp" src="../assets/img/partidos/pp.png" />
            <img class="imagem imgPartido" id="pps" src="../assets/img/partidos/pps.png" />
            <img class="imagem imgPartido" id="prb" src="../assets/img/partidos/prb.png" />

          </div>
          <div class="linhaImg">
            <img class="imagem imgPartido" id="pros" src="../assets/img/partidos/pros.png" />
            <img class="imagem imgPartido" id="prtb" src="../assets/img/partidos/prtb.png" />
            <img class="imagem imgPartido" id="psb" src="../assets/img/partidos/psb.png" />
            <img class="imagem imgPartido" id="psc" src="../assets/img/partidos/psc.png" />
            <img class="imagem imgPartido" id="psd" src="../assets/img/partidos/psd.png" />
            <img class="imagem imgPartido" id="psdb" src="../assets/img/partidos/psdb.png" />

          </div>
          <div class="linhaImg">
            <img class="imagem imgPartido" id="psl" src="../assets/img/partidos/psl.png" />
            <img class="imagem imgPartido" id="psol" src="../assets/img/partidos/psol.png" />
            <img class="imagem imgPartido" id="pstu" src="../assets/img/partidos/pstu.png" />
            <img class="imagem imgPartido" id="pt" src="../assets/img/partidos/pt.png" />
            <img class="imagem imgPartido" id="ptb" src="../assets/img/partidos/ptb.png" />
            <img class="imagem imgPartido" id="ptc" src="../assets/img/partidos/ptc.png" />

          </div>
        <div class="linhaImg">
          <img class="imagem imgPartido" id="pv" src="../assets/img/partidos/pv.png" />
          <img class="imagem imgPartido" id="rede" src="../assets/img/partidos/rede.png" />
          <img class="imagem imgPartido" id="sd" src="../assets/img/partidos/sd.png" />
        </div>

        </div>
      </div>
      <div class="base-resultado" id="ajaxNormal">
        <div class="base-texto">
          <span>
            Clique no mapa ou na bandeira do estado que deseja para realizar a busca!
          </span>
        </div>

      </div>
    </div>
  </div>
</body>
</html>
