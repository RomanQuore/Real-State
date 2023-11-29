<?php
include("../CONTROLLER/conexion.php");

// Iniciar sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id'])) {
    header("Location: login.php"); // Redirigir al usuario al formulario de inicio de sesión si no ha iniciado sesión
    exit();
}

// Obtener el ID del usuario logeado
$idUsuario = $_SESSION['id'];

// Definir variables para mensajes
$mensaje = "";
$mensaje_clase = "";

// Verificar si se ha enviado el formulario
if (isset($_POST['editar'])) {
    // Obtener los datos del formulario
    $nombres = isset($_POST["nombres"]) ? mysqli_real_escape_string($conex, trim($_POST["nombres"])) : '';
    $apellidos = isset($_POST["apellidos"]) ? mysqli_real_escape_string($conex, trim($_POST["apellidos"])) : '';
    $numeroDocumento = isset($_POST["numeroDocumento"]) ? mysqli_real_escape_string($conex, trim($_POST["numeroDocumento"])) : '';
    $direccion = isset($_POST["direccion"]) ? mysqli_real_escape_string($conex, trim($_POST["direccion"])) : '';
    $numeroTelefono = isset($_POST["numeroTelefono"]) ? mysqli_real_escape_string($conex, trim($_POST["numeroTelefono"])) : '';
    $correoElectronico = isset($_POST["correoElectronico"]) ? mysqli_real_escape_string($conex, trim($_POST["correoElectronico"])) : '';

    // Validaciones y actualización de datos
    $errores = [];

    // Verificar que el número de documento y teléfono sean numéricos
    if (!ctype_digit($numeroDocumento) || !ctype_digit($numeroTelefono)) {
        $errores[] = "El número de documento y teléfono deben contener solo dígitos.";
    }

    if (empty($errores)) {
        // Actualizar los datos en la base de datos
        $consulta = "UPDATE registro SET nombres='$nombres', apellidos='$apellidos', numeroDocumento='$numeroDocumento', direccion='$direccion', numeroTelefono='$numeroTelefono', correoElectronico='$correoElectronico' WHERE id='$idUsuario'";
        $resultado = mysqli_query($conex, $consulta);

        if ($resultado) {
            $mensaje = "Los datos se han actualizado correctamente.";
            $mensaje_clase = "ok";
        } else {
            $mensaje = "No se pudo realizar la actualización de datos. Error en la consulta: " . mysqli_error($conex);
            $mensaje_clase = "bad";
        }
    } else {
        $mensaje = implode("<br>", $errores);
        $mensaje_clase = "error";
    }
}

// Consulta para obtener los datos actuales del usuario
$consulta_usuario = "SELECT * FROM registro WHERE id='$idUsuario'";
$resultado_usuario = mysqli_query($conex, $consulta_usuario);

// Verificar si se obtuvieron resultados
if ($resultado_usuario && mysqli_num_rows($resultado_usuario) > 0) {
    $usuario = mysqli_fetch_assoc($resultado_usuario);

    // Mostrar el formulario con los datos actuales del usuario
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Usuario</title>
        <style>
            form {
                background-color: #ffffff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                width: 300px;
                position: relative;
            }

            label {
                display: block;
                margin-top: 10px;
            }

            input {
                width: 100%;
                padding: 8px;
                margin-top: 5px;
                margin-bottom: 10px;
                box-sizing: border-box;
            }

            button {
                background-color: #329B93;
                color: #ffffff;
                padding: 10px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            button:hover {
                background-color: #206e68;
            }

            .mensaje {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                background-color: <?php echo ($mensaje_clase === 'ok') ? '#4CAF50' : (($mensaje_clase === 'bad') ? '#f44336' : '#FFD700'); ?>;
                color: #ffffff;
                padding: 10px;
                text-align: center;
                border-radius: 8px 8px 0 0;
            }
        </style>
    </head>
    <body>
        <h2>Editar Usuario</h2>

        <div class="mensaje <?php echo $mensaje_clase; ?>"><?php echo $mensaje; ?></div>

        <form action="#" method="post">
            <input type="hidden" name="id" value="<?php echo $idUsuario; ?>">
            <label for="nombres">Nombres:</label>
            <input type="text" name="nombres" value="<?php echo $usuario['nombres']; ?>" required>

            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" value="<?php echo $usuario['apellidos']; ?>" required>

            <label for="numeroDocumento">Número de Documento:</label>
            <input type="text" name="numeroDocumento" value="<?php echo $usuario['numeroDocumento']; ?>" required>

            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" value="<?php echo $usuario['direccion']; ?>" required>

            <label for="numeroTelefono">Número de Teléfono:</label>
            <input type="text" name="numeroTelefono" value="<?php echo $usuario['numeroTelefono']; ?>" required>

            <label for="correoElectronico">Correo Electrónico:</label>
            <input type="email" name="correoElectronico" value="<?php echo $usuario['correoElectronico']; ?>" required>

            <button type="submit" name="editar">Guardar Cambios</button>
        </form>
    </body>
    </html>
<?php
} else {
    ?>
    <h3 class="bad">¡No se encontraron datos para editar!</h3>
<?php
}
?>



