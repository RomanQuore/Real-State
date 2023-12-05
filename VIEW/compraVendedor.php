<?php
include '../CONTROLLER/conexion.php';
session_start();
$_SESSION['Usuario']
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style_compra.css">
    <title> Pagina Principal </title>
    <p style="text-align: left;" class="hola">Real State <img src="http://imgfz.com/i/nzv3l4K.png" alt="Descripción de la imagen" style="width: 70px; float: left; margin-right: px;">
        <button type="submit" class="volver"><span><a href="../VIEW/PagVendedor.php" class="volver1">volver</a></span></button>
    </p>
</head>
<body>
    <div class="contenedor">
        <div class="ventana1">
        <?php
if (isset($_GET['id_publicacion']) && !empty($_GET['id_publicacion'])) {
    $id_publicacion = $_GET['id_publicacion'];

    $host = 'localhost';
    $usuario = 'root';
    $contrasena = '';
    $base_de_datos = 'real_state';

    $conex = new mysqli($host, $usuario, $contrasena, $base_de_datos);

    if ($conex->connect_error) {
        die("Error de conexión: " . $conex->connect_error);
    }

    $id_publicacion = $conex->real_escape_string($id_publicacion);

    $sql = "SELECT 
                publicacion.id_publicacion,
                tipo_establ.Descripcion_Establ AS tipo_establecimiento,
                tipo_oferta.Descripcion_Oferta AS tipo_oferta,
                publicacion.imagen,
                publicacion.descripcion,
                publicacion.caracteristicas,
                publicacion.num_contacto
            FROM publicacion 
            INNER JOIN tipo_establ ON publicacion.Id_Tipo_Establ = tipo_establ.id_tipo_establ
            INNER JOIN tipo_oferta ON publicacion.Id_Tipo_Oferta = tipo_oferta.id_tipo_oferta
            WHERE publicacion.id_publicacion = '$id_publicacion'";

    $result_detalle = $conex->query($sql);

    if ($result_detalle && $result_detalle->num_rows > 0) {
        $row_detalle = $result_detalle->fetch_assoc();
        ?>
        <div class="detalle">
            <!-- Mostrar la información detallada -->
            <img src="data:image/jpeg;base64,<?php echo base64_encode($row_detalle['imagen']); ?>" width="100" height="100" />
            <br> <?php echo $row_detalle['id_publicacion']; ?><br>
            <strong class="strong">Tipo de Establecimiento</strong> <br><?php echo htmlspecialchars($row_detalle['tipo_establecimiento']); ?><br><br>
            <strong class="strong">Tipo de Oferta</strong><br> <?php echo htmlspecialchars($row_detalle['tipo_oferta']); ?><br><br>
            <strong class="strong">Descripción</strong><br> <?php echo htmlspecialchars($row_detalle['descripcion']); ?><br><br>
            <strong class="strong">Características</strong><br> <?php echo htmlspecialchars($row_detalle['caracteristicas']); ?><br><br>
            <strong class="strong">Número de Contacto</strong><br> <?php echo htmlspecialchars($row_detalle['num_contacto']); ?><br>
        </div>

        <?php
        $sql_comentarios = "SELECT * FROM coment WHERE id_publicacion = '$id_publicacion'";
        $result_comentarios = $conex->query($sql_comentarios);

        if ($result_comentarios && $result_comentarios->num_rows > 0) {
            while ($comentario = $result_comentarios->fetch_assoc()) {
                ?>
                <div class="comentario">
                    <!-- Mostrar información del comentario -->
                    <?php echo htmlspecialchars($comentario['nombre']); ?> - <?php echo htmlspecialchars($comentario['calificacion']); ?> estrella(s) - <?php echo htmlspecialchars($comentario['fecha']); ?>
                    <br>
                    <?php echo htmlspecialchars($comentario['comentario']); ?>
                </div>
                <?php
            }
        } else {
            echo "No hay comentarios para esta publicación.";
        }
    } else {
        echo "Publicación no encontrada";
    }

    $conex->close();
}
?>

</div>
</div>
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
