<?php
  //Conectar o banco de dados
  require_once('../conectarBD.php');

  //Criar a tabela FILIADOS
  $filiados = "CREATE TABLE filiados (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    numero_inscricao BIGINT(20),
    nome_filiado VARCHAR(1000),
    sigla_partido VARCHAR(30),
    nome_partido VARCHAR(100),
    uf VARCHAR(2),
    nome_municipio VARCHAR(1000),
    data_filiacao DATE,
    situacao_registro VARCHAR(20),
    tipo_registro VARCHAR(20),
    data_desfiliacao DATE,
    data_cancelamento DATE,
    motivo_cancelamento VARCHAR(1000));
    ";

    //Criar a tabela CANDIDATOS
    $candidatos = "CREATE TABLE candidatos (
      id INT(10) AUTO_INCREMENT PRIMARY KEY,
      ano_eleicao INT(4),
      nm_tipo_eleicao VARCHAR(1000),
      nr_turno INT(2),
      ds_eleicao VARCHAR(1000),
      tp_abrangencia VARCHAR(200),
      sg_uf VARCHAR(2),
      nm_ue VARCHAR(50),
      ds_cargo VARCHAR(1000),
      nr_candidato BIGINT(100),
      nm_candidato VARCHAR(1000),
      nm_urna_candidato VARCHAR(1000),
      ds_detalhe_situacao_cand VARCHAR(200),
      nr_partido INT(5),
      sg_partido VARCHAR(50),
      nm_partido VARCHAR(1000),
      nr_titulo_eleitoral_candidato BIGINT(20),
      ds_sit_tot_turno VARCHAR(200));
      ";

    //Criar a tabela Eleições
    $eleicoes = "CREATE TABLE eleicoes (
      id INT(10) AUTO_INCREMENT PRIMARY KEY,
      ano_eleicao INT(4),
      nr_turno INT(2),
      ds_eleicao VARCHAR(1000),
      sg_uf VARCHAR(2),
      nm_ue VARCHAR(50),
      nm_municipio VARCHAR(1000),
      ds_cargo VARCHAR(1000),
      nr_candidato BIGINT(100),
      nm_candidato VARCHAR(1000),
      nm_urna_candidato VARCHAR(1000),
      ds_detalhe_situacao_cand VARCHAR(50),
      nr_partido INT(5),
      sg_partido VARCHAR(50),
      nm_partido VARCHAR(1000),
      ds_sit_tot_turno VARCHAR(500),
      qt_votos_nominais BIGINT(20));
      ";


      //Caso consiga inserir o sql, imprime a query na tela. Caso contrario aparece o erro.
      if ($conexao->query($filiados) === TRUE) {
        echo "Tabela criada com sucesso <br />";
      } else {
        echo "Deu ruim: " . $conexao->error ."<br />";
      }

      //Caso consiga inserir o sql, imprime a query na tela. Caso contrario aparece o erro.
      if ($conexao->query($candidatos) === TRUE) {
        echo "Tabela criada com sucesso <br />";
      } else {
        echo "Deu ruim: " . $conexao->error ."<br />";
      }

      //Caso consiga inserir o sql, imprime a query na tela. Caso contrario aparece o erro.
      if ($conexao->query($eleicoes) === TRUE) {
        echo "Tabela criada com sucesso <br />";
      } else {
        echo "Deu ruim: " . $conexao->error ."<br />";
      }








      /*
      Cria as tabelas com todos os campos do CSV, gerando um BD gigante sem necessidade.
      //Criar a tabela FILIADOS
      $filiados = "CREATE TABLE filiados (
        id INT(10) AUTO_INCREMENT PRIMARY KEY,
        data_extracao DATE,
        hora_extracao TIME,
        numero_inscricao BIGINT(20),
        nome_filiado VARCHAR(1000),
        sigla_partido VARCHAR(10),
        nome_partido VARCHAR(100),
        uf VARCHAR(2),
        codigo_municipio INT(10),
        nome_municipio VARCHAR(1000),
        zona_eleitoral INT(4),
        secao_eleitoral INT(4),
        data_filiacao DATE,
        situacao_registro VARCHAR(20),
        tipo_registro VARCHAR(20),
        data_processamento DATE,
        data_desfiliacao DATE,
        data_cancelamento DATE,
        data_regularizacao DATE,
        motivo_cancelamento VARCHAR(1000));
        ";

        //Criar a tabela CANDIDATOS
        $candidatos = "CREATE TABLE candidatos (
          id INT(10) AUTO_INCREMENT PRIMARY KEY,
          dt_geracao DATE,
          hh_geracao TIME,
          ano_eleicao INT(4),
          cd_tipo_eleicao INT(2),
          nm_tipo_eleicao VARCHAR(1000),
          nr_turno INT(2),
          cd_eleicao INT(4),
          ds_eleicao VARCHAR(1000),
          dt_eleicao DATE,
          tp_abrangencia VARCHAR(200),
          sg_uf VARCHAR(2),
          sg_ue VARCHAR(10),
          nm_ue VARCHAR(50),
          cd_cargo INT(2),
          ds_cargo VARCHAR(1000),
          sq_candidato BIGINT(100),
          nr_candidato BIGINT(100),
          nm_candidato VARCHAR(1000),
          nm_urna_candidato VARCHAR(1000),
          nm_social_candidato VARCHAR(100),
          nr_cpf_candidato BIGINT(15),
          nm_email VARCHAR(1000),
          cd_situacao_candidatura INT(3),
          ds_situacao_candidatura VARCHAR(50),
          cd_detalhe_situacao_cand INT(2),
          ds_detalhe_situacao_cand VARCHAR(200),
          tp_agremiacao VARCHAR(100),
          nr_partido INT(5),
          sg_partido VARCHAR(50),
          nm_partido VARCHAR(1000),
          sq_coligacao BIGINT(20),
          nm_coligacao VARCHAR(1000),
          ds_composicao_coligacao VARCHAR(1000),
          cd_nacionalidade INT(2),
          ds_nacionalidade VARCHAR(200),
          sg_uf_nascimento VARCHAR(5),
          cd_municipio_nascimento INT(2),
          nm_municipio_nascimento VARCHAR(1000),
          dt_nascimento DATE,
          nr_idade_data_posse INT(3),
          nr_titulo_eleitoral_candidato BIGINT(20),
          cd_genero INT(2),
          ds_genero VARCHAR(20),
          cd_grau_instrucao INT(2),
          ds_grau_instrucao VARCHAR(300),
          cd_estado_civil INT(2),
          ds_estado_civil VARCHAR(20),
          cd_cor_raca INT(2),
          ds_cor_raca VARCHAR(20),
          cd_ocupacao INT(8),
          ds_ocupacao VARCHAR(400),
          nr_despesa_max_campanha BIGINT(20),
          cd_sit_tot_turno INT(2),
          ds_sit_tot_turno VARCHAR(200),
          st_reeleicao VARCHAR(2),
          st_declarar_bens VARCHAR(2),
          nr_protocolo_candidatura INT(20),
          nr_processo BIGINT(20));
          ";

        //Criar a tabela Eleições
        $eleicoes = "CREATE TABLE eleicoes (
          id INT(10) AUTO_INCREMENT PRIMARY KEY,
          dt_geracao DATE,
          hh_geracao TIME,
          ano_eleicao INT(4),
          cd_tipo_eleicao INT(2),
          nm_tipo_eleicao VARCHAR(1000),
          nr_turno INT(2),
          cd_eleicao INT(4),
          ds_eleicao VARCHAR(1000),
          dt_eleicao DATE,
          tp_abrangencia VARCHAR(200),
          sg_uf VARCHAR(2),
          sg_ue VARCHAR(2),
          nm_ue VARCHAR(50),
          cd_municipio BIGINT(15),
          nm_municipio VARCHAR(1000),
          nr_zona INT(2),
          cd_cargo INT(2),
          ds_cargo VARCHAR(1000),
          sq_candidato BIGINT(100),
          nr_candidato BIGINT(100),
          nm_candidato VARCHAR(1000),
          nm_urna_candidato VARCHAR(1000),
          nm_social_candidato VARCHAR(1000),
          cd_situacao_candidatura INT(3),
          ds_situacao_candidatura VARCHAR(50),
          cd_detalhe_situacao_cand INT(2),
          ds_detalhe_situacao_cand VARCHAR(50),
          tp_agremiacao VARCHAR(100),
          nr_partido INT(5),
          sg_partido VARCHAR(50),
          nm_partido VARCHAR(1000),
          sq_coligacao BIGINT(20),
          nm_coligacao VARCHAR(1000),
          ds_composicao_coligacao VARCHAR(1000),
          cd_sit_tot_turno INT(5),
          ds_sit_tot_turno VARCHAR(500),
          st_voto_em_transito VARCHAR(10),
          qt_votos_nominais BIGINT(20));
          ";

          */

  ?>
