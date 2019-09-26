/*Evento para escutar em qual estado esta clicando */
$(document).ready(function() {
  $(".estados").on('click', function() {
    var estado = $(this).attr('id');
    buscaPorEstado(estado);
  });
});

$(document).ready(function() {
  $(".imgEstado").on('click', function() {
    var estado = $(this).attr('id');
    buscaPorEstado(estado);
  });
});

/*Evento para escutar em qual Partido esta clicando */
$(document).ready(function() {
  $(".imgPartido").on('click', function() {
    var partido = $(this).attr('id');
    buscaPorPartido(partido);
  });
});

/*Evento para saber qual pessoa deseja mais detalhes */
$(function(){
    $(document).on('click', '.detalhar', function(e) {
        e.preventDefault;
        var titulo = $(this).data('nome');
        maisDetalhes(titulo);
    });
});

/**
 * Função para criar um objeto XMLHTTPRequest
 */
function CriaRequest() {
  try {
    request = new XMLHttpRequest();
  } catch (IEAtual) {

    try {
      request = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (IEAntigo) {

      try {
        request = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (falha) {
        request = false;
      }
    }
  }

  if (!request)
    alert("Seu Navegador não suporta Ajax!");
  else
    return request;
}

//Função para enviar os dados de partido
function buscaPorEstado(estado) {

  // Declaração de Variáveis
  var result = document.getElementById("ajaxNormal");
  var xmlreq = CriaRequest();

  // Exibi a imagem de progresso
  result.innerHTML = '<img src="../assets/img/loading.gif"/>';

  // Iniciar uma requisição
  xmlreq.open("GET", "../pages/resultadoEstado.php?estado=" + estado, true);

  // Atribui uma função para ser executada sempre que houver uma mudança de ado
  xmlreq.onreadystatechange = function() {

    // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
    if (xmlreq.readyState == 4) {

      // Verifica se o arquivo foi encontrado com sucesso
      if (xmlreq.status == 200) {
        result.innerHTML = xmlreq.responseText;
      } else {
        result.innerHTML = "Erro: " + xmlreq.statusText;
      }
    }
  };
  xmlreq.send(null);
}


//Função para enviar os dados de partido
function buscaPorPartido(partido) {

  // Declaração de Variáveis
  var result = document.getElementById("ajaxNormal");
  var xmlreq = CriaRequest();

  // Exibi a imagem de progresso
  result.innerHTML = '<img src="../assets/img/loading.gif"/>';

  // Iniciar uma requisição
  xmlreq.open("GET", "../pages/resultadoPartido.php?partido=" + partido, true);

  // Atribui uma função para ser executada sempre que houver uma mudança de ado
  xmlreq.onreadystatechange = function() {

    // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
    if (xmlreq.readyState == 4) {

      // Verifica se o arquivo foi encontrado com sucesso
      if (xmlreq.status == 200) {
        result.innerHTML = xmlreq.responseText;
      } else {
        result.innerHTML = "Erro: " + xmlreq.statusText;
      }
    }
  };
  xmlreq.send(null);
}


//Função para saber mais detalhes do filiado
function maisDetalhes(titulo) {

  // Declaração de Variáveis
  var result = document.getElementById("ajaxDetalhes");
  var xmlreq = CriaRequest();

  // Exibi a imagem de progresso
  result.innerHTML = '<img src="../assets/img/loading.gif"/>';

  // Iniciar uma requisição
  xmlreq.open("GET", "../pages/detalhes.php?titulo=" + titulo, true);

  // Atribui uma função para ser executada sempre que houver uma mudança de ado
  xmlreq.onreadystatechange = function() {

    // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
    if (xmlreq.readyState == 4) {

      // Verifica se o arquivo foi encontrado com sucesso
      if (xmlreq.status == 200) {
        result.innerHTML = xmlreq.responseText;
      } else {
        result.innerHTML = "Erro: " + xmlreq.statusText;
      }
    }
  };
  xmlreq.send(null);
}
