<?php
$host = "localhost";
$user = "root";
$pw = "";
$db = "real_state";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pw);
    // Establecer el modo de error de PDO a excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa";
} catch (PDOException $e) {
    die('Conexión fallida: ' . $e->getMessage());
}
?>