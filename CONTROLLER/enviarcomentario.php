<?php
$nombre = $_POST['nombre'];
$comentario = $_POST['coment'];
$Calificacion = $_POST['estrellas']; // Aquí se cambió a 'estrellas'
$conexion = mysqli_connect("localhost", "root", "", "real_state");

// Validación y limpieza de datos
$nombre = mysqli_real_escape_string($conexion, $nombre);
$comentario = mysqli_real_escape_string($conexion, $comentario);
$Calificacion = mysqli_real_escape_string($conexion, $Calificacion);

$resultado = mysqli_query($conexion, "INSERT INTO coment (nombre, coment, Calificacion) VALUES ('$nombre', '$comentario', '$Calificacion')");

if ($resultado) {
    // Éxito al insertar los datos
    header('Location: ../VIEW/compras.php');
} else {
    // Error al insertar los datos, manejarlo adecuadamente (puede ser una redirección a una página de error, por ejemplo)
    echo "Error al enviar el comentario.";
}
?>
