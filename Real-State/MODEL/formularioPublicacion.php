<?php
$host = "localhost";
$user = "root";
$pw = "";
$db = "real_state";

$conn = new mysqli($host, $user, $pw, $db);

// Verificar si se ha enviado un ID de publicación para eliminar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['publicacion'])) {
        $id_publicacion = $_POST['publicacion'];

        // Utiliza sentencias preparadas para evitar inyección SQL
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

<html>
<form action="#" method="post">
    Publicación a eliminar: <input type="text" name="publicacion">
    <input type="submit" value="Eliminar">
</form>
</html>
