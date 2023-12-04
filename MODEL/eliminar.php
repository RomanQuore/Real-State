<?php
$host = "localhost";
$user = "root";
$pw = "";
$db = "real_state";

$conn = new mysqli($host, $user, $pw, $db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['publicacion'])) {
        $id_publicacion = $_POST['publicacion'];

        $sql = "DELETE FROM publicacion WHERE id_publicacion = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_publicacion);

        if ($stmt->execute()) {
            echo "Publicación eliminada correctamente.";
        } else {
            echo "Error al eliminar la publicación: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "No se ha proporcionado ninguna ID de publicación para eliminar.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style_eliminar.css">
    <title>Eliminar</title>
    <div class="contenedor">
    <form action="#" method="post">
    <h3>Publicación a eliminar:</h3> 
    <input type="text" name="publicacion">
    <div clas="boton">
    <input type="submit" value="Eliminar" class="publicar">
    <button type="submit" class="volver"><span><a href="../VIEW/pagAdmin.php" class="volver1">volver</a></span></button>
</div>
</div>
</form>
</html>
