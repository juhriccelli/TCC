<?php
//Script para o download da base de dados do TSE.

$estados = array("ac", "al", "ap", "am", "ba", "ce", "df", "es", "go", "ma", "mt", "ms", "mg", "pa", "pb",
"pr", "pe", "pi", "rj", "rn", "rs", "ro", "rr", "sc", "sp", "se", "to");

$partidos = array("avante", "dc", "dem", "mdb", "novo", "patri", "pc_do_b", "pcb", "pco", "pdt", "phs", "pmb", "pmn", "pode", "pp", "ppl",
"pps", "pr", "prb", "pros", "prp", "prtb", "psb", "psc", "psd", "psdb", "psl", "psol", "pstu", "pt", "ptb", "ptc", "pv", "rede", "solidariedade", );



$destino = mkdir(__DIR__.'/temp', 0777, true);

for ($contPart=0; $contPart <35; $contPart++) {
  for ($contEst=0; $contEst <27 ; $contEst++) {
    $url = "agencia.tse.jus.br/estatistica/sead/eleitorado/filiados/uf/filiados_".$partidos[$contPart]."_".$estados[$contEst].".zip";
    echo "$url <br />";

    $ch = curl_init($url);
    $fp = fopen("temp/".$partidos[$contPart]."_".$estados[$contEst].".zip", "w");

    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);

    $z = new ZipArchive();
    $extrair = $z->open("temp/".$partidos[$contPart]."_".$estados[$contEst].".zip");
    if ($extrair === true) {
        $z->extractTo('temp/');
        $z->close();
    } else {
        echo 'Erro: '.$extrair;
    }
  }
}






?>
