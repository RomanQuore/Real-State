<?php
session_start();

require '../CONTROLLER/conexion.php';

if(isset($_SESSION['usuario_id'])) {
    $records = $conn->prepare("SELECT id, usuario, contrasena FROM registro WHERE id = :id");
    $records->bindParam(':id', $_SESSION['usuario_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if(count($results) > 0) {
        $user = $results;
}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title> Bienvenido a Real State</title>
        <link rel="stylesheet" href="../CSS/style_iniciosesion.css">
</head>
<body>
<h1> Iniciar sesion o Registrase</h1>
<a href="iniciosesion1.php">Iniciar Sesion</a>
<a href="registro1.php">Registrate</a>
</body>
<html>