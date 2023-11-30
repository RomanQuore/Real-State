<?php
include("../CONTROLLER/conexion.php");

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: iniciosesion1.php"); 
    exit();
}

$idUsuario = $_SESSION['id'];

$mensaje = "";
$mensaje_clase = "";

if (isset($_POST['editar'])) {

    $nombres = isset($_POST["nombres"]) ? mysqli_real_escape_string($conex, trim($_POST["nombres"])) : '';
    $apellidos = isset($_POST["apellidos"]) ? mysqli_real_escape_string($conex, trim($_POST["apellidos"])) : '';
    $numeroDocumento = isset($_POST["numeroDocumento"]) ? mysqli_real_escape_string($conex, trim($_POST["numeroDocumento"])) : '';
    $direccion = isset($_POST["direccion"]) ? mysqli_real_escape_string($conex, trim($_POST["direccion"])) : '';
    $numeroTelefono = isset($_POST["numeroTelefono"]) ? mysqli_real_escape_string($conex, trim($_POST["numeroTelefono"])) : '';
    $correoElectronico = isset($_POST["correoElectronico"]) ? mysqli_real_escape_string($conex, trim($_POST["correoElectronico"])) : '';

    $errores = [];

    if (!ctype_digit($numeroDocumento) || !ctype_digit($numeroTelefono)) {
        $errores[] = "El número de documento y teléfono deben contener solo dígitos.";
    }

    if (empty($errores)) {

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

$consulta_usuario = "SELECT * FROM registro WHERE id='$idUsuario'";
$resultado_usuario = mysqli_query($conex, $consulta_usuario);

if ($resultado_usuario && mysqli_num_rows($resultado_usuario) > 0) {
    $usuario = mysqli_fetch_assoc($resultado_usuario);

    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/perfilvendedor.css">
        <title>Editar Usuario</title>
        <style>
            .mensaje {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                background-color: <?php echo ($mensaje_clase === 'ok') ? '#4CAF50' : (($mensaje_clase === 'bad') ? '#f44336' : '#FFD700'); ?>;
                color: #ffffff;
                padding: 10px;
                text-align: center;
            }
        </style>
         <div class="header"><img src="http://imgfz.com/i/nzv3l4K.png" style="margin-left: 1em; width: 100px; height: 100px; float: left;"><div class="real-state">Real State</div>
         <h3><div class="usuario">Usuario: <?php echo $usuario['nombres']; ?></div></h3>
        </div>
        </head>
    <body>
        <br>
        <div class="container-father">
        <div class="container">

    <h2>Usuario: <?php echo $usuario['nombres']; ?></h2>
    <h2>Rol: <?php echo $usuario['Rol']; ?> (Vendedor)</h2>
        <h3>Editar Usuario</h3>

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
            
            <div class="container-buttons">
            <button type="submit" name="editar">Guardar Cambios</button>
            <button class="login"><a href="pagVendedor.php" class="login1">Volver</a></button>
            </div>
        </div>
        </div>
        </form>
    </body>
    <footer class="footer">
    <div class="footer-content">
    <div class="footer-heading">Conoce más sobre nosotros</div>
        <div class="hello">
        <img src="https://i.postimg.cc/504T57CV/userlmn-c28434f13729b9b1f7f1db10c7eb8d7a.png" width="100px" height="100px" alt="Real State">
        </div>
        <div class="footer-nav-copyright">©Real State 2023</div>
        <div class="footer-nav-link"><a href="">Política de privacidad</a></div>
        <br><br><br>
        <div class="footer-nav-contact"><a href="">Contáctenos 3202026512</a></div>
        <br><br><br>
        <div class="footer-nav-social">
            <a href="https://www.instagram.com/"><img src="https://i.postimg.cc/7P7rT5b2/logo-instagram-removebg-preview.png" width="50px" height="50px" alt="Instagram"></a>
            <a href="https://bit.ly/3RR4ZEE"><img src="https://i.postimg.cc/ZqGBV9md/vecteezy-whatsapp-logo-icon-24996543-361-removebg-preview.png" width="50px" height="50px" alt="WhatsApp"></a>
            <a href="https://www.facebook.com/"><img src="https://i.postimg.cc/Pqjnyhcq/vecteezy-facebook-png-icon-16716481-104-removebg-preview-1.png" width="50px" height="50px" alt="Facebook"></a>
            <a href="https://twitter.com/real_sjr"><img src="https://i.postimg.cc/MGQb6JK1/download-removebg-preview-1.png" width="50px" height="50px" alt="Twitter"></a>
    </div>
    </div>
</footer>
    </html>
<?php
} else {
    ?>
    <h3 class="bad">¡No se encontraron datos para editar!</h3>
<?php
}
?>



