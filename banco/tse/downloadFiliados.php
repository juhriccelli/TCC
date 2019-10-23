<?php
//Script para o download da relação de filiados do TSE.

//Todos os estados do Brasil com partidos
$estados = array("ac", "al", "ap", "am", "ba", "ce", "df", "es", "go", "ma", "mt", "ms", "mg", "pa", "pb",
"pr", "pe", "pi", "rj", "rn", "rs", "ro", "rr", "sc", "sp", "se", "to");

//Teste para o banco de dados somente com os filiados do estado de São Paulo
//$estados = array("sp");

$partidos = array("avante", "cidadania", "dc", "dem", "mdb", "novo", "patriota", "pcb", "pcdob", "pco", "pdt", "phs", "pl", "pmb", "pmn", "pode",
 "pp", "ppl", "pros", "prp", "prtb", "psb", "psc", "psd", "psdb", "psl", "psol", "pstu", "pt", "ptb", "ptc", "pv", "rede", "republicanos", "solidariedade", );

$tamP = count($partidos);
$tamE = count($estados);

$destino = mkdir($_SERVER['DOCUMENT_ROOT']."/temp/filiados", 0777, true);

for ($contPart=0; $contPart <$tamP; $contPart++) {
  for ($contEst=0; $contEst <$tamE ; $contEst++) {
    $url = "agencia.tse.jus.br/estatistica/sead/eleitorado/filiados/uf/filiados_".$partidos[$contPart]."_".$estados[$contEst].".zip";
    echo "$url <br />";

    $ch = curl_init($url);
    $fp = fopen($_SERVER['DOCUMENT_ROOT']."/temp/filiados/".$partidos[$contPart]."_".$estados[$contEst].".zip", "w");

    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);

    $z = new ZipArchive();
    $extrair = $z->open($_SERVER['DOCUMENT_ROOT']."/temp/filiados/".$partidos[$contPart]."_".$estados[$contEst].".zip");
    if ($extrair === true) {
        $z->extractTo($_SERVER['DOCUMENT_ROOT']."/temp/filiados/");
        $z->close();
    } else {
        echo 'Erro: '.$extrair;
    }
  }
}

?>
