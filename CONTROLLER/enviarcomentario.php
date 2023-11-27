<?php
$nombre = $_POST['nombre'];
$comentario = $_POST['coment'];
$Calificacion = $_POST['estrellas'];
$conexion = mysqli_connect("localhost", "root", "", "real_state");

$nombre = mysqli_real_escape_string($conexion, $nombre);
$comentario = mysqli_real_escape_string($conexion, $comentario);
$Calificacion = mysqli_real_escape_string($conexion, $Calificacion);

$resultado = mysqli_query($conexion, "INSERT INTO coment (nombre, coment, Calificacion) VALUES ('$nombre', '$comentario', '$Calificacion')");

if ($resultado) {
    header('Location: ../VIEW/compraVendedor.php');
    header('Location: ../VIEW/compraComprador.php');
} else {
    
    echo "Error al enviar el comentario.";
}
?>
