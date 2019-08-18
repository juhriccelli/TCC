$(document).ready(function() {
  $(".estados").on('click', function() {
    estado = $(this).attr('id');
    buscaPorEstado(estado);
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

/**
 * Função para enviar os dados
 */
function buscaPorEstado(estado) {

  // Declaração de Variáveis
  var result = document.getElementById("tabela");
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
