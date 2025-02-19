<?php
$visites = 1;

if (isset($_COOKIE['contador'])) {
    $visites = $_COOKIE['contador'] + 1;
}

setcookie('contador', $visites, time() + 3600 * 24 * 30); // Cookie vàlida per 30 dies

echo "Has visitat aquesta pàgina $visites vegades.";
?>
