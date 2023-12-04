<?php
include("../CONTROLLER/conexion.php");

session_start();

if ($conex) {
    echo "";
}

if (isset($_POST['registrate'])) {

    $id = isset($_POST["id"]) ? trim($_POST["id"]) : '';
    $usuario = isset($_POST["Usuario"]) ? mysqli_real_escape_string($conex, trim($_POST["Usuario"])) : '';
    $contrasena = isset($_POST["contrasena"]) ? $_POST["contrasena"] : '';
    $nombres = isset($_POST["nombres"]) ? trim($_POST["nombres"]) : '';
    $apellidos = isset($_POST["apellidos"]) ? trim($_POST["apellidos"]) : '';
    $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? $_POST['fechaNacimiento'] : '';
    $tipoDocumento = isset($_POST["tipoDocumento"]) ? trim($_POST["tipoDocumento"]) : '';
    $numeroDocumento = isset($_POST["numeroDocumento"]) ? trim($_POST["numeroDocumento"]) : '';
    $direccion = isset($_POST["direccion"]) ? trim($_POST["direccion"]) : '';
    $numeroTelefono = isset($_POST["numeroTelefono"]) ? trim($_POST["numeroTelefono"]) : '';
    $correoElectronico = isset($_POST["correoElectronico"]) ? trim($_POST["correoElectronico"]) : '';
    $Rol = isset($_POST["Rol"]) ? trim($_POST["Rol"]) : '';
    $activo = isset($_POST["activo"]) ? trim($_POST["activo"]) : '';

    $errores = [];

    $fechaActual = new DateTime();
    $fechaNac = new DateTime($fechaNacimiento);
    $edad = $fechaNac->diff($fechaActual)->y;
    if ($edad < 18) {
        $errores[] = "Debes ser mayor de 18 años para registrarte.";
    }

    if (!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,}$/', $contrasena)) {
        $errores[] = "La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial.";
    }

    if (strlen($usuario) < 4) {
        $errores[] = "El usuario debe tener al menos 4 caracteres.";
    }

    if (strlen($nombres) < 4) {
        $errores[] = "El nombre debe tener al menos 4 caracteres.";
    }

    if (strlen($apellidos) < 4) {
        $errores[] = "El apellido debe tener al menos 4 caracteres.";
    }

    if (!ctype_digit($numeroDocumento) || !ctype_digit($numeroTelefono)) {
        $errores[] = "El número de documento y teléfono deben contener solo dígitos.";
    }

    if (empty($errores)) {
        $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);
    
        $consulta = "INSERT INTO registro (Usuario, Contrasena, nombres, apellidos, fechaNacimiento, tipoDocumento, numeroDocumento, direccion, numeroTelefono, correoElectronico, Rol, activo) 
        VALUES ('$usuario','$contrasena_encriptada','$nombres','$apellidos','$fechaNacimiento','$tipoDocumento','$numeroDocumento','$direccion','$numeroTelefono','$correoElectronico','$Rol','$activo')";
        $resultado = mysqli_query($conex, $consulta);
        
        if ($resultado) {
            $id = mysqli_insert_id($conex);
        
            $_SESSION['id'] = $id;
            ?>
            <h3 class="ok" style="color: red;">¡Te has registrado correctamente!</h3>
<?php
        } else {
?>
            <h3 class="bad">¡No se pudo realizar el registro!</h3>
<?php
        }
    } else {
        foreach ($errores as $error) {
            ?>
            <h3 class="error"><?php echo $error; ?></h3>
            <?php
        }
    }
}
?>
