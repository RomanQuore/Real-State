<?php
session_start();
require '../CONTROLLER/conexion.php';

if (!empty($_POST['usuario']) && !empty($_POST['contrasena'])) {
    $query = "SELECT id, usuario, contrasena FROM registro WHERE usuario = :usuario";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':usuario', $_POST['usuario']);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    // Simular una verificación de tiempo constante
    // Evita la revelación de información por tiempos de respuesta
    $validPassword = $userData && password_verify($_POST['contrasena'], $userData['contrasena']);
    $validUser = $userData !== false;

    // Mensaje genérico para evitar revelar información
    $message = "Credenciales inválidas";

    // Realizar acciones dependiendo del resultado de la verificación
    if ($validUser && $validPassword) {
        $_SESSION['usuario_id'] = $userData['id'];
        header('Location: ../VIEW/Pagprincipal.php');
        exit();
    } elseif (!$validUser) {
        $message = "Credenciales inválidas";
    }
    // Retraso intencional para una respuesta constante
    usleep(200000);
}
?>