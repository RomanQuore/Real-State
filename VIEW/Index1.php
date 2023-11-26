<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style_index.css">
    <script src="../JS/Principal.js"></script>
    <title> Pagina Principal </title>
    <div class="container">
    <p style="text-align: left;" class="hola">Real State <img src="http://imgfz.com/i/nzv3l4K.png" alt="Descripción de la imagen" style="width: 70px; float: left; margin-right: px;">
    <select id="scrollDownButton" onchange="redireccionar()">
        <option disabled selected value>Arriendo</option>
        <option value="casa">Casas</option>
        <option value="apartamento">Apartamentos</option>
        <option value="local">Locales</option>
    </select>
    <select id="scrollDownButton" onchange="redireccionar()">
        <option disabled selected value>Venta</option>
        <option value="casa">Casas</option>
        <option value="apartamento">Apartamentos</option>
        <option value="local">Locales</option>
    </select>
    <select id="scrollDownButton" onchange="redireccionar()">
        <option disabled selected value>Permutacion</option>
        <option value="casa">Casas</option>
        <option value="apartamento">Apartamentos</option>
        <option value="local">Locales</option>
    </select>
    <button type="submit "class="register"> <span><a href="../MODEL/registro1.php" class="register1">Registrarse</span></a></button>
    <button type="submit "class="login"> <span><a href="../MODEL/iniciosesion1.php" class="login1">Iniciar sesion</span></a></button>
    </p>
</div>
<script>
    function redireccionar() {
        var select = document.getElementById("scrollDownButton");
        var opcionSeleccionada = select.options[select.selectedIndex].value;

        if (opcionSeleccionada === "casa") {
            window.location.href = "../MODEL/loggeoIndex.php";
        } else if (opcionSeleccionada === "apartamento") {
            window.location.href = "../MODEL/loggeoIndex.php";
        } else if (opcionSeleccionada === "local") {
            window.location.href = "../MODEL/loggeoIndex.php";
        }
    }
</script>
</head>
<body>
<div class="contenedor">
    <div class="subcontenedor2">
        <div class="ventana ventana1">
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
            <button class="comprar"><a href="../MODEL/loggeoIndex.php" class="comprar_estilo">Ver Propiedad</a></button>
        </div>

        <div class="ventana ventana2">
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

            <button class="comprar"><a href="../MODEL/loggeoIndex.php" class="comprar_estilo">Ver Propiedad</a></button>
        </div>

        <div class="ventana ventana3">
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
                <button class="comprar"><a href="../MODEL/loggeoIndex.php" class="comprar_estilo">Ver Propiedad</a></button>
            </div>
                <button class="prev"> < </button>
                <button class="next"> > </button>
    </div>

<script>
const ventanaItems = document.querySelectorAll('.ventana, .ventana2, .ventana3');
let currentIndex = 0;
let autoSlideInterval;

function mostrarVentana(index) {
    ventanaItems.forEach((ventana, idx) => {
        if (idx === index) {
            ventana.style.display = 'block';
        } else {
            ventana.style.display = 'none';
        }
    });
}

function nextVentana() {
    if (currentIndex < ventanaItems.length - 1) {
        currentIndex++;
    } else {
        currentIndex = 0;
    }
    mostrarVentana(currentIndex);
}

function prevVentana() {
    if (currentIndex > 0) {
        currentIndex--;
    } else {
        currentIndex = ventanaItems.length - 1;
    }
    mostrarVentana(currentIndex);
}

document.querySelector('.next').addEventListener('click', nextVentana);
document.querySelector('.prev').addEventListener('click', prevVentana);

function stopAutoSlide() {
    clearInterval(autoSlideInterval);
}

mostrarVentana(currentIndex); // Muestra solo la primera ventana al cargar la página
startAutoSlide(); // Comienza el carrusel automático al cargar la página
</script>
<div class="subcontenedor1">
    <h2>Información de la Empresa</h2>
    <p>Nombre: Nombre de la Empresa</p>
    <p>Descripción: Breve descripción sobre la empresa...</p>
    <p>Dirección: Dirección física de la empresa</p>
    <p>Teléfono: Número de contacto</p>
    <p>Correo electrónico: Dirección de correo electrónico</p>
    <!-- Puedes agregar más información aquí -->
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