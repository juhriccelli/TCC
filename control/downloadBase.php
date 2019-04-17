<?php
//Script para o download da base de dados do TSE.

$estados = array("ac", "al", "ap", "am", "ba", "ce", "df", "es", "go", "ma", "mt", "ms", "mg", "pa", "pb",
"pr", "pe", "pi", "rj", "rn", "rs", "ro", "rr", "sc", "sp", "se", "to");

$partidos = array("avante", "dc", "dem", "mdb", "novo", "patri", "pc_do_b", "pcb", "pco", "pdt", "phs", "pmb", "pmn", "pode", "pp", "ppl",
"pps", "pr", "prb", "pros", "prp", "prtb", "psb", "psc", "psd", "psdb", "psl", "psol", "pstu", "pt", "ptb", "ptc", "pv", "rede", "solidariedade", );

echo $partidos[10];

agencia.tse.jus.br/estatistica/sead/eleitorado/filiados/uf/filiados_$partidos[0]_$estados[0].zip;

?>
