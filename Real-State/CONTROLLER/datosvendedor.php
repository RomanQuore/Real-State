<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos (modificar los valores según tu configuración)
    $host = "localhost";
    $user = "root";
    $pw = "";
    $db = "real_state";

    // Crear la conexión a la base de datos
    $conexion = new mysqli($host, $user, $pw, $db);

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $resena = $_POST['resena'];

    // Trabajar con la imagen subida (guardarla en una ubicación específica)
    $nombreImagen = $_FILES['fileToUpload']['name'];
    $rutaImagen = "../IMG/VENDEDOR/" . $nombreImagen; // Cambiar esta ruta

    // Mover la imagen cargada a una carpeta específica
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $rutaImagen);

    // Preparar la consulta SQL para insertar datos
    $sqlInsertar = "INSERT INTO datos_vendedor (nombre, apellido, telefono, email, resena, imagen) VALUES ('$nombre', '$apellido', '$telefono', '$email', '$resena', '$rutaImagen')";

    // Ejecutar la consulta y verificar si se ejecutó correctamente
    if ($conexion->query($sqlInsertar) === TRUE) {
        echo "Datos insertados correctamente en la base de datos.";
    } else {
        echo "Error al insertar datos: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}
?>
