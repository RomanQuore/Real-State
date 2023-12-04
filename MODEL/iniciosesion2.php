<?php
session_start();
require '../CONTROLLER/conexion.php';

if (!empty($_POST['usuario']) && !empty($_POST['contrasena'])) {
    $query = "SELECT id, usuario, contrasena FROM registro WHERE usuario = :usuario";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':usuario', $_POST['usuario']);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    $validPassword = $userData && password_verify($_POST['contrasena'], $userData['contrasena']);
    $validUser = $userData !== false;

    $message = "Credenciales inválidas";

    if ($validUser && $validPassword) {
        $_SESSION['usuario_id'] = $userData['id'];
        header('Location: ../MODEL/iniciosesion1.php');
        exit();
    } elseif (!$validUser) {
        $message = "Credenciales inválidas";
    }
}
?>