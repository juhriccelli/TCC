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

      //Retirar aspas do arquivo CSV
      for($i = 0; $i <$tamD; $i++){
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

        $dt_geracao = $dados[0];
        $hh_geracao  = $dados[0];
        $ano_eleicao = $dados[0];
        $cd_tipo_eleicao = $dados[0];
        $nm_tipo_eleicao = $dados[0];
        $nr_turno = $dados[0];
        $cd_eleicao = $dados[0];
        $ds_eleicao = $dados[0];
        $dt_eleicao = $dados[0];
        $tp_abrangencia = $dados[0];
        $sg_uf = $dados[0];
        $sg_ue = $dados[0];
        $nm_ue = $dados[0];
        $cd_municipio = $dados[0];
        $nm_municipio = $dados[0];
        $nr_zona = $dados[0];
        $cd_cargo = $dados[0];
        $ds_cargo = $dados[0];
        $sq_candidato = $dados[0];
        $nr_candidato = $dados[0];
        $nm_candidato = $dados[0];
        $nm_urna_candidato = $dados[0];
        $nm_social_candidato = $dados[0];
        $cd_situacao_candidatura = $dados[0];
        $ds_situacao_candidatura = $dados[0];
        $cd_detalhe_situacao_cand = $dados[0];
        $ds_detalhe_situacao_cand = $dados[0];
        $tp_agremiacao = $dados[0];
        $nr_partido = $dados[0];
        $sg_partido = $dados[0];
        $nm_partido = $dados[0];
        $sq_coligacao = $dados[0];
        $nm_coligacao = $dados[0];
        $ds_composicao_coligacao = $dados[0];
        $cd_sit_tot_turno = $dados[0];
        $ds_sit_tot_turno = $dados[0];
        $st_voto_em_transito = $dados[0];
        $qt_votos_nominais = $dados[0]; 

        //SQL com o Insert pra ser inserido no banco.
        $sql = "INSERT INTO eleicoes (dt_geracao, hh_geracao, ano_eleicao, cd_tipo_eleicao, nm_tipo_eleicao,
          nr_turno, cd_eleicao, ds_eleicao, dt_eleicao, tp_abrangencia, sg_uf, sg_ue, nm_ue, cd_municipio,
          nm_municipio, nr_zona, cd_cargo, ds_cargo, sq_candidato, nr_candidato, data_filiacao, situacao_registro,
          tipo_registro, data_processamento, data_desfiliacao, nm_candidato, nm_urna_candidato, nm_social_candidato,
          cd_situacao_candidatura, ds_situacao_candidatura, cd_detalhe_situacao_cand, ds_detalhe_situacao_cand,
          tp_agremiacao, nr_partido, sg_partido, nm_partido, sq_coligacao, nm_coligacao, ds_composicao_coligacao,
          cd_sit_tot_turno, ds_sit_tot_turno, st_voto_em_transito, qt_votos_nominais)
          VALUES ('$dt_geracao', '$hh_geracao', '$ano_eleicao', '$cd_tipo_eleicao', '$nm_tipo_eleicao', '$nr_turno',
            '$cd_eleicao', '$ds_eleicao', '$dt_eleicao', '$tp_abrangencia', '$sg_uf, '$sg_ue', '$nm_ue', '$cd_municipio',
            '$nm_municipio', '$nr_zona', '$cd_cargo', '$ds_cargo', '$sq_candidato', '$nr_candidato', '$data_filiacao',
            '$situacao_registro', '$tipo_registro', '$data_processamento', '$data_desfiliacao', '$nm_candidato',
            '$nm_urna_candidato', '$nm_social_candidato', '$cd_situacao_candidatura', '$ds_situacao_candidatura',
            '$cd_detalhe_situacao_cand', '$ds_detalhe_situacao_cand', '$tp_agremiacao', '$nr_partido', '$sg_partido',
            '$nm_partido', '$sq_coligacao', '$nm_coligacao', '$ds_composicao_coligacao', '$cd_sit_tot_turno',
            '$ds_sit_tot_turno', '$st_voto_em_transito', '$qt_votos_nominais')";

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
