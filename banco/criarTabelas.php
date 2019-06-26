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
        hora_extracao TIME,
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

        //Criar a tabela CANDIDATOS
        $candidatos = "CREATE TABLE candidatos (
          id INT(10) AUTO_INCREMENT PRIMARY KEY,
          dt_geracao DATE,
          hh_geracao TIME,
          ano_eleicao DATE,
          cd_tipo_eleicao INT(2),
          nm_tipo_eleicao VARCHAR(50),
          nr_turno INT(2),
          cd_eleicao INT(4),
          ds_eleicao VARCHAR(50),
          dt_eleicao DATE,
          tp_abrangencia VARCHAR(70),
          sg_uf VARCHAR(2),
          sg_ue VARCHAR(2),
          nm_ue VARCHAR(25),
          cd_cargo INT(2),
          ds_cargo VARCHAR(25),
          sq_candidato INT(10),
          nr_candidato INT(7),
          nm_candidato VARCHAR(50),
          nm_urna_candidato VARCHAR(20),
          nm_social_candidato VARCHAR(10),
          nr_cpf_candidato INT(13),
          nm_email VARCHAR(100),
          cd_situacao_candidatura INT(3),
          ds_situacao_candidatura VARCHAR(20),
          cd_detalhe_situacao_cand INT(2),
          ds_detalhe_situacao_cand VARCHAR(20),
          tp_agremiacao VARCHAR(20),
          nr_partido INT(5),
          sg_partido VARCHAR(10),
          nm_partido VARCHAR(50),
          sq_coligacao INT(20),
          nm_coligacao VARCHAR(50),
          ds_composicao_coligacao VARCHAR(50),
          cd_nacionalidade INT(2),
          ds_nacionalidade VARCHAR(25),
          sg_uf_nascimento VARCHAR(2),
          cd_municipio_nascimento INT(2),
          nm_municipio_nascimento VARCHAR(70),
          dt_nascimento DATE,
          nr_idade_data_posse INT(3),
          nr_titulo_eleitoral_candidato INT(15),
          cd_genero INT(2),
          ds_genero VARCHAR(10),
          cd_grau_instrucao INT(2),
          ds_grau_instrucao VARCHAR(30),
          cd_estado_civil INT(2),
          ds_estado_civil VARCHAR(20),
          cd_cor_raca INT(2),
          ds_cor_raca VARCHAR(20),
          cd_ocupacao INT(4),
          ds_ocupacao VARCHAR(40),
          nr_despesa_max_campanha INT(10),
          cd_sit_tot_turno INT(2),
          ds_sit_tot_turno VARCHAR(20),
          st_reeleicao VARCHAR(2),
          st_declarar_bens VARCHAR(2),
          nr_protocolo_candidatura INT(20),
          nr_processo INT(20));
          ";

        //Criar a tabela Eleições
        $eleicoes = "CREATE TABLE filiados (
          id INT(10) AUTO_INCREMENT PRIMARY KEY,
          data_extracao DATE,
          hora_extracao TIME,
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
        $conn->exec($candidatos);

      } catch(PDOException $e) {
        echo $e->getMessage();
      }

  ?>
