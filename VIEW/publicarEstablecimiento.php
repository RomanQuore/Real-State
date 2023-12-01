<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Establecimiento</title>
</head>
<body>

<h2>Publicar Establecimiento</h2>

<form action="#" method="post" enctype="multipart/form-data">
    <label for="tipo_establecimiento">Tipo de Establecimiento:</label>
    <select name="tipo_establecimiento" id="tipo_establecimiento">
    <option value="0">Tipo de Establecimiento:</option>
    <?php 
    // Configuración de la conexión a la base de datos
    $host = 'localhost';
    $usuario = 'root';
    $contrasena = '';
    $base_de_datos = 'real_state';

    // Conexión a la base de datos
    $conex = new mysqli($host, $usuario, $contrasena, $base_de_datos);

    // Verificar la conexión
    if ($conex->connect_error) {
        die("Error de conexión: " . $conex->connect_error);
    }

    // Consulta SQL
    $sql = "SELECT Id_Tipo_Establ, Descripcion_Establ FROM tipo_establ";

    // Ejecutar la consulta
    $result = $conex->query($sql);

    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        // Recorrer los resultados y generar opciones
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['Id_Tipo_Establ'] . "'>" . $row['Descripcion_Establ'] . "</option>";
        }
    }

    // Cerrar la conexión
    $conex->close();
    ?> 
</select>


    <label for="tipo_oferta">Tipo de Oferta:</label>
    <select name="tipo_oferta" id="tipo_oferta">
    <option value="0">Tipo de oferta:</option>
    <?php 
    // Configuración de la conexión a la base de datos
    $host = 'localhost';
    $usuario = 'root';
    $contrasena = '';
    $base_de_datos = 'real_state';

    // Conexión a la base de datos
    $conex = new mysqli($host, $usuario, $contrasena, $base_de_datos);

    // Verificar la conexión
    if ($conex->connect_error) {
        die("Error de conexión: " . $conex->connect_error);
    }

    // Consulta SQL
    $sql = "SELECT Id_Tipo_Oferta, Descripcion_Oferta FROM tipo_oferta";

    // Ejecutar la consulta
    $result = $conex->query($sql);

    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        // Recorrer los resultados y generar opciones
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['Id_Tipo_Oferta'] . "'>" . $row['Descripcion_Oferta'] . "</option>";
        }
    }

    // Cerrar la conexión
    $conex->close();
    ?> 
</select>

    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen" accept="image/*" required><br>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" rows="4" required></textarea><br>

    <label for="caracteristicas">Características:</label>
    <textarea name="caracteristicas" rows="4" required></textarea><br>

    <label for="num_contacto">Número de Contacto:</label>
    <input type="text" name="num_contacto" required><br>

    <input type="submit" value="Publicar">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Configuración de la conexión a la base de datos
    $conex = mysqli_connect("localhost", "root", "", "real_state");
    // Verificar la conexión
    if ($conex->connect_error) {
        die("Error de conexión: " . $conex->connect_error);
    }

    // Recibir datos del formulario
    $tipo_establecimiento = isset($_POST['tipo_establecimiento']) ? $_POST['tipo_establecimiento'] : '';
    $tipo_oferta = isset($_POST['tipo_oferta']) ? $_POST['tipo_oferta'] : '';
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $caracteristicas = isset($_POST['caracteristicas']) ? $_POST['caracteristicas'] : '';
    $num_contacto = isset($_POST['num_contacto']) ? $_POST['num_contacto'] : '';

    // Procesar la imagen
    $imagen = isset($_FILES['imagen']['tmp_name']) ? file_get_contents($_FILES['imagen']['tmp_name']) : '';

    // Preparar la consulta SQL
    $sql = "INSERT INTO publicacion (Id_Tipo_Establ, Id_Tipo_Oferta, imagen, Descripcion, Caracteristicas, Num_Contacto) 
            VALUES (?, ?, ?, ?, ?, ?)";

    // Preparar la declaración
    $stmt = $conex->prepare($sql);

    // Vincular parámetros
    $stmt->bind_param("iisssi", $tipo_establecimiento, $tipo_oferta, $imagen, $descripcion, $caracteristicas, $num_contacto);

    // Ejecutar la consulta
    $stmt->execute();

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conex->close();

    // Redirigir a la página principal o mostrar un mensaje de éxito
    header("Location:../VIEW/pagVendedor.php");
    exit();
}
?>

</body>
</html>
