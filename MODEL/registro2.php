<?php
include("../CONTROLLER/conexion.php");

if ($conex) {
    echo "";
}

if (isset($_POST['registrate'])) {
    $errores = [];

    // Validar longitud mínima para Usuario, Nombres y Apellidos
    $min_length = 4;
    $usuario = isset($_POST["Usuario"]) ? trim($_POST["Usuario"]) : '';
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : '';
    $nombres = isset($_POST["nombres"]) ? trim($_POST["nombres"]) : '';
    $apellidos = isset($_POST["apellidos"]) ? trim($_POST["apellidos"]) : '';

    if (strlen($usuario) < $min_length) {
        $errores[] = "El usuario debe tener al menos $min_length caracteres.";
    }

    if (strlen($nombres) < $min_length) {
        $errores[] = "El nombre debe tener al menos $min_length caracteres.";
    }

    if (strlen($apellidos) < $min_length) {
        $errores[] = "El apellido debe tener al menos $min_length caracteres.";
    }

    if (
        strlen($usuario) >= 4 &&
        strlen($contrasena) >= 4 &&
        strlen($nombres) >= 4 &&
        strlen($apellidos) >= 4 &&
        strlen($_POST['fechaNacimiento']) >= 1 &&
        strlen($_POST['tipoDocumento']) >= 1 &&
        strlen($_POST['numeroDocumento']) >= 4 &&
        strlen($_POST['direccion']) >= 4 &&
        strlen($_POST['correoElectronico']) >= 4 &&
        strlen($_POST['Rol']) >= 1 &&
        strlen($_POST['activo']) >= 1 &&
        empty($errores) // Verifica que no hay errores
    ) {
            $usuario = isset($_POST["Usuario"]) ? trim($_POST["Usuario"]) : '';
            $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : '';
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

            // Validar si la fecha de nacimiento es mayor a 18 años
            $fechaActual = new DateTime();
            $fechaNacimientoDate = new DateTime($fechaNacimiento);
            $edad = $fechaNacimientoDate->diff($fechaActual)->y;
            if ($edad < 18) {
                $errores[] = "Debes ser mayor de 18 años para registrarte.";
            }

            // Validar la contraseña
            if (!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*\W).{8,}$/', $contrasena)) {
                $errores[] = "La contraseña debe contener al menos una mayúscula, una minúscula, un número, un símbolo y tener al menos 8 caracteres.";
            }
            // validar minimo de letras en el nombre, apellido y usuario
            if (preg_match('/\b\w{4,}\b/', $_POST['Usuario']) &&
            preg_match('/\b\w{4,}\b/', $_POST['nombres']) && 
            preg_match('/\b\w{4,}\b/', $_POST['apellidos'])) {
                $errores[] = "El nombre de usuario, el nombre y el apellido deben contener al menos 4 caracteres.";
            }
            // Validar número de documento y teléfono
            if (!is_numeric($numeroDocumento)) {
                $errores[] = "El número de documento debe ser un valor numérico.";
            }
            if (!is_numeric($numeroTelefono)) {
                $errores[] = "El número de teléfono debe ser un valor numérico.";
            }

            // Si hay errores, mostrarlos
            if (!empty($errores)) {
                foreach ($errores as $error) {
                    echo '<p>' . $error . '</p>';
                }
            } else {
                // Evitar inyección SQL: Usa consultas preparadas
                $consulta = $conex->prepare("INSERT INTO registro (Usuario, Contrasena, nombres, apellidos, fechaNacimiento, tipoDocumento, numeroDocumento, direccion, numeroTelefono, correoElectronico, Rol, activo) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                // Encriptar la contraseña
                $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

                // Bind de parámetros y ejecución de la consulta preparada
                $consulta->bind_param("ssssssssssss", $usuario, $contrasena_encriptada, $nombres, $apellidos, $fechaNacimiento, $tipoDocumento, $numeroDocumento, $direccion, $numeroTelefono, $correoElectronico, $Rol, $activo);

                // Ejecutar consulta
                $resultado = $consulta->execute();

                if ($resultado) {
                    echo '<h3 class="ok">¡Te has registrado correctamente!</h3>';
                } else {
                    echo '<h3 class="bad">¡No se pudo realizar el registro!</h3>';
                }
            }
        }
    }
    ?>