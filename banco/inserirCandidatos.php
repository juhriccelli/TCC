<?php
  //Conectar o banco de dados
  require_once('conectarBD.php');

  //descobrir quantidade de arquivos na pasta
  chdir($_SERVER['DOCUMENT_ROOT']."/temp/candidatura/");
  $arquivos = glob("{*.csv,*.txt}", GLOB_BRACE);

  //Abre os arquivos CSV, pega a linha e coloca em um array.
  foreach($arquivos as $ext){
    $arquivo = fopen ($ext, 'r');
    while(!feof($arquivo)) {
      $linha = fgets($arquivo, 2048);
      $dados = explode(';', $linha);

      $tamD = count($dados);
      $ano = str_replace("\"", "",$dados[2]);
      $ano = (integer) $ano;

      //Retirar aspas do arquivo CSV
      for($i = 0; $i <$tamD; $i++){
        $dados[$i] = str_replace("\"", "",$dados[$i]);
        $dados[$i] = utf8_encode($dados[$i]);
      }

      //Verifica se a linha é o cabeçalho ou se está vazia. Caso não atenda essas condições, prepara as variáves para inserção no banco
      if($dados[0] != 'DT_GERACAO' && !empty($linha)) {
        if($ano >= 2014){
          insert2014($dados, $conexao);
        }
        elseif ($ano == 2012) {
          insert2012($dados, $conexao);
        }
        else{
          insert2010($dados, $conexao);
        }
      }
    }
    fclose($arquivo);
  };


  function insert2014($dados, $conexao){
     $dt_geracao = date("Y-m-d",strtotime(str_replace('/','-',$dados[0])));
     $hh_geracao = date("H:i:s", strtotime($dados[1]));
     $ano_eleicao = (integer) $dados[2];
     $cd_tipo_eleicao = (integer) $dados[3];
     $nm_tipo_eleicao = $dados[4];
     $nr_turno = (integer) $dados[5];
     $cd_eleicao = (integer) $dados[6];
     $ds_eleicao = $dados[7];
     $dt_eleicao = date("Y-m-d",strtotime(str_replace('/','-',$dados[8])));
     $tp_abrangencia = $dados[9];
     $sg_uf = $dados[10];
     $sg_ue = $dados[11];
     $nm_ue = $dados[12];
     $cd_cargo = (integer) $dados[13];
     $ds_cargo = $dados[14];
     $sq_candidato = (integer) $dados[15];
     $nr_candidato = (integer) $dados[16];
     $nm_candidato = $dados[17];
     $nm_urna_candidato = $dados[18];
     $nm_social_candidato = $dados[19];
     $nr_cpf_candidato = (integer) $dados[20];
     $nm_email = $dados[21];
     $cd_situacao_candidatura = (integer) $dados[22];
     $ds_situacao_candidatura = $dados[23];
     $cd_detalhe_situacao_cand = (integer) $dados[24];
     $ds_detalhe_situacao_cand = $dados[25];
     $tp_agremiacao = $dados[26];
     $nr_partido = (integer) $dados[27];
     $sg_partido = $dados[28];
     $nm_partido = $dados[29];
     $sq_coligacao = (integer) $dados[30];
     $nm_coligacao = $dados[31];
     $ds_composicao_coligacao = $dados[32];
     $cd_nacionalidade = (integer) $dados[33];
     $ds_nacionalidade = $dados[34];
     $sg_uf_nascimento = $dados[35];
     $cd_municipio_nascimento = (integer) $dados[36];
     $nm_municipio_nascimento  = $dados[37];
     $dt_nascimento = date("Y-m-d",strtotime(str_replace('/','-',$dados[38])));
     $nr_idade_data_posse = (integer) $dados[39];
     $nr_titulo_eleitoral_candidato = (integer) $dados[40];
     $cd_genero = (integer) $dados[41];
     $ds_genero = $dados[42];
     $cd_grau_instrucao = (integer) $dados[43];
     $ds_grau_instrucao = $dados[44];
     $cd_estado_civil = (integer) $dados[45];
     $ds_estado_civil = $dados[46];
     $cd_cor_raca = (integer) $dados[47];
     $ds_cor_raca = $dados[48];
     $cd_ocupacao = (integer) $dados[49];
     $ds_ocupacao = $dados[50];
     $nr_despesa_max_campanha = (integer) $dados[51];
     $cd_sit_tot_turno = (integer) $dados[52];
     $ds_sit_tot_turno = $dados[53];
     $st_reeleicao  = $dados[54];
     $st_declarar_bens = $dados[55];
     $nr_protocolo_candidatura = (integer) $dados[56];
     $nr_processo = (integer)$dados[57];

     //SQL com o Insert pra ser inserido no banco.
     $sql = "INSERT INTO candidatos (dt_geracao, hh_geracao, ano_eleicao, cd_tipo_eleicao, nm_tipo_eleicao,
       nr_turno, cd_eleicao, ds_eleicao, dt_eleicao, tp_abrangencia, sg_uf, sg_ue, nm_ue, cd_cargo, ds_cargo,
       sq_candidato, nr_candidato, nm_candidato, nm_urna_candidato, nm_social_candidato, nr_cpf_candidato, nm_email,
       cd_situacao_candidatura, ds_situacao_candidatura, cd_detalhe_situacao_cand, ds_detalhe_situacao_cand,
       tp_agremiacao, nr_partido, sg_partido, nm_partido, sq_coligacao, nm_coligacao, ds_composicao_coligacao,
       cd_nacionalidade, ds_nacionalidade, sg_uf_nascimento, cd_municipio_nascimento, nm_municipio_nascimento,
       dt_nascimento, nr_idade_data_posse, nr_titulo_eleitoral_candidato, cd_genero, ds_genero, cd_grau_instrucao,
       ds_grau_instrucao, cd_estado_civil, ds_estado_civil, cd_cor_raca, ds_cor_raca, cd_ocupacao, ds_ocupacao,
       nr_despesa_max_campanha, cd_sit_tot_turno, ds_sit_tot_turno, st_reeleicao, st_declarar_bens,
       nr_protocolo_candidatura, nr_processo)
       VALUES ('$dt_geracao', '$hh_geracao', '$ano_eleicao', '$cd_tipo_eleicao', '$nm_tipo_eleicao',
         '$nr_turno', '$cd_eleicao', '$ds_eleicao', '$dt_eleicao', '$tp_abrangencia', '$sg_uf', '$sg_ue',
         '$nm_ue', '$cd_cargo', '$ds_cargo', '$sq_candidato', '$nr_candidato', '$nm_candidato', '$nm_urna_candidato',
         '$nm_social_candidato', '$nr_cpf_candidato', '$nm_email', '$cd_situacao_candidatura', '$ds_situacao_candidatura',
         '$cd_detalhe_situacao_cand', '$ds_detalhe_situacao_cand', '$tp_agremiacao', '$nr_partido', '$sg_partido',
         '$nm_partido', '$sq_coligacao', '$nm_coligacao', '$ds_composicao_coligacao', '$cd_nacionalidade',
         '$ds_nacionalidade', '$sg_uf_nascimento', '$cd_municipio_nascimento', '$nm_municipio_nascimento',
         '$dt_nascimento', '$nr_idade_data_posse', '$nr_titulo_eleitoral_candidato', '$cd_genero', '$ds_genero',
         '$cd_grau_instrucao', '$ds_grau_instrucao', '$cd_estado_civil', '$ds_estado_civil', '$cd_cor_raca',
         '$ds_cor_raca', '$cd_ocupacao', '$ds_ocupacao', '$nr_despesa_max_campanha', '$cd_sit_tot_turno',
         '$ds_sit_tot_turno', '$st_reeleicao', '$st_declarar_bens', '$nr_protocolo_candidatura', '$nr_processo')";

         //Caso consiga inserir o sql, imprime a query na tela. Caso contrario aparece o erro.
         if ($conexao->query($sql) === TRUE) {
           echo "Cadastro de " . $nm_candidato . " realizado com sucesso <br />";
         } else {
           echo "Deu ruim: " . $conexao->error ."<br />";
         }

  }


  function insert2012($dados, $conexao){
     $dt_geracao = date("Y-m-d",strtotime(str_replace('/','-',$dados[0])));
     $hh_geracao = date("H:i:s", strtotime($dados[1]));
     $ano_eleicao = (integer) $dados[2];
     $nr_turno = (integer) $dados[3];
     $ds_eleicao = $dados[4];
     $sg_uf = $dados[5];
     $sg_ue = $dados[6];
     $nm_ue = $dados[7];
     $cd_cargo = (integer) $dados[8];
     $ds_cargo = $dados[9];
     $nm_candidato = $dados[10];
     $sq_candidato = (integer) $dados[11];
     $nr_candidato = (integer) $dados[12];
     $nr_cpf_candidato = (integer) $dados[13];
     $nm_urna_candidato = $dados[14];
     $cd_situacao_candidatura = (integer) $dados[15];
     $ds_situacao_candidatura = $dados[16];
     $nr_partido = (integer) $dados[17];
     $sg_partido = $dados[18];
     $nm_partido = $dados[19];
     $sq_coligacao = (integer) $dados[20];
     $nm_coligacao = $dados[21];
     $ds_composicao_coligacao = $dados[22];
     $cd_ocupacao = (integer) $dados[24];
     $ds_ocupacao = $dados[25];
     $dt_nascimento = date("Y-m-d",strtotime(str_replace('/','-',$dados[26])));
     $nr_titulo_eleitoral_candidato = (integer) $dados[27];
     $nr_idade_data_posse = (integer) $dados[28];
     $cd_genero = (integer) $dados[29];
     $ds_genero = $dados[30];
     $cd_grau_instrucao = (integer) $dados[31];
     $ds_grau_instrucao = $dados[32];
     $cd_estado_civil = (integer) $dados[33];
     $ds_estado_civil = $dados[34];
     $cd_nacionalidade = (integer) $dados[35];
     $ds_nacionalidade = $dados[36];
     $sg_uf_nascimento = $dados[37];
     $cd_municipio_nascimento = (integer) $dados[38];
     $nm_municipio_nascimento  = $dados[39];
     $nr_despesa_max_campanha = (integer) $dados[40];
     $cd_sit_tot_turno = (integer) $dados[41];
     $ds_sit_tot_turno = $dados[42];
     $nm_email = $dados[43];


     $dt_eleicao = "";
     $tp_abrangencia = "";
     $nm_social_candidato = "";
     $cd_detalhe_situacao_cand = "";
     $ds_detalhe_situacao_cand = "";
     $tp_agremiacao = "";
     $cd_cor_raca = "";
     $ds_cor_raca = "";
     $st_reeleicao  = "";
     $st_declarar_bens = "";
     $nr_protocolo_candidatura = "";
     $nr_processo = "";
     $cd_tipo_eleicao = "";
     $nm_tipo_eleicao = "";
     $cd_eleicao = "";

     //SQL com o Insert pra ser inserido no banco.
     $sql = "INSERT INTO candidatos (dt_geracao, hh_geracao, ano_eleicao, cd_tipo_eleicao, nm_tipo_eleicao,
       nr_turno, cd_eleicao, ds_eleicao, dt_eleicao, tp_abrangencia, sg_uf, sg_ue, nm_ue, cd_cargo, ds_cargo,
       sq_candidato, nr_candidato, nm_candidato, nm_urna_candidato, nm_social_candidato, nr_cpf_candidato, nm_email,
       cd_situacao_candidatura, ds_situacao_candidatura, cd_detalhe_situacao_cand, ds_detalhe_situacao_cand,
       tp_agremiacao, nr_partido, sg_partido, nm_partido, sq_coligacao, nm_coligacao, ds_composicao_coligacao,
       cd_nacionalidade, ds_nacionalidade, sg_uf_nascimento, cd_municipio_nascimento, nm_municipio_nascimento,
       dt_nascimento, nr_idade_data_posse, nr_titulo_eleitoral_candidato, cd_genero, ds_genero, cd_grau_instrucao,
       ds_grau_instrucao, cd_estado_civil, ds_estado_civil, cd_cor_raca, ds_cor_raca, cd_ocupacao, ds_ocupacao,
       nr_despesa_max_campanha, cd_sit_tot_turno, ds_sit_tot_turno, st_reeleicao, st_declarar_bens,
       nr_protocolo_candidatura, nr_processo)
       VALUES ('$dt_geracao', '$hh_geracao', '$ano_eleicao', '$cd_tipo_eleicao', '$nm_tipo_eleicao',
         '$nr_turno', '$cd_eleicao', '$ds_eleicao', '$dt_eleicao', '$tp_abrangencia', '$sg_uf', '$sg_ue',
         '$nm_ue', '$cd_cargo', '$ds_cargo', '$sq_candidato', '$nr_candidato', '$nm_candidato', '$nm_urna_candidato',
         '$nm_social_candidato', '$nr_cpf_candidato', '$nm_email', '$cd_situacao_candidatura', '$ds_situacao_candidatura',
         '$cd_detalhe_situacao_cand', '$ds_detalhe_situacao_cand', '$tp_agremiacao', '$nr_partido', '$sg_partido',
         '$nm_partido', '$sq_coligacao', '$nm_coligacao', '$ds_composicao_coligacao', '$cd_nacionalidade',
         '$ds_nacionalidade', '$sg_uf_nascimento', '$cd_municipio_nascimento', '$nm_municipio_nascimento',
         '$dt_nascimento', '$nr_idade_data_posse', '$nr_titulo_eleitoral_candidato', '$cd_genero', '$ds_genero',
         '$cd_grau_instrucao', '$ds_grau_instrucao', '$cd_estado_civil', '$ds_estado_civil', '$cd_cor_raca',
         '$ds_cor_raca', '$cd_ocupacao', '$ds_ocupacao', '$nr_despesa_max_campanha', '$cd_sit_tot_turno',
         '$ds_sit_tot_turno', '$st_reeleicao', '$st_declarar_bens', '$nr_protocolo_candidatura', '$nr_processo')";

         //Caso consiga inserir o sql, imprime a query na tela. Caso contrario aparece o erro.
         if ($conexao->query($sql) === TRUE) {
           echo "Cadastro de " . $nm_candidato . " realizado com sucesso <br />";
         } else {
           echo "Deu ruim: " . $conexao->error ."<br />";
         }

  }

  function insert2010($dados, $conexao){
     $dt_geracao = date("Y-m-d",strtotime(str_replace('/','-',$dados[0])));
     $hh_geracao = date("H:i:s", strtotime($dados[1]));
     $ano_eleicao = (integer) $dados[2];
     $nr_turno = (integer) $dados[3];
     $ds_eleicao = $dados[4];
     $sg_uf = $dados[5];
     $sg_ue = $dados[6];
     $nm_ue = $dados[7];
     $cd_cargo = (integer) $dados[8];
     $ds_cargo = $dados[9];
     $nm_candidato = $dados[10];
     $sq_candidato = (integer) $dados[11];
     $nr_candidato = (integer) $dados[12];
     $nr_cpf_candidato = (integer) $dados[13];
     $nm_urna_candidato = $dados[14];
     $cd_situacao_candidatura = (integer) $dados[15];
     $ds_situacao_candidatura = $dados[16];
     $nr_partido = (integer) $dados[17];
     $sg_partido = $dados[18];
     $nm_partido = $dados[19];
     $sq_coligacao = (integer) $dados[20];
     $nm_coligacao = $dados[21];
     $ds_composicao_coligacao = $dados[22];
     $cd_ocupacao = (integer) $dados[24];
     $ds_ocupacao = $dados[25];
     $dt_nascimento = date("Y-m-d",strtotime(str_replace('/','-',$dados[26])));
     $nr_titulo_eleitoral_candidato = (integer) $dados[27];
     $nr_idade_data_posse = (integer) $dados[28];
     $cd_genero = (integer) $dados[29];
     $ds_genero = $dados[30];
     $cd_grau_instrucao = (integer) $dados[31];
     $ds_grau_instrucao = $dados[32];
     $cd_estado_civil = (integer) $dados[33];
     $ds_estado_civil = $dados[34];
     $cd_nacionalidade = (integer) $dados[35];
     $ds_nacionalidade = $dados[36];
     $sg_uf_nascimento = $dados[37];
     $cd_municipio_nascimento = (integer) $dados[38];
     $nm_municipio_nascimento  = $dados[39];
     $nr_despesa_max_campanha = (integer) $dados[40];
     $cd_sit_tot_turno = (integer) $dados[41];
     $ds_sit_tot_turno = $dados[42]; 


     $dt_eleicao = "";
     $tp_abrangencia = "";
     $nm_social_candidato = "";
     $cd_detalhe_situacao_cand = "";
     $ds_detalhe_situacao_cand = "";
     $tp_agremiacao = "";
     $cd_cor_raca = "";
     $ds_cor_raca = "";
     $st_reeleicao  = "";
     $st_declarar_bens = "";
     $nr_protocolo_candidatura = "";
     $nr_processo = "";
     $cd_tipo_eleicao = "";
     $nm_tipo_eleicao = "";
     $cd_eleicao = "";
     $nm_email = "";

     //SQL com o Insert pra ser inserido no banco.
     $sql = "INSERT INTO candidatos (dt_geracao, hh_geracao, ano_eleicao, cd_tipo_eleicao, nm_tipo_eleicao,
       nr_turno, cd_eleicao, ds_eleicao, dt_eleicao, tp_abrangencia, sg_uf, sg_ue, nm_ue, cd_cargo, ds_cargo,
       sq_candidato, nr_candidato, nm_candidato, nm_urna_candidato, nm_social_candidato, nr_cpf_candidato, nm_email,
       cd_situacao_candidatura, ds_situacao_candidatura, cd_detalhe_situacao_cand, ds_detalhe_situacao_cand,
       tp_agremiacao, nr_partido, sg_partido, nm_partido, sq_coligacao, nm_coligacao, ds_composicao_coligacao,
       cd_nacionalidade, ds_nacionalidade, sg_uf_nascimento, cd_municipio_nascimento, nm_municipio_nascimento,
       dt_nascimento, nr_idade_data_posse, nr_titulo_eleitoral_candidato, cd_genero, ds_genero, cd_grau_instrucao,
       ds_grau_instrucao, cd_estado_civil, ds_estado_civil, cd_cor_raca, ds_cor_raca, cd_ocupacao, ds_ocupacao,
       nr_despesa_max_campanha, cd_sit_tot_turno, ds_sit_tot_turno, st_reeleicao, st_declarar_bens,
       nr_protocolo_candidatura, nr_processo)
       VALUES ('$dt_geracao', '$hh_geracao', '$ano_eleicao', '$cd_tipo_eleicao', '$nm_tipo_eleicao',
         '$nr_turno', '$cd_eleicao', '$ds_eleicao', '$dt_eleicao', '$tp_abrangencia', '$sg_uf', '$sg_ue',
         '$nm_ue', '$cd_cargo', '$ds_cargo', '$sq_candidato', '$nr_candidato', '$nm_candidato', '$nm_urna_candidato',
         '$nm_social_candidato', '$nr_cpf_candidato', '$nm_email', '$cd_situacao_candidatura', '$ds_situacao_candidatura',
         '$cd_detalhe_situacao_cand', '$ds_detalhe_situacao_cand', '$tp_agremiacao', '$nr_partido', '$sg_partido',
         '$nm_partido', '$sq_coligacao', '$nm_coligacao', '$ds_composicao_coligacao', '$cd_nacionalidade',
         '$ds_nacionalidade', '$sg_uf_nascimento', '$cd_municipio_nascimento', '$nm_municipio_nascimento',
         '$dt_nascimento', '$nr_idade_data_posse', '$nr_titulo_eleitoral_candidato', '$cd_genero', '$ds_genero',
         '$cd_grau_instrucao', '$ds_grau_instrucao', '$cd_estado_civil', '$ds_estado_civil', '$cd_cor_raca',
         '$ds_cor_raca', '$cd_ocupacao', '$ds_ocupacao', '$nr_despesa_max_campanha', '$cd_sit_tot_turno',
         '$ds_sit_tot_turno', '$st_reeleicao', '$st_declarar_bens', '$nr_protocolo_candidatura', '$nr_processo')";

         //Caso consiga inserir o sql, imprime a query na tela. Caso contrario aparece o erro.
         if ($conexao->query($sql) === TRUE) {
           echo "Cadastro de " . $nm_candidato . " realizado com sucesso <br />";
         } else {
           echo "Deu ruim: " . $conexao->error ."<br />";
         }

  }


?>
