  <?php
  //Conectar o banco de dados
  $servername = "localhost";
  $username = "id9315071_admin";
  $password = "admin";
  $database = "id9315071_tcc";

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      //Criar a tabela FILIADOS
      $filiados = "CREATE TABLE filiados (
        id INT(10) AUTO_INCREMENT PRIMARY KEY,
        data_extracao DATE,
        hora_extracao TIMESTAMP,
        numero_inscricao INT(13),
        nome_filiado VARCHAR(200),
        sigla_partido VARCHAR(10),
        nome_partido VARCHAR(100),
        uf VARCHAR(2),
        codigo_municipio INT(10),
        nome_municipio VARCHAR(200),
        zona_eleitoral INT(4),
        secao_eleitoral INT(4),
        data_filiacao DATE,
        situacao_registro VARCHAR(20),
        tipo_registro VARCHAR(10),
        data_processamento DATE,
        data_desfiliacao DATE,
        data_cancelamento DATE,
        data_regularizacao DATE,
        motivo_cancelamento VARCHAR(50));
        ";

        $conn->exec($filiados);

      } catch(PDOException $e) {
      echo $e->getMessage();
      }

  ?>
