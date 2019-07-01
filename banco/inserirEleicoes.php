<?php
  //Conectar o banco de dados
  require_once('conectarBD.php');

  //descobrir quantidade de arquivos na pasta
  chdir($_SERVER['DOCUMENT_ROOT']."/temp/eleicao/");
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
        if($ano >= 2016){
          insert2016($dados, $conexao);
        }
        elseif ($ano == 2014) {
          insert2014($dados, $conexao);
        }
        else{
          insert2012($dados, $conexao);
        }
      }
    }
    fclose($arquivo);
  };


  function insert2016($dados, $conexao){
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
     $cd_municipio = (integer) $dados[13];
     $nm_municipio = $dados[14];
     $nr_zona = (integer) $dados[15];
     $cd_cargo = (integer) $dados[16];
     $ds_cargo = $dados[17];
     $sq_candidato = (integer) $dados[18];
     $nr_candidato = (integer) $dados[19];
     $nm_candidato = $dados[20];
     $nm_urna_candidato = $dados[21];
     $nm_social_candidato = $dados[22];
     $cd_situacao_candidatura = (integer) $dados[23];
     $ds_situacao_candidatura = $dados[24];
     $cd_detalhe_situacao_cand = (integer) $dados[25];
     $ds_detalhe_situacao_cand = $dados[26];
     $tp_agremiacao = $dados[27];
     $nr_partido = (integer) $dados[28];
     $sg_partido = $dados[29];
     $nm_partido = $dados[30];
     $sq_coligacao = (integer) $dados[31];
     $nm_coligacao = $dados[32];
     $ds_composicao_coligacao = $dados[33];
     $cd_sit_tot_turno = (integer) $dados[34];
     $ds_sit_tot_turno = $dados[35];
     $st_voto_em_transito = $dados[36];
     $qt_votos_nominais = (integer) $dados[37];

     //SQL com o Insert pra ser inserido no banco.
     $sql = "INSERT INTO eleicoes (dt_geracao, hh_geracao, ano_eleicao, cd_tipo_eleicao, nm_tipo_eleicao,
       nr_turno, cd_eleicao, ds_eleicao, dt_eleicao, tp_abrangencia, sg_uf, sg_ue, nm_ue, cd_municipio,
       nm_municipio, nr_zona, cd_cargo, ds_cargo, sq_candidato, nr_candidato,
       nm_candidato, nm_urna_candidato, nm_social_candidato,
       cd_situacao_candidatura, ds_situacao_candidatura, cd_detalhe_situacao_cand, ds_detalhe_situacao_cand,
       tp_agremiacao, nr_partido, sg_partido, nm_partido, sq_coligacao, nm_coligacao, ds_composicao_coligacao,
       cd_sit_tot_turno, ds_sit_tot_turno, st_voto_em_transito, qt_votos_nominais)
       VALUES ('$dt_geracao', '$hh_geracao', '$ano_eleicao', '$cd_tipo_eleicao', '$nm_tipo_eleicao', '$nr_turno',
         '$cd_eleicao', '$ds_eleicao', '$dt_eleicao', '$tp_abrangencia', '$sg_uf', '$sg_ue', '$nm_ue', '$cd_municipio',
         '$nm_municipio', '$nr_zona', '$cd_cargo', '$ds_cargo', '$sq_candidato', '$nr_candidato',
         '$nm_candidato',
         '$nm_urna_candidato', '$nm_social_candidato', '$cd_situacao_candidatura', '$ds_situacao_candidatura',
         '$cd_detalhe_situacao_cand', '$ds_detalhe_situacao_cand', '$tp_agremiacao', '$nr_partido', '$sg_partido',
         '$nm_partido', '$sq_coligacao', '$nm_coligacao', '$ds_composicao_coligacao', '$cd_sit_tot_turno',
         '$ds_sit_tot_turno', '$st_voto_em_transito', '$qt_votos_nominais')";

         //Caso consiga inserir o sql, imprime a query na tela. Caso contrario aparece o erro.
         if ($conexao->query($sql) === TRUE) {
           echo "Cadastro de " . $nm_candidato . " realizado com sucesso <br />";
         } else {
           echo "Deu ruim: " . $conexao->error ."<br />";
         }

  }

  function insert2014($dados, $conexao){
    $dt_geracao = date("Y-m-d",strtotime(str_replace('/','-',$dados[0])));
    $hh_geracao  = date("H:i:s", strtotime($dados[1]));
    $ano_eleicao = (integer) $dados[2];
    $nr_turno = (integer) $dados[3];
    $ds_eleicao = $dados[4];
    $sg_uf = $dados[5];
    $sg_ue = $dados[6];
    $cd_municipio = (integer) $dados[7];
    $nm_municipio = $dados[8];
    $nr_zona = (integer) $dados[9];
    $cd_cargo = (integer) $dados[10];
    $nr_candidato = (integer) $dados[11];
    $sq_candidato = (integer) $dados[12];
    $nm_candidato = $dados[13];
    $nm_urna_candidato = $dados[14];
    $ds_cargo = $dados[15];
    $cd_situacao_candidatura = (integer) $dados[18];
    $ds_situacao_candidatura = $dados[19];
    $cd_sit_tot_turno = (integer) $dados[20];
    $ds_sit_tot_turno = $dados[21];
    $nr_partido = (integer) $dados[22];
    $sg_partido = $dados[23];
    $nm_partido = $dados[24];
    $sq_coligacao = (integer) $dados[25];
    $nm_coligacao = $dados[26];
    $ds_composicao_coligacao = $dados[27];
    $qt_votos_nominais = (integer) $dados[28];
    $st_voto_em_transito = $dados[29];

    $cd_tipo_eleicao = "";
    $nm_tipo_eleicao = "";
    $cd_eleicao = "";
    $dt_eleicao = "";
    $tp_abrangencia = "";
    $nm_ue = "";
    $nm_social_candidato = "";
    $cd_detalhe_situacao_cand = "";
    $ds_detalhe_situacao_cand = "";
    $tp_agremiacao = "";

    //SQL com o Insert pra ser inserido no banco.
    $sql = "INSERT INTO eleicoes (dt_geracao, hh_geracao, ano_eleicao, cd_tipo_eleicao, nm_tipo_eleicao,
      nr_turno, cd_eleicao, ds_eleicao, dt_eleicao, tp_abrangencia, sg_uf, sg_ue, nm_ue, cd_municipio,
      nm_municipio, nr_zona, cd_cargo, ds_cargo, sq_candidato, nr_candidato,
      nm_candidato, nm_urna_candidato, nm_social_candidato,
      cd_situacao_candidatura, ds_situacao_candidatura, cd_detalhe_situacao_cand, ds_detalhe_situacao_cand,
      tp_agremiacao, nr_partido, sg_partido, nm_partido, sq_coligacao, nm_coligacao, ds_composicao_coligacao,
      cd_sit_tot_turno, ds_sit_tot_turno, st_voto_em_transito, qt_votos_nominais)
      VALUES ('$dt_geracao', '$hh_geracao', '$ano_eleicao', '$cd_tipo_eleicao', '$nm_tipo_eleicao', '$nr_turno',
        '$cd_eleicao', '$ds_eleicao', '$dt_eleicao', '$tp_abrangencia', '$sg_uf', '$sg_ue', '$nm_ue', '$cd_municipio',
        '$nm_municipio', '$nr_zona', '$cd_cargo', '$ds_cargo', '$sq_candidato', '$nr_candidato',
        '$nm_candidato',
        '$nm_urna_candidato', '$nm_social_candidato', '$cd_situacao_candidatura', '$ds_situacao_candidatura',
        '$cd_detalhe_situacao_cand', '$ds_detalhe_situacao_cand', '$tp_agremiacao', '$nr_partido', '$sg_partido',
        '$nm_partido', '$sq_coligacao', '$nm_coligacao', '$ds_composicao_coligacao', '$cd_sit_tot_turno',
        '$ds_sit_tot_turno', '$st_voto_em_transito', '$qt_votos_nominais')";

    //Caso consiga inserir o sql, imprime a query na tela. Caso contrario aparece o erro.
    if ($conexao->query($sql) === TRUE) {
      echo "Cadastro de " . $nm_candidato . " realizado com sucesso <br />";
    } else {
      echo "Deu ruim: " . $conexao->error ."<br />";
    }
  }

  function insert2012($dados, $conexao){
    $dt_geracao = date("Y-m-d",strtotime(str_replace('/','-',$dados[0])));
    $hh_geracao  = date("H:i:s", strtotime($dados[1]));
    $ano_eleicao = (integer) $dados[2];
    $nr_turno = (integer) $dados[3];
    $ds_eleicao = $dados[4];
    $sg_uf = $dados[5];
    $sg_ue = $dados[6];
    $cd_municipio = (integer) $dados[7];
    $nm_municipio = $dados[8];
    $nr_zona = (integer) $dados[9];
    $cd_cargo = (integer) $dados[10];
    $nr_candidato = (integer) $dados[11];
    $sq_candidato = (integer) $dados[12];
    $nm_candidato = $dados[13];
    $nm_urna_candidato = $dados[14];
    $ds_cargo = $dados[15];
    $cd_situacao_candidatura = (integer) $dados[18];
    $ds_situacao_candidatura = $dados[19];
    $cd_sit_tot_turno = (integer) $dados[20];
    $ds_sit_tot_turno = $dados[21];
    $nr_partido = (integer) $dados[22];
    $sg_partido = $dados[23];
    $nm_partido = $dados[24];
    $sq_coligacao = (integer) $dados[25];
    $nm_coligacao = $dados[26];
    $ds_composicao_coligacao = $dados[27];
    $qt_votos_nominais = (integer) $dados[28];

    $st_voto_em_transito = "";
    $cd_tipo_eleicao = "";
    $nm_tipo_eleicao = "";
    $cd_eleicao = "";
    $dt_eleicao = "";
    $tp_abrangencia = "";
    $nm_ue = "";
    $nm_social_candidato = "";
    $cd_detalhe_situacao_cand = "";
    $ds_detalhe_situacao_cand = "";
    $tp_agremiacao = "";

    //SQL com o Insert pra ser inserido no banco.
    $sql = "INSERT INTO eleicoes (dt_geracao, hh_geracao, ano_eleicao, cd_tipo_eleicao, nm_tipo_eleicao,
      nr_turno, cd_eleicao, ds_eleicao, dt_eleicao, tp_abrangencia, sg_uf, sg_ue, nm_ue, cd_municipio,
      nm_municipio, nr_zona, cd_cargo, ds_cargo, sq_candidato, nr_candidato,
      nm_candidato, nm_urna_candidato, nm_social_candidato,
      cd_situacao_candidatura, ds_situacao_candidatura, cd_detalhe_situacao_cand, ds_detalhe_situacao_cand,
      tp_agremiacao, nr_partido, sg_partido, nm_partido, sq_coligacao, nm_coligacao, ds_composicao_coligacao,
      cd_sit_tot_turno, ds_sit_tot_turno, st_voto_em_transito, qt_votos_nominais)
      VALUES ('$dt_geracao', '$hh_geracao', '$ano_eleicao', '$cd_tipo_eleicao', '$nm_tipo_eleicao', '$nr_turno',
        '$cd_eleicao', '$ds_eleicao', '$dt_eleicao', '$tp_abrangencia', '$sg_uf', '$sg_ue', '$nm_ue', '$cd_municipio',
        '$nm_municipio', '$nr_zona', '$cd_cargo', '$ds_cargo', '$sq_candidato', '$nr_candidato',
        '$nm_candidato',
        '$nm_urna_candidato', '$nm_social_candidato', '$cd_situacao_candidatura', '$ds_situacao_candidatura',
        '$cd_detalhe_situacao_cand', '$ds_detalhe_situacao_cand', '$tp_agremiacao', '$nr_partido', '$sg_partido',
        '$nm_partido', '$sq_coligacao', '$nm_coligacao', '$ds_composicao_coligacao', '$cd_sit_tot_turno',
        '$ds_sit_tot_turno', '$st_voto_em_transito', '$qt_votos_nominais')";

    //Caso consiga inserir o sql, imprime a query na tela. Caso contrario aparece o erro.
    if ($conexao->query($sql) === TRUE) {
      echo "Cadastro de " . $nm_candidato . " realizado com sucesso <br />";
    } else {
      echo "Deu ruim: " . $conexao->error ."<br />";
    }
  }

?>
