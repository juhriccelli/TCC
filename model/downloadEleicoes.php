<?php
//Script para o download do resultado das eleições do TSE.

/*$anos = array("1945", "1947", "1950", "1954","1955", "1958","1960", "1962","1965", "1966","1970",
"1974","1978", "1982","1986", "1989","1990", "1994","1996", "1998","2000", "2002","2004", "2006",
"2008", "2010","2012", "2014","2016", "2018");*/

$anos = array("1994","1996", "1998","2000", "2002","2004", "2006",
"2008", "2010","2012", "2014","2016", "2018");


$destino = mkdir(__DIR__.'/tempElei', 0777, true);

for ($contAno=0; $contAno <1; $contAno++) {
    $url = "agencia.tse.jus.br/estatistica/sead/odsele/votacao_candidato_munzona/votacao_candidato_munzona_".$anos[$contAno].".zip";
    echo "$url <br />";

    $ch = curl_init($url);
    $fp = fopen("tempElei/votacao_candidato_munzona_".$anos[$contAno].".zip", "w");

    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);

    $z = new ZipArchive();
    $extrair = $z->open("tempElei/votacao_candidato_munzona_".$anos[$contAno].".zip");
    if ($extrair === true) {
        $z->extractTo('tempElei/');
        $z->close();
    } else {
        echo 'Erro: '.$extrair;
    }
}


?>