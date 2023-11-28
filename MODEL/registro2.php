<?php
    include("../CONTROLLER/conexion.php");
    if ($conex)
    {
        echo "";
    }
    if (isset($_POST['registrate'])){
       if (
         strlen($_POST['Usuario']) >=4 &&
         strlen($_POST['contrasena']) >=4 && 
         strlen($_POST['nombres']) >=4 &&
         strlen($_POST['apellidos']) >=4 &&
         strlen($_POST['fechaNacimiento']) >=1 &&
         strlen($_POST['tipoDocumento']) >=1 &&
         strlen($_POST['numeroDocumento']) >=4 &&
         strlen($_POST['direccion']) >=4 &&
         strlen($_POST['correoElectronico']) >=4 &&
         strlen($_POST['Rol']) >=1 &&
         strlen($_POST['activo']) >=1 )
            {
                $usuario = isset($_POST["Usuario"]) ? trim($_POST["Usuario"]) : '';
                $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : '';
                $contrasena = hash("sha256", $contrasena);
                $nombres = isset($_POST["nombres"]) ? trim($_POST["nombres"]) : '';
                $apellidos = isset($_POST["apellidos"]) ? trim($_POST["apellidos"]) : '';
                $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? $_POST['fechaNacimiento']: '';
                $tipoDocumento = isset($_POST["tipoDocumento"]) ? trim ($_POST["tipoDocumento"]): '';
                $numeroDocumento = isset($_POST["numeroDocumento"]) ? trim ($_POST["numeroDocumento"]): '';
                $direccion = isset($_POST["direccion"]) ? trim ($_POST["direccion"]): '';
                $numeroTelefono = isset($_POST["numeroTelefono"]) ? trim ($_POST["numeroTelefono"]): '';
                $correoElectronico = isset($_POST["correoElectronico"]) ? trim ($_POST["correoElectronico"]): '';
                $Rol = isset($_POST["Rol"]) ? trim ($_POST["Rol"]): '';
                $activo = isset($_POST["activo"]) ? trim ($_POST["activo"]): '';
                
                $consulta = "INSERT INTO registro (Usuario, Contrasena, nombres, apellidos, fechaNacimiento, tipoDocumento, numeroDocumento, direccion, numeroTelefono, correoElectronico, Rol, activo) 
                VALUES ('$usuario','$contrasena','$nombres','$apellidos','$fechaNacimiento','$tipoDocumento','$numeroDocumento','$direccion','$numeroTelefono','$correoElectronico','$Rol','$activo')";
                $resultado = mysqli_query($conex,$consulta);
                if ($resultado){
                    ?>
                    <h3 class="ok">¡Te has registrado correctamente!</h3>
                    <?php
                }else{
                    ?>
                    <h3 class="bad">¡No se pudo realizar el registro!</h3>
                    <?php
                }
            } else {
                ?>
                <h3 class="ok">¡El minimo de digitos es 5!</h3>
                <?php
            }
        }

?>
