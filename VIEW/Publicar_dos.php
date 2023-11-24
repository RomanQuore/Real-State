<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $ubicacion = $_POST["ubicacion"];

    // Puedes realizar aquí alguna validación adicional si es necesario

    // Mostrar los datos ingresados
    echo "<h2>Establecimiento Publicado:</h2>";
    echo "<p><strong>Nombre:</strong> $nombre</p>";
    echo "<p><strong>Descripción:</strong> $descripcion</p>";
    echo "<p><strong>Precio:</strong> $precio</p>";
    echo "<p><strong>Ubicación:</strong> $ubicacion</p>";
} else {
    // Si alguien intenta acceder directamente a procesar.php, redirigir a index.php
    header("Location: index.php");
}
?>
