<?php
//Script para o download da relação de filiados do TSE.

$estados = array("ac", "al", "ap", "am", "ba", "ce", "df", "es", "go", "ma", "mt", "ms", "mg", "pa", "pb",
"pr", "pe", "pi", "rj", "rn", "rs", "ro", "rr", "sc", "sp", "se", "to");

$partidos = array("avante", "dc", "dem", "mdb", "novo", "patri", "pc_do_b", "pcb", "pco", "pdt", "phs", "pmb", "pmn", "pode", "pp", "ppl",
"pps", "pr", "prb", "pros", "prp", "prtb", "psb", "psc", "psd", "psdb", "psl", "psol", "pstu", "pt", "ptb", "ptc", "pv", "rede", "solidariedade", );


$destino = mkdir($_SERVER['DOCUMENT_ROOT']."/temp/filiados", 0777, true);

for ($contPart=0; $contPart <1; $contPart++) {
  for ($contEst=0; $contEst <1 ; $contEst++) {
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
