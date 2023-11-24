<?php
function conectarBD() {
    $host = 'localhost';
    $user = 'root';
    $pw = '';
    $db = 'real_state';

    $conexion = new mysqli($host, $user, $pw, $db);

    if ($conexion->connect_error) {
        die('Error de conexión: ' . $conexion->connect_error);
    }

    return $conexion;
}

function insertarBusqueda($nombre, $buscarpublicacion, $preciodesde, $preciohasta, $fecha) {
    $conexion = conectarBD();

    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $buscarpublicacion = mysqli_real_escape_string($conexion, $buscarpublicacion);
    $preciodesde = mysqli_real_escape_string($conexion, $preciodesde);
    $preciohasta = mysqli_real_escape_string($conexion, $preciohasta);
    $fecha = mysqli_real_escape_string($conexion, $fecha);

    $query = "INSERT INTO busqueda (nombre, buscarpublicacion, preciodesde, preciohasta, fecha) 
              VALUES ('$nombre', '$buscarpublicacion', '$preciodesde','$preciohasta','$fecha')";

    $resultado = mysqli_query($conexion, $query);
    
    $conexion->close();

    return $resultado;
}

function buscarDatos($post) {
    $conexion = conectarBD();
    $sql = 'SELECT * FROM busqueda WHERE 1';

    if(isset($post["buscar"]) && $post["buscar"] != '') {
        $nombre = mysqli_real_escape_string($conexion, $post["buscar"]);
        $sql .= " AND nombre = '$nombre'"; 
    }

    if(isset($post["buscapublicacion"]) && $post["buscapublicacion"] != 'todos') {
        $buscarpublicacion = mysqli_real_escape_string($conexion, $post["buscapublicacion"]);
        $sql .= " AND buscarpublicacion = '$buscarpublicacion'";
    }

    // Añadir otros filtros aquí con la misma lógica...

    $result = $conexion->query($sql);

    if(!$result) {
        die('Query failed: ' . $conexion->error);
    }

    return $result;
}
?>


