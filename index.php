<?php
  //Conectar o banco de dados
  require_once('banco/conectarBD.php');

  //Inserir a barra de navegação
  require_once('assets/barra.php');

  //Inserir o CSS e o Javascript
  require_once('assets/custom.php');
?>

<!DOCTYPE HTML>
<html lang="pt-br">
<body>
  <div class="conteudoIndex">
    <div class="imagemCapa"></div>
    <div class="BaseTextoCapa">
      <div class="textoCapa">
        <p class="textoDestaqueLaranja">O que é?</p>
        <p class="textoBranco">
          O SCIP-BR é uma aplicação web onde você poderá encontrar informações
          relevantes sobre o histórico do candidato que deseja. Através das buscas
          poderá identificar os partidos por qual o candidato já foi filiado,
          verificar em quais eleições foi candidato e acompanhar o histórico da
          votação recebida em cada uma dessas eleições.
        </p>
      </div>
      <div class="textoCapa">
        <p class="textoDestaqueLaranja">Como funciona?</p>
        <p class="textoBranco">
          Para pesquisar sobre o candidato que deseja é fácil. Basta escolher uma
          das 3 opções de pesquisa disponilizada no topo: busca por partido, busca
          por estado ou busca por nome.
        </p>
      </div>
    </div>
    <div class="titulo">
      <p class="textoDestaqueAzul">SCIP-BR:</p>
      <p class="textoAzul">Sistema para Consulta de Informações Partidárias no Brasil</p>
    </div>
  </div>
</body>
</html>
