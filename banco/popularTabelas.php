  <?php
  //Conectar o banco de dados
  $servername = "localhost";
  $username = "id9315071_admin";
  $password = "admin";
  $database = "id9315071_tcc";

  $conexao = mysqli_connect($servername, $username, $password, $database);

  //descobrir quantidade de arquivos na pasta
  chdir($_SERVER['DOCUMENT_ROOT']."/temp/filiados/aplic/sead/lista_filiados/uf/");
  $arquivos = glob("{*.csv,*.txt}", GLOB_BRACE);

  //inserir linhas do csv no banco de dados
  foreach($arquivos as $ext){
    $arquivo = fopen ($ext, 'r');
    while(!feof($arquivo)) {
      $linha = fgets($arquivo, 1024);
      $dados = explode(';', $linha);

      $dados[0] = implode("-",array_reverse(explode("/",$dados[0])));
      $dados[11] = implode("-",array_reverse(explode("/",$dados[11])));
      $dados[14] = implode("-",array_reverse(explode("/",$dados[14])));
      $dados[15] = implode("-",array_reverse(explode("/",$dados[15])));
      $dados[16] = implode("-",array_reverse(explode("/",$dados[16])));
      $dados[17] = implode("-",array_reverse(explode("/",$dados[17])));

      var_dump ($dados[3]);

      $sql = "INSERT INTO filiados (data_extracao, hora_extracao, numero_inscricao, nome_filiado,
        sigla_partido, nome_partido, uf, codigo_municipio, nome_municipio, zona_eleitoral, secao_eleitoral,
        data_filiacao, situacao_registro, tipo_registro, data_processamento, data_desfiliacao, data_cancelamento,
        data_regularizacao, motivo_cancelamento)
        VALUES (STR_TO_DATE('$dados[0]','%m-%d-%y'), STR_TO_DATE('$dados[1]','%h:%i'), '$dados[2]', '$dados[3]', '$dados[4]',
        '$dados[5]', '$dados[6]', '$dados[7]', '$dados[8]', '$dados[9]', '$dados[10]', STR_TO_DATE('$dados[11]','%m-%d-%y'),
        '$dados[12]', '$dados[13]', STR_TO_DATE('$dados[14]','%m-%d-%y'), STR_TO_DATE('$dados[15]','%m-%d-%y'),
        STR_TO_DATE('$dados[16]','%m-%d-%y'), STR_TO_DATE('$dados[17]','%m-%d-%y'), '$dados[18]')";


      echo $sql;

      echo("<br />\n");
      echo("<br />\n");
      echo("<br />\n");




      if ($conexao->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conexao->error;
      }



      if($dados[0] != 'DATA DA EXTRACAO' && !empty($linha)) {
        /*mysql_query('INSERT INTO filiados (data_extracao, hora_extracao, numero_inscricao, nome_filiado,
          sigla_partido, nome_partido, uf, codigo_municipio, nome_municipio, zona_eleitoral, secao_eleitoral,
          data_filiacao, situacao_registro, tipo_registro, data_processament, data_desfiliacao, data_cancelamento,
          data_regularizacao, motivo_cancelamento)
          VALUES ("'.$dados[0].'", "'.$dados[1].'")');*/



        }
      }
    fclose($arquivo);
  };
?>
