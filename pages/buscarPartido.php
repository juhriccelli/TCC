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
            <img class="imagem" id="avante" src="../assets/img/partidos/avante.png" />
            <img class="imagem" id="dc" src="../assets/img/partidos/dc.png" />
            <img class="imagem" id="dem" src="../assets/img/partidos/dem.png" />
            <img class="imagem" id="mdb" src="../assets/img/partidos/mdb.png" />
            <img class="imagem" id="novo" src="../assets/img/partidos/novo.png" />
          </div>
          <div class="linhaImg">
            <img class="imagem" id="patriota" src="../assets/img/partidos/patriota.png" />
            <img class="imagem" id="pcb" src="../assets/img/partidos/pcb.png" />
            <img class="imagem" id="pcdob" src="../assets/img/partidos/pcdob.png" />
            <img class="imagem" id="pco" src="../assets/img/partidos/pco.png" />
            <img class="imagem" id="pdt" src="../assets/img/partidos/pdt.png" />
          </div>
          <div class="linhaImg">
            <img class="imagem" id="pl" src="../assets/img/partidos/pl.png" />
            <img class="imagem" id="pmb" src="../assets/img/partidos/pmb.png" />
            <img class="imagem" id="pmn" src="../assets/img/partidos/pmn.png" />
            <img class="imagem" id="podemos" src="../assets/img/partidos/podemos.png" />
            <img class="imagem" id="pp" src="../assets/img/partidos/pp.png" />
          </div>
          <div class="linhaImg">
            <img class="imagem" id="pps" src="../assets/img/partidos/pps.png" />
            <img class="imagem" id="prb" src="../assets/img/partidos/prb.png" />
            <img class="imagem" id="pros" src="../assets/img/partidos/pros.png" />
            <img class="imagem" id="prtb" src="../assets/img/partidos/prtb.png" />
            <img class="imagem" id="psb" src="../assets/img/partidos/psb.png" />
          </div>
          <div class="linhaImg">
            <img class="imagem" id="psc" src="../assets/img/partidos/psc.png" />
            <img class="imagem" id="psd" src="../assets/img/partidos/psd.png" />
            <img class="imagem" id="psdb" src="../assets/img/partidos/psdb.png" />
            <img class="imagem" id="psl" src="../assets/img/partidos/psl.png" />
            <img class="imagem" id="psol" src="../assets/img/partidos/psol.png" />
          </div>
        <div class="linhaImg">
          <img class="imagem" id="pstu" src="../assets/img/partidos/pstu.png" />
          <img class="imagem" id="pt" src="../assets/img/partidos/pt.png" />
          <img class="imagem" id="ptb" src="../assets/img/partidos/ptb.png" />
          <img class="imagem" id="ptc" src="../assets/img/partidos/ptc.png" />
          <img class="imagem" id="pv" src="../assets/img/partidos/pv.png" />
        </div>
      <div class="linhaImg">
          <img class="imagem" id="rede" src="../assets/img/partidos/rede.png" />
          <img class="imagem" id="sd" src="../assets/img/partidos/sd.png" />
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
