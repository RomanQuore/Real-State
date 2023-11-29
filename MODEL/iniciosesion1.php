<?php
include '../CONTROLLER/conexion.php';

session_start();

if (isset($_GET['cerrarsesion'])) {
    session_unset();
    session_destroy();
}

if (isset($_SESSION['Rol'])) {
    switch ($_SESSION['Rol']) {
        
        case 1:
            header('location: ../VIEW/datosUsuarios.php');
            exit();
            break;
        case 2:
            header('location: ../VIEW/pagVendedor.php');
            exit();
            break;

        case 3:
            header('location: ../VIEW/pagComprador.php');
            exit();
            break;

        default:
    }
}

if (isset($_POST['Usuario']) && isset($_POST['Contrasena'])) {
    $usuario = $_POST['Usuario'];
    $contrasena = $_POST['Contrasena'];

    try {
        $dsn = "mysql:host=localhost;dbname=real_state";
        $username = "root";
        $password = "";

        $conex = new PDO($dsn, $username, $password);

        $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $conex->prepare('SELECT Usuario, Contrasena, Rol FROM registro WHERE Usuario = :usuario AND activo = 1');
        $query->execute(['usuario' => $usuario]);
        $row = $query->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            if (password_verify($contrasena, $row['Contrasena'])) {
                $_SESSION['Usuario'] = $row['Usuario'];
                $_SESSION['Rol'] = $row['Rol'];
                switch ($row['Rol']) {
                    case 1:
                        header('location: ../VIEW/php');
                        exit();
                        break;
                    case 2:
                        header('location: ../VIEW/pagVendedor.php');
                        exit();
                        break;

                    case 3:
                        header('location: ../VIEW/pagComprador.php');
                        exit();
                        break;
                }
            } else {
                $error_message = "El Usuario o Contraseña son incorrectos";
            }
        } else {
            $error_message = "El Usuario o Contraseña son incorrectos";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style_iniciosesion.css">
    <title>Inicio de Sesión</title>
</head>
<body> 
    <div id="contenedor">
        <div class="caja1">
            <img src="https://i.postimg.cc/rph6LSWH/nzv3l4-K-removebg-preview.png" class="img">
            <hr>
            <div><h1>Real State</h1></div>
            <br><br> ¿Aún no tienes una cuenta? <br> <br>
            <a href="../MODEL/registro1.php">Registrate</a>
        </div>
        <div class="caja2">
            <form action="#" method="POST">

                <h1>Inicio de sesión</h1>
                <?php
                if (isset($error_message)) {
                    echo '<p style="color: red;">' . $error_message . '</p>';
                }
                ?>
                <hr>
                <label for="usuario">Usuario</label>
                <br>
                <input type="text" name="Usuario" id="Usuario" placeholder="Usuario" required>
                <br>
                <label for="contrasena">Contraseña</label>
                <br>
                <input type="password" name="Contrasena" id="contrasena" placeholder="Contraseña" required>
                <br><br>
                <button type="submit">Iniciar sesión </button>
            </form>
        </div>
    </div>
</body>
<footer class="footer">
    <div class="footer-heading">Conoce más sobre nosotros</div>
    <div class="footer-content">
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
