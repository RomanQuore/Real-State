<?php

$host = "localhost";
$user = "root";
$pw = "";
$db = "real_state";

$conexion = new mysqli($host, $user, $pw, $db);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

$nombreProduc = $_POST['nombreProduc'] ?? '';
$valor = $_POST['valor'] ?? '';
$categoria = $_POST['Categoria'] ?? '';

$nombreImagen = $_FILES['../IMG/VENDEDOR']['name'];
$rutaImagenTemp = $_FILES['../IMG/VENDEDOR']['tmp_name'];
$rutaDestino = "C:/xampp/htdocs/Real-State/IMG/VENDEDOR" . $nombreImagen; 

move_uploaded_file($rutaImagenTemp, $rutaDestino);

$sql = "INSERT INTO publicaciones (id, nombreProduc, valor, imagen, Categoria) VALUES ('$id', '$nombreProduc', '$valor', '$rutaDestino', '$categoria')";

if ($conexion->query($sql) === TRUE) {
    echo "Publicación realizada correctamente.";
} else {
    echo "Error al publicar la entrada: " . $conexion->error;
}

$conexion->close();
?>
