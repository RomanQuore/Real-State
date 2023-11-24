<?php

include("../CONTROLLLER/Conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $mysqli = new mysqli($host,$user,$pw,$db); 
    $usuario = $_POST["Usuario"];
    $contrasenau = $_POST["contrasena"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $tipoDocumento = $_POST["tipoDocumento"];
    $numeroDocumento = $_POST["numeroDocumento"];
    $direccion = $_POST["direccion"];
    $numeroTelefono = $_POST["numeroTelefono"];
    $correoElectronico = $_POST["correoElectronico"];
    $rol = $_POST["rol"];

    $query = "INSERT INTO registro (Usuario,contrasena, nombres,apellidos,fechaNacimiento,tipoDocumento,numeroDocumento,direccion,numeroTelefono,correoElectronico,rol) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
     
$stmt = $mysqli->prepare($query);

if ($stmt) 
{

    $stmt->bind_param
    ("sssssssssss",$usuario,$contrasenau,$nombres,$apellidos,$fechaNacimiento,$tipoDocumento,$numeroDocumento,$direccion,$numeroTelefono,$correoElectronico,$rol);

    if ($stmt->execute()) 
    {
        header("Location: ../Pagprincipal.php");
        exit();
    } 
    else 
    {
        echo "Error al insertar datos: " . $stmt->error;
    }

    $stmt->close();
} else 
{
    echo "Error en la preparación de la consulta: " . $con->error;
}

$con->close();
} 
else
{
echo "El formulario no se ha enviado correctamente.";
}
?>