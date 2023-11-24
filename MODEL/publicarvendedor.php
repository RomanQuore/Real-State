<?php
include_once('../Controller/conexion.php');

// Verificar si se recibió un ID de producto válido
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    $idProducto = $_GET["id"];

    // Realizar una consulta a la base de datos para obtener los datos del producto
    $query = "SELECT * FROM publicaciones WHERE id = $idProducto";
    $resultado = mysqli_query($conexion, $query);

    // Verificar si la consulta fue exitosa y obtener los datos del producto
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $datos = mysqli_fetch_assoc($resultado);
    } else {
        echo "No se encontró el producto.";
        exit; // Salir del script si no se encontró el producto
    }
} else {
    echo "ID de producto no proporcionado.";
    exit; // Salir del script si no se proporcionó un ID de producto válido
}
?>