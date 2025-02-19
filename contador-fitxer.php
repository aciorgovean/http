<?php
$file = 'contador.txt';

// Comprovar si el fitxer existeix
if (!file_exists($file)) {
    file_put_contents($file, 0);
}

$visites = (int) file_get_contents($file);
$visites++;

file_put_contents($file, $visites);

echo "Aquesta pàgina ha estat visitada $visites vegades.";
?>
