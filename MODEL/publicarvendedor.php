<?php
include_once('../Controller/conexion.php');

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    $idProducto = $_GET["id"];

    $query = "SELECT * FROM publicaciones WHERE id = $idProducto";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $datos = mysqli_fetch_assoc($resultado);
    } else {
        echo "No se encontró el producto.";
        exit; 
    }
} else {
    echo "ID de producto no proporcionado.";
    exit; 
}
?>