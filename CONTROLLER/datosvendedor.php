<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $user = "root";
    $pw = "";
    $db = "real_state";

    $conexion = new mysqli($host, $user, $pw, $db);

    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $resena = $_POST['resena'];

    $nombreImagen = $_FILES['fileToUpload']['name'];
    $rutaImagen = "../IMG/VENDEDOR/" . $nombreImagen; 

    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $rutaImagen);

    $sqlInsertar = "INSERT INTO datos_vendedor (nombre, apellido, telefono, email, resena, imagen) VALUES ('$nombre', '$apellido', '$telefono', '$email', '$resena', '$rutaImagen')";

    if ($conexion->query($sqlInsertar) === TRUE) {
        echo "Datos insertados correctamente en la base de datos.";
    } else {
        echo "Error al insertar datos: " . $conexion->error;
    }

    $conexion->close();
}
?>
