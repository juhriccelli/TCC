<?php

//https://www.devmedia.com.br/executando-consultas-ao-mysql-com-php-e-ajax/26008
// Verifica se existe a variável txtnome
if (isset($_GET["id"])) {
    $nome = $_GET["id"];

    //Conectar o banco de dados
    require_once('../banco/conectarBD.php');

    //Inserir a barra de navegação
    require_once('../assets/barra.php');

    // Verifica se a variável está vazia
    if (empty($estado)) {
        $sql = "SELECT * FROM contato";
    } else {
        $estado .= "%";
        $sql = "SELECT * FROM contato WHERE nome like '$nome'";
    }
    sleep(1);
    $result = mysql_query($sql);
    $cont = mysql_affected_rows($conexao);
    // Verifica se a consulta retornou linhas
    if ($cont > 0) {
        // Atribui o código HTML para montar uma tabela
        $tabela = "<table border='1'>
                    <thead>
                        <tr>
                            <th>NOME</th>
                            <th>TELEFONE</th>
                            <th>CELULAR</th>
                            <th>EMAIL</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>";
        $return = "$tabela";
        // Captura os dados da consulta e inseri na tabela HTML
        while ($linha = mysql_fetch_array($result)) {
            $return.= "<td>" . utf8_encode($linha["NOME"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["FONE"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["CELULAR"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["EMAIL"]) . "</td>";
            $return.= "</tr>";
        }
        echo $return.="</tbody></table>";
    } else {
        // Se a consulta não retornar nenhum valor, exibi mensagem para o usuário
        echo "Não foram encontrados registros!";
    }
}
?>
