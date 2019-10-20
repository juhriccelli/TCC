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
  <div class="conteudoPartido" id="ajaxDetalhes">
    <div class="objetoPartido">
      <div class="imgPartido">
        <img class="partido imgPartido" id="avante" src="../assets/img/partidos/avante.png" />
        <img class="partido imgPartido" id="dc" src="../assets/img/partidos/dc.png" />
        <img class="partido imgPartido" id="dem" src="../assets/img/partidos/dem.png" />
        <img class="partido imgPartido" id="mdb" src="../assets/img/partidos/mdb.png" />
      </div>
      <div class="imgPartido">
        <img class="partido imgPartido" id="novo" src="../assets/img/partidos/novo.png" />
        <img class="partido imgPartido" id="patriota" src="../assets/img/partidos/patriota.png" />
        <img class="partido imgPartido" id="pcb" src="../assets/img/partidos/pcb.png" />
        <img class="partido imgPartido" id="pcdob" src="../assets/img/partidos/pcdob.png" />
      </div>
      <div class="imgPartido">
        <img class="partido imgPartido" id="pco" src="../assets/img/partidos/pco.png" />
        <img class="partido imgPartido" id="pdt" src="../assets/img/partidos/pdt.png" />
        <img class="partido imgPartido" id="pl" src="../assets/img/partidos/pl.png" />
        <img class="partido imgPartido" id="pmb" src="../assets/img/partidos/pmb.png" />
      </div>
      <div class="imgPartido">
        <img class="partido imgPartido" id="pmn" src="../assets/img/partidos/pmn.png" />
        <img class="partido imgPartido" id="podemos" src="../assets/img/partidos/podemos.png" />
        <img class="partido imgPartido" id="pp" src="../assets/img/partidos/pp.png" />
        <img class="partido imgPartido" id="pps" src="../assets/img/partidos/pps.png" />
      </div>
      <div class="imgPartido">
        <img class="partido imgPartido" id="prb" src="../assets/img/partidos/prb.png" />
        <img class="partido imgPartido" id="pros" src="../assets/img/partidos/pros.png" />
        <img class="partido imgPartido" id="prtb" src="../assets/img/partidos/prtb.png" />
        <img class="partido imgPartido" id="psb" src="../assets/img/partidos/psb.png" />
      </div>
      <div class="imgPartido">
        <img class="partido imgPartido" id="psc" src="../assets/img/partidos/psc.png" />
        <img class="partido imgPartido" id="psd" src="../assets/img/partidos/psd.png" />
        <img class="partido imgPartido" id="psdb" src="../assets/img/partidos/psdb.png" />
        <img class="partido imgPartido" id="psl" src="../assets/img/partidos/psl.png" />
      </div>
      <div class="imgPartido">
        <img class="partido imgPartido" id="psol" src="../assets/img/partidos/psol.png" />
        <img class="partido imgPartido" id="pstu" src="../assets/img/partidos/pstu.png" />
        <img class="partido imgPartido" id="pt" src="../assets/img/partidos/pt.png" />
        <img class="partido imgPartido" id="ptb" src="../assets/img/partidos/ptb.png" />
      </div>
      <div class="imgPartido">
        <img class="partido imgPartido" id="ptc" src="../assets/img/partidos/ptc.png" />
        <img class="partido imgPartido" id="pv" src="../assets/img/partidos/pv.png" />
        <img class="partido imgPartido" id="rede" src="../assets/img/partidos/rede.png" />
        <img class="partido imgPartido" id="sd" src="../assets/img/partidos/sd.png" />
      </div>
    </div>
    <div class="resultadoPartido" id="ajaxNormal">
      <div class="textoPartido">
        Clique no mapa ou na bandeira do estado que deseja para realizar a busca!
      </div>
    </div>
  </div>
</body>
</html>
