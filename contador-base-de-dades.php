<?php
$servidor = "localhost";
$usuari = "root"; // Canvia segons la configuració
$contrasenya = ""; // Canvia segons la configuració
$base_dades = "visites_db";

$conn = new mysqli($servidor, $usuari, $contrasenya, $base_dades);

if ($conn->connect_error) {
    die("Connexió fallida: " . $conn->connect_error);
}

// Crear la taula si no existeix
$sql = "CREATE TABLE IF NOT EXISTS contador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    visites INT NOT NULL
)";
$conn->query($sql);

// Comprovar si hi ha registres
$sql = "SELECT visites FROM contador WHERE id=1";
$resultat = $conn->query($sql);

if ($resultat->num_rows == 0) {
    $sql = "INSERT INTO contador (id, visites) VALUES (1, 1)";
    $conn->query($sql);
    $visites = 1;
} else {
    $fila = $resultat->fetch_assoc();
    $visites = $fila['visites'] + 1;
    $sql = "UPDATE contador SET visites=$visites WHERE id=1";
    $conn->query($sql);
}

echo "Aquesta pàgina ha estat visitada $visites vegades.";

$conn->close();
?>
