<?php
//Script para o download da relação de candidaturas do TSE.

//Todas os candidatos no site do TSE
/*$anos = array("1945", "1947", "1950", "1954","1955", "1958","1960", "1962","1965", "1966","1970",
"1974","1978", "1982","1986", "1989","1990", "1994","1996", "1998","2000", "2002","2004", "2006",
"2008", "2010","2012", "2014","2016", "2018");*/

//Todas os candidatos no site do TSE com dados consolidados
$anos = array("1994","1996", "1998","2000", "2002","2004", "2006",
"2008", "2010","2012", "2014","2016", "2018");

//Teste para o banco de dados somente com os dados de 2018 do estado de Roraima (estado com menor população)
//$anos  = array("2018");

$tamanho = count($anos);

$destino = mkdir($_SERVER['DOCUMENT_ROOT']."/temp/candidatura", 0777, true);

for ($contAno=0; $contAno <$tamanho; $contAno++) {
    $url = "agencia.tse.jus.br/estatistica/sead/odsele/consulta_cand/consulta_cand_".$anos[$contAno].".zip";
    echo "$url <br />";

    $ch = curl_init($url);
    $fp = fopen($_SERVER['DOCUMENT_ROOT']."/temp/candidatura/consulta_cand_".$anos[$contAno].".zip", "w");

    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);

    $z = new ZipArchive();
    $extrair = $z->open($_SERVER['DOCUMENT_ROOT']."/temp/candidatura/consulta_cand_".$anos[$contAno].".zip");
    if ($extrair === true) {
        $z->extractTo($_SERVER['DOCUMENT_ROOT']."/temp/candidatura/");
        $z->close();
    } else {
        echo 'Erro: '.$extrair;
    }
}


?>
