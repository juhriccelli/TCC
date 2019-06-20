  <?php
  //Conectar o banco de dados
  $servername = "localhost";
  $username = "id9315071_admin";
  $password = "admin";
  $database = "id9315071_tcc";

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      foreach (glob(getcwd() . $_SERVER['DOCUMENT_ROOT']."/temp/aplic/sead/lista_filiados/uf/*.csv") as $file) {
        $pointer = fopen($file, 'r');
        while (!feof($pointer)) {
          if(!isset($linha) && $linha == NULL)
          continue;
          if ($conteudo = fgets($file)){
		          @$ll++;
		          $linha = explode(';', $conteudo);
		      }

          $sql = "INSERT INTO `filiados` (data_extracao, hora_extracao, numero_inscricao, nome_filiado, sigla_partido,
            nome_partido, uf, codigo_municipio, nome_municipio, zona_eleitoral, secao_eleitoral, data_filiacao,
            situacao_registro, tipo_registro, data_processamento, data_desfiliacao, data_cancelamento,
            data_regularizacao, motivo_cancelamento)
          VALUES ('$linha[0]','$linha[1]','$linha[2]','$linha[3]','$linha[4]','$linha[5]','$linha[6]','$linha[7]',
            '$linha[8]','$linha[9]','$linha[10]','$linha[11]','$linha[12]','$linha[13]','$linha[14]','$linha[15]',
            '$linha[16]','$linha[17]','$linha[18]','$linha[19]')";
          $result = mysqli_query($con,$sql);
          $linha = array();
		      }
        }

    } catch(PDOException $e) {
      echo $e->getMessage();
    }
  ?>
