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
            <img class="img1" src="data:image/jpeg;base64,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">
            <br>Vendedor: <?php echo $_SESSION['Usuario']; ?><br>
            <?php
// Configuración de la conexión a la base de datos
$host = 'localhost';
$usuario = 'root';
$contrasena = '';
$base_de_datos = 'real_state';

// Conexión a la base de datos
$conex = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar la conexión
if ($conex->connect_error) {
    die("Error de conexión: " . $conex->connect_error);
}

// Consulta SQL
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
        INNER JOIN tipo_oferta ON publicacion.Id_Tipo_Oferta = tipo_oferta.id_tipo_oferta";

$result = $conex->query($sql);

// Verificar si hay resultados
if ($result) {
    echo "<table>
            <tr>
                <th>Codigo Publicacion</th>
                <th>Tipo de Establecimiento</th>
                <th>Tipo de Oferta</th>
                <th>Imagen</th>
                <th>Descripción</th>
                <th>Características</th>
                <th>Número de Contacto</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id_publicacion"] . "</td>
                <td>" . $row["tipo_establecimiento"] . "</td>
                <td>" . $row["tipo_oferta"] . "</td>
                <td><img src='data:image/jpeg;base64," . base64_encode($row["imagen"]) . "' width='100' height='100' /></td>
                <td>" . $row["descripcion"] . "</td>
                <td>" . $row["caracteristicas"] . "</td>
                <td>" . $row["num_contacto"] . "</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "Error en la consulta: " . mysqli_error($conex);
}

// Cerrar la conexión
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
