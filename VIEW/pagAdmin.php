<?php
include '../CONTROLLER/conexion.php';
session_start();
$_SESSION['Usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style_principal.css">
    <title>Pagina Principal</title>
    <div class="header">
        <img src="http://imgfz.com/i/nzv3l4K.png" style="margin-left: 1em; width: 100px; height: 100px; float: left;">
        <div class="container-select">
        <div class="real-state"><h2>Real State</h2></div>
            <div class="container-select2">
                <p class="usuario"><?php echo $_SESSION['Usuario']; ?></p>
                <select id="accionesSelect" onchange="redireccionar()">
                    <option disabled selected value>Opciones ⚙︎</option>
                    <option value="editar_perfil">Administrar</option>
                    <option value="publicar">Eliminar</option>
                    <option value="cerrar_sesion">Cerrar sesión</option>
                </select>
            </div>
        </div>
        </div>
    </div>
    <form id="cerrarSesionForm" action="../MODEL/cerrarsesion.php" method="POST"></form>

    <script>
        function redireccionar() {
            var select = document.getElementById("accionesSelect");
            var opcionSeleccionada = select.value;

            if (opcionSeleccionada === "publicar") {
                window.location.href = "../MODEL/eliminar.php";
            } else if (opcionSeleccionada === "cerrar_sesion") {
                var formCerrarSesion = document.getElementById("cerrarSesionForm");
                formCerrarSesion.style.display = "block";
                formCerrarSesion.submit();
            } else if (opcionSeleccionada === "editar_perfil") {
                window.location.href = "../VIEW/datosUsuarios.php";
            }
        }
    </script>
</head>
<body>

<div class="contenedor">
        <div class="subcontenedor1">
            <img src="http://imgfz.com/i/nzv3l4K.png" alt="Logo de la empresa" class="logo" style="width: 150px; height: 150px;">
            <hr>
            <h2>Información de la Empresa</h2>
            <p><h3>Real State</h3></p>
            <p>Proporcionamos un<br> espacio para facilitar<br> los trámites del<br> cliente en finca raíz, <br> actuando como <br>intermediario en la<br> compra y venta<br> de propieades.</p>
        </div>

<div class="subcontenedor3">
<button class="prev"> &lt; </button>
    </div>

    <div class="subcontenedor2">
    <?php
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
            INNER JOIN tipo_oferta ON publicacion.Id_Tipo_Oferta = tipo_oferta.id_tipo_oferta";

    $result = $conex->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="ventana ventana1">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['imagen']); ?>" width="100" height="100" />
                <br> <?php echo $row['id_publicacion']; ?><br>
                <strong class="strong">Tipo de Establecimiento</strong> <br><?php echo $row['tipo_establecimiento']; ?><br><br>
                <strong class="strong">Tipo de Oferta</strong><br> <?php echo $row['tipo_oferta']; ?><br><br>
                <strong class="strong">Descripción</strong><br> <?php echo $row['descripcion']; ?><br><br>
                <strong class="strong">Características</strong><br> <?php echo $row['caracteristicas']; ?><br><br>
                <strong class="strong">Número de Contacto</strong><br> <?php echo $row['num_contacto']; ?><br>
                
                <!-- Modificación para el enlace -->
                <button class="comprar"><a href="../VIEW/compraVendedor.php?id=<?php echo $row['id_publicacion']; ?>" class="comprar_estilo">Ver Propiedad</a></button>
            </div>
            <?php
        }
    }

    $conex->close();
    ?>      
</div>
<div class="subcontenedor3">
    <button class="next"> &gt; </button>
</div>

</div>
    <script>
        const ventanaItems = document.querySelectorAll('.ventana');
        const ventanasPorSeccion = 3;
        let currentIndex = 0;
        const totalVentanas = ventanaItems.length;

        function mostrarVentanas(index) {
            ventanaItems.forEach((ventana, idx) => {
                const inicioSeccion = Math.floor(index / ventanasPorSeccion) * ventanasPorSeccion;
                const finSeccion = inicioSeccion + ventanasPorSeccion - 1;

                if (idx >= inicioSeccion && idx <= finSeccion) {
                    ventana.style.display = 'block';
                } else {
                    ventana.style.display = 'none';
                }
            });
        }

        function nextSeccion() {
            currentIndex += ventanasPorSeccion;
            if (currentIndex >= totalVentanas) {
                currentIndex = 0;
            }
            mostrarVentanas(currentIndex);
        }

        function prevSeccion() {
            currentIndex -= ventanasPorSeccion;
            if (currentIndex < 0) {
                currentIndex = totalVentanas - ventanasPorSeccion;
            }
            mostrarVentanas(currentIndex);
        }

        document.querySelector('.next').addEventListener('click', nextSeccion);
        document.querySelector('.prev').addEventListener('click', prevSeccion);

        mostrarVentanas(currentIndex);
    </script>

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
    </body>
</html>
