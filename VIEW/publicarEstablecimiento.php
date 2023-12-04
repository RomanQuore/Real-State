<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style_publicar.css">
    <title>Publicar Establecimiento</title>
</head>
<body>
<div class="contenedor">
<form action="#" method="post" enctype="multipart/form-data">
<h2>Publicar Establecimiento</h2>
    <label for="tipo_establecimiento">Tipo de Establecimiento:</label>
    <select name="tipo_establecimiento" id="tipo_establecimiento">
    <option value="0">Tipo de Establecimiento:</option>
    <?php 
    $host = 'localhost';
    $usuario = 'root';
    $contrasena = '';
    $base_de_datos = 'real_state';

    $conex = new mysqli($host, $usuario, $contrasena, $base_de_datos);

    if ($conex->connect_error) {
        die("Error de conexión: " . $conex->connect_error);
    }

    $sql = "SELECT Id_Tipo_Establ, Descripcion_Establ FROM tipo_establ";

    $result = $conex->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['Id_Tipo_Establ'] . "'>" . $row['Descripcion_Establ'] . "</option>";
        }
    }

    $conex->close();
    ?> 
</select>


    <label for="tipo_oferta">Tipo de Oferta:</label>
    <select name="tipo_oferta" id="tipo_oferta">
    <option value="0">Tipo de oferta:</option>
    <?php 
    $host = 'localhost';
    $usuario = 'root';
    $contrasena = '';
    $base_de_datos = 'real_state';

    $conex = new mysqli($host, $usuario, $contrasena, $base_de_datos);

    if ($conex->connect_error) {
        die("Error de conexión: " . $conex->connect_error);
    }

    $sql = "SELECT Id_Tipo_Oferta, Descripcion_Oferta FROM tipo_oferta";

    $result = $conex->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['Id_Tipo_Oferta'] . "'>" . $row['Descripcion_Oferta'] . "</option>";
        }
    }

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
    <div class="boton">
    <input type="submit" value="Publicar" class="publicar">
    <button type="submit" class="volver"><span><a href="../VIEW/pagVendedor.php" class="volver1">volver</a></span></button>
    </div>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conex = mysqli_connect("localhost", "root", "", "real_state");
    if ($conex->connect_error) {
        die("Error de conexión: " . $conex->connect_error);
    }

    $tipo_establecimiento = isset($_POST['tipo_establecimiento']) ? $_POST['tipo_establecimiento'] : '';
    $tipo_oferta = isset($_POST['tipo_oferta']) ? $_POST['tipo_oferta'] : '';
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $caracteristicas = isset($_POST['caracteristicas']) ? $_POST['caracteristicas'] : '';
    $num_contacto = isset($_POST['num_contacto']) ? $_POST['num_contacto'] : '';

    $imagen = isset($_FILES['imagen']['tmp_name']) ? file_get_contents($_FILES['imagen']['tmp_name']) : '';

    $sql = "INSERT INTO publicacion (Id_Tipo_Establ, Id_Tipo_Oferta, imagen, Descripcion, Caracteristicas, Num_Contacto) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conex->prepare($sql);

    $stmt->bind_param("iisssi", $tipo_establecimiento, $tipo_oferta, $imagen, $descripcion, $caracteristicas, $num_contacto);

    $stmt->execute();

    $stmt->close();
    $conex->close();

    header("Location:../VIEW/pagVendedor.php");
    exit();
}
?>
</div>
</body>
</html>
