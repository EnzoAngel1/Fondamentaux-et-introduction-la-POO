<?php
$paire = ' Nombre pair';
$impaire=' Nombre impair';
$i = 0;
$booléen=true;
for ($i=0; $i < 21; $i++) { 
    if ($i%2==0) {
        echo $i . $paire.PHP_EOL;
    }else echo $i . $impaire.PHP_EOL;
}
