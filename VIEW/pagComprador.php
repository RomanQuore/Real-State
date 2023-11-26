<?php
include '../CONTROLLER/conexion.php';
session_start();
$_SESSION['Usuario']
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style_principal.css">
    <script src="../JS/Principal.js"></script>
    <title> Pagina Principal </title>
    <div class="container">
    <p style="text-align: left;" class="hola">Real State 
        <img src="http://imgfz.com/i/nzv3l4K.png" alt="Descripción de la imagen" style="width: 70px; float: left; margin-right: px;">

<select id="arriendo" onchange="redireccionar(this)">
    <option disabled selected value>Arriendo</option>
    <option value="casa">Casas</option>
    <option value="apartamento">Apartamentos</option>
    <option value="local">Locales</option>
</select>

<select id="venta" onchange="redireccionar(this)">
    <option disabled selected value>Venta</option>
    <option value="casa">Casas</option>
    <option value="apartamento">Apartamentos</option>
    <option value="local">Locales</option>
</select>

<select id="permutacion" onchange="redireccionar(this)">
    <option disabled selected value>Permutacion</option>
    <option value="casa">Casas</option>
    <option value="apartamento">Apartamentos</option>
    <option value="local">Locales</option>
</select>

<select id="accionesSelect" onchange="redireccionar()">
    <option disabled selected value>Opciones ⚙︎</option>
    <option value="editar_perfil">Perfil</option>
    <option value="cerrar_sesion">Cerrar sesión</option>
</select>

<form id="cerrarSesionForm" action="../MODEL/cerrarsesion.php" method="POST">
</form>
    </p>
</div>

<script>
function redireccionar() {
    var select = document.getElementById("arriendo");
  var opcionSeleccionada = select.options[select.selectedIndex].value;

  console.log("Opción seleccionada:", opcionSeleccionada);

  if (opcionSeleccionada === "casa") {
    console.log("Redirigiendo a la página de compra de casas...");
    window.location.href = "../VIEW/compraComprador.php";
  } else if (opcionSeleccionada === "apartamento") {
    console.log("Redirigiendo a la página de compra de apartamentos...");
    window.location.href = "../VIEW/compraApartamento.php";
  } else if (opcionSeleccionada === "local") {
    console.log("Redirigiendo a la página de compra de locales...");
    window.location.href = "../VIEW/compraLocal.php";
  }
}


    function redireccionar() {
    var select = document.getElementById("accionesSelect");
    var opcionSeleccionada = select.value;

    if (opcionSeleccionada === "cerrar_sesion") {

        var formCerrarSesion = document.getElementById("cerrarSesionForm");
        formCerrarSesion.style.display = "block";
        formCerrarSesion.submit();
    } else if (opcionSeleccionada === "editar_perfil") {
        window.location.href = "Perfil_Vendedor.php";
    }
}
</script>
</head>
<body>
<div class="contenedor">
    <div class="subcontenedor2">
        <div class="ventana">
            <img src="https://i.postimg.cc/MHQ87Lny/438430723.jpg" alt="Casa 1" style="width: 250px; float: center;">
            <div class="titulo">Apartamento en venta. Fontibon. Bogotá</div>
            <div class="subtitulo">Precio de venta:</div>
            <h2>$120.000.000 COP</h2>
            <div class="info-contenedor">
                <div class="info-fila">
                    <div class="info"><h2>Area(m2)</h2></div>
                    <div class="info1">172m2</div>
                </div>
                <div class="info-fila">
                    <div class="info"><h2>Hab</h2></div>
                    <div class="info1">2</div>
                </div>
                <div class="info-fila">
                    <div class="info"><h2>Baños</h2></div>
                    <div class="info1">1</div>
                </div>
            </div>
            <button class="comprar"><a href="../VIEW/compraComprador.html" class="comprar_estilo">Ver Propiedad</a></button>
        </div>

        <div class="ventana2">
            <img src="https://i.postimg.cc/tRWqV1W8/casa-en-collywood-disenada-por-olson-kundig-en-los-angeles-4-eac9aa6d-1704x958.jpg" alt="Casa 2" style="width: 250px; float: center;">
            <div class="titulo">Casa en arriendo. Chapinero. Bogotá</div>
            <div class="subtitulo">Precio de arriendo:</div>
            <h2>$1.400.000 COP</h2>
            <div class="info-contenedor">
                <div class="info-fila">
                    <div class="info"><h2>Area(m2)</h2></div>
                    <div class="info1">172m2</div>
                </div>
                <div class="info-fila">
                    <div class="info"><h2>Hab</h2></div>
                    <div class="info1">2</div>
                </div>
                <div class="info-fila">
                    <div class="info"><h2>Baños</h2></div>
                    <div class="info1">1</div>
                </div>
            </div>

            <button class="comprar"><a href="../VIEW/compraComprador.html" class="comprar_estilo">Ver Propiedad</a></button>
        </div>

        <div class="ventana3">
            <img src="https://i.postimg.cc/wMQY4mkv/fer7861a-7ef04580-1981x1486.jpg" alt="Casa 3" style="width: 250px; float: center;">
            <div class="titulo">Casa en venta. Conjunto en Bosa</div>
            <div class="subtitulo">Precio de venta:</div>
            <h2>$240.000.000 COP</h2>
            <div class="info-contenedor">
                <div class="info-fila">
                    <div class="info"><h2>Area(m2)</h2></div>
                    <div class="info1">172m2</div>
                </div>
                <div class="info-fila">
                    <div class="info"><h2>Hab</h2></div>
                    <div class="info1">2</div>
                </div>
                <div class="info-fila">
                    <div class="info"><h2>Baños</h2></div>
                    <div class="info1">1</div>
                </div>
            </div>
            <button class="comprar"><a href="../VIEW/compraComprador.html" class="comprar_estilo">Ver Propiedad</a></button>
        </div>
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
</html>
