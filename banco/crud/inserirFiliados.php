<?php
  //Conectar o banco de dados
  require_once('../conectarBD.php');

  //descobrir quantidade de arquivos na pasta
  chdir($_SERVER['DOCUMENT_ROOT']."/temp/filiados/aplic/sead/lista_filiados/uf/");
  $arquivos = glob("{*.csv,*.txt}", GLOB_BRACE);

  //Abre os arquivos CSV, pega a linha e coloca em um array.
  foreach($arquivos as $ext){
    $arquivo = fopen ($ext, 'r');
    while(!feof($arquivo)) {
      $linha = fgets($arquivo, 2048);
      $dados = explode(';', $linha);

      //Retirar aspas do arquivo CSV
      $qtdLin = sizeof($dados);
      for($i = 0; $i < $qtdLin; $i++){
        $dados[$i] = str_replace("\"", "",$dados[$i]);
        $dados[$i] = utf8_encode($dados[$i]);
      }

      //Verifica se a linha é o cabeçalho ou se está vazia. Caso não atenda essas condições, prepara as variáves para inserção no banco
      if($dados[0] != 'DATA DA EXTRACAO' && !empty($linha)) {
        $data_extracao = date("Y-m-d",strtotime(str_replace('/','-',$dados[0])));
        $hora_extracao = date("H:i:s", strtotime($dados[1]));
        $numero_inscricao = (integer) $dados[2];
        $nome_filiado = $dados[3];
        $sigla_partido = $dados[4];
        $nome_partido = $dados[5];
        $uf = $dados[6];
        $codigo_municipio = (integer) $dados[7];
        $nome_municipio = $dados[8];
        $zona_eleitoral = (integer) $dados[9];
        $secao_eleitoral = (integer) $dados[10];
        $data_filiacao = date("Y-m-d",strtotime(str_replace('/','-',$dados[11])));
        $situacao_registro = $dados[12];
        $tipo_registro = $dados[13];
        $data_processamento = date("Y-m-d",strtotime(str_replace('/','-',$dados[14])));
        $data_desfiliacao = date("Y-m-d",strtotime(str_replace('/','-',$dados[15])));
        $data_cancelamento = date("Y-m-d",strtotime(str_replace('/','-',$dados[16])));
        $data_regularizacao = date("Y-m-d",strtotime(str_replace('/','-',$dados[17])));
        $motivo_cancelamento = $dados[18];

        //SQL com o Insert pra ser inserido no banco.
        $sql = "INSERT INTO filiados (numero_inscricao, nome_filiado,
          sigla_partido, nome_partido, uf, nome_municipio,
          data_filiacao, situacao_registro, 
          data_cancelamento, motivo_cancelamento)
          VALUES ('$numero_inscricao',
          '$nome_filiado', '$sigla_partido', '$nome_partido', '$uf', '$nome_municipio',
          '$data_filiacao', '$situacao_registro',
          '$data_cancelamento', '$motivo_cancelamento')";


          //SQL com o Insert pra ser inserido no banco.
          /*SQL com os dados desnecessarios para ser inserido no banco
          $sql = "INSERT INTO filiados (data_extracao, hora_extracao, numero_inscricao, nome_filiado,
            sigla_partido, nome_partido, uf, codigo_municipio, nome_municipio, zona_eleitoral, secao_eleitoral,
            data_filiacao, situacao_registro, tipo_registro, data_processamento, data_desfiliacao,
            data_cancelamento, data_regularizacao, motivo_cancelamento)
            VALUES ('$data_extracao', '$hora_extracao', '$numero_inscricao',
            '$nome_filiado', '$sigla_partido', '$nome_partido', '$uf', '$codigo_municipio', '$nome_municipio',
            '$zona_eleitoral', '$secao_eleitoral', '$data_filiacao', '$situacao_registro',
            '$tipo_registro', '$data_processamento', '$data_desfiliacao',
            '$data_cancelamento', '$data_regularizacao', '$motivo_cancelamento')";

            */

          //Caso consiga inserir o sql, imprime a query na tela. Caso contrario aparece o erro.
          if ($conexao->query($sql) === TRUE) {
            echo "Cadastro de " . $nome_filiado . " realizado com sucesso <br />";
          } else {
            echo "Deu ruim: " . $conexao->error ."<br />";
          }

        }
      }
      fclose($arquivo);
    };
?>
