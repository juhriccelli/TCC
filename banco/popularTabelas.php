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
      if($dados[0] != 'DATA DA EXTRACAO' && !empty($linha)) {
        /*mysql_query('INSERT INTO filiados (data_extracao, hora_extracao, numero_inscricao, nome_filiado,
          sigla_partido, nome_partido, uf, codigo_municipio, nome_municipio, zona_eleitoral, secao_eleitoral,
          data_filiacao, situacao_registro, tipo_registro, data_processament, data_desfiliacao, data_cancelamento,
          data_regularizacao, motivo_cancelamento)
          VALUES ("'.$dados[0].'", "'.$dados[1].'")');*/

          mysql_query($conexao, 'INSERT INTO filiados (data_extracao, hora_extracao) VALUES ("'.$dados[0].'", "'.$dados[1].'")');

        }
      }
    fclose($arquivo);
  };
?>
