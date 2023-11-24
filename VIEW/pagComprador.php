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
    <div class="subcontenedor1">
        <div class="filtros">
            <h2 class="label1"><br>Filtrado por:</h2>
            <div class="busqueda">
            <label class="label1">Buscar:</label>
            <br>
                <input class="search" name="text" placeholder="Busqueda..." type="search" >
            </div>
            <hr class="hr"/>
            <div class="precio">
            <label class="label1">Filtro de busqueda:</label>
            <br>
                <input type="text" id="precio_desde" class="busqueda1" placeholder="Precio desde (COP)"/>
            </div>
            <hr class="hr"/>
            <div class="habitaciones">
                <select id="habitaciones" class="busqueda2">
                <option disabled selected value>Habitaciones</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5+">5+</option>
                </select>
                </div>
            <div class="banos">
                <select id="banos" class="busqueda3">
                    <option disabled selected value>Baños</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5+">5+</option>
                </select>
            </div>
            <div class="m2">
                <select id="m2" class="busqueda3">
                    <option disabled selected value>m2</option>
                    <option value="1">5m2</option>
                    <option value="2">50m2</option>
                    <option value="3">100m2</option>
                    <option value="4">150m2</option>
                    <option value="5+">200m2+</option>
                </select>
            </div>
            </div>
    </div>

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
            <button class="comprar"><a href="../MODEL/loggeoIndex.php" class="comprar_estilo">Ver Propiedad</a></button>
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

            <button class="comprar"><a href="../MODEL/loggeoIndex.php" class="comprar_estilo">Ver Propiedad</a></button>
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
            <button class="comprar"><a href="../MODEL/loggeoIndex.php" class="comprar_estilo">Ver Propiedad</a></button>
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