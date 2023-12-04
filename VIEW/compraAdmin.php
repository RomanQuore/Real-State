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
        <button type="submit" class="volver"><span><a href="../VIEW/pagAdmin.php" class="volver1">volver</a></span></button>
    </p>
</head>
<body>
    <div class="contenedor">
        <div class="ventana1">
        <?php
// Obtener el ID de la publicación de la URL
$id_publicacion = $_GET['id'];

// Resto de tu código para la conexión a la base de datos y la consulta SQL
$host = 'localhost';
$usuario = 'root';
$contrasena = '';
$base_de_datos = 'real_state';

$conex = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($conex->connect_error) {
    die("Error de conexión: " . $conex->connect_error);
}

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
        WHERE publicacion.id_publicacion = $id_publicacion";

$result_detalle = $conex->query($sql);

if ($result_detalle && $result_detalle->num_rows > 0) {
    // Mostrar la información detallada de la publicación
    $row_detalle = $result_detalle->fetch_assoc();
    ?>
    <div class="detalle">
        <!-- Mostrar la información detallada -->
        <img src="data:image/jpeg;base64,<?php echo base64_encode($row_detalle['imagen']); ?>" width="100" height="100" />
        <br> <?php echo $row_detalle['id_publicacion']; ?><br>
        <strong class="strong">Tipo de Establecimiento</strong> <br><?php echo $row_detalle['tipo_establecimiento']; ?><br><br>
        <strong class="strong">Tipo de Oferta</strong><br> <?php echo $row_detalle['tipo_oferta']; ?><br><br>
        <strong class="strong">Descripción</strong><br> <?php echo $row_detalle['descripcion']; ?><br><br>
        <strong class="strong">Características</strong><br> <?php echo $row_detalle['caracteristicas']; ?><br><br>
        <strong class="strong">Número de Contacto</strong><br> <?php echo $row_detalle['num_contacto']; ?><br>
    </div>
    <?php
} else {
    // Manejar el caso en que no se encuentre la publicación
    echo "Publicación no encontrada";
}

// Resto de tu código
// ...

$conex->close();
?>
</div>


    </div>

    <form method="POST" action="../CONTROLLER/enviarcomentario.php">
        <section id="contacto">
            <div class="contenedor px-4">
                <div class="fila gx-4 centrar-contenido">
                    <div class="columna-1g-8">
                        <h2>Caja de Comentarios</h2>
                        <div class="columna-xs-12">
                            <h3>Haz un Comentario</h3>
                            <div class="grupo-formulario">
                            <span>Nombre de Usuario</span>
                                <input class="campo-formulario" name="nombre" type="text" id="nombre" placeholder="Nombre" required>
                            </div>
                            <br>
                            <div class="grupo-formulario">
                                <span>Comentario</span>
                                <textarea class="campo-formulario" name="coment" cols="30" placeholder="Escribe tu comentario" required></textarea>
                            </div>
                            <span>Calificación</span>
                            <br>
                            <p class="clasificacion" required>
                                <input id="radio1" type="radio" name="estrellas" value="5">
                                <label for="radio1">★</label>
                                <input id="radio2" type="radio" name="estrellas" value="4">
                                <label for="radio2">★</label>
                                <input id="radio3" type="radio" name="estrellas" value="3">
                                <label for="radio3">★</label>
                                <input id="radio4" type="radio" name="estrellas" value="2">
                                <label for="radio4">★</label>
                                <input id="radio5" type="radio" name="estrellas" value="1">
                                <label for="radio5">★</label>
                            </p>    
                        </div>
                        <br>
                        <br>
                        <br>
                        <input class="boton-enviar" type="submit" value="Enviar Comentario">
                        <?php
                            $conexion=mysqli_connect("localhost", "root", "", "real_state");
                            $resultado=mysqli_query($conexion, 'SELECT * FROM coment');
                        
                            while($coment = mysqli_fetch_object($resultado)) {
                        ?>
                        <br>
                        <br>
                        <hr>
                        <?php echo $coment->nombre; ?>
                        <br>
                        <?php echo $coment->Calificacion; ?> estrella(s) <br>
                        (<?php echo $coment->fecha; ?>) <br>
                        <hr>
                        <?php echo $coment->coment; ?>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
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
