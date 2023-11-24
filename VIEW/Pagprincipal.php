<?php
require_once '../CONTROLLER/busqueda.php'; // Incluye el archivo de conexión a la base de datos

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los valores del formulario
    $nombre = $_POST['buscar'];
    $buscarpublicacion = $_POST['buscapublicacion'];
    $preciodesde = $_POST['preciodesde'];
    $preciohasta = $_POST['preciohasta'];
    $fecha = $_POST['fecha'];

    // Insertar los valores en la base de datos
    $resultado = insertarBusqueda($nombre, $buscarpublicacion, $preciodesde, $preciohasta, $fecha);

    if ($resultado) {
        // Éxito al insertar los datos
        header('Location: ../VIEW/Pagprincipal.php');
        exit();
    } else {
        // Error al insertar los datos, manejarlo adecuadamente
        echo "Error al realizar la búsqueda";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
    <button type="submit "class="exit"> <span><a href="../MODEL/iniciosesion1.php" class="cerrar">Cerrar sesion</span></a></button></p>

</div>
<script>
    function redireccionar() {
        var select = document.getElementById("scrollDownButton");
        var opcionSeleccionada = select.options[select.selectedIndex].value;

        if (opcionSeleccionada === "casa") {
            window.location.href = "../MODEL/iniciosesion1.php";
        } else if (opcionSeleccionada === "apartamento") {
            window.location.href = "../VIEW/compras.php";
        } else if (opcionSeleccionada === "local") {
            window.location.href = "pagina_locales.html";
        }
    }
</script>
</head>
<body>
<form id="" method="POST" action="../VIEW/Pagprincipal.php" class="contenedor">
<div class="subcontenedor">
<div class="subcontenedor1">
<label class="form-label">Nombre de vendedor</label>
<input type="text" class="buscaespecifico" id="buscar" name="buscar" value="<?php echo isset($_POST["buscar"]) ? $_POST["buscar"] : ''; ?>">


<div class="col-11">
<table class="table">
<thead>
<tr class="filters">
Buscar publicaciones
<select id="assigned-tutor-filter" id="buscapublicacion" name="buscapublicacion" class="form-control mt-2">
<?php if ($_POST["buscapublicacion"] != ''){?>
<option value="<?php echo $_POST["buscapublicacion"]; ?>"><?php echo $_POST["buscapublicacion"]; ?></option>
<?php } ?>
<option value="Todos">Todos</option>
<option value="Compras" >Compras</option>
<option value="Ventas">Ventas</option>
<option value="Arriendos">Arriendos</option>
</select>
Precio desde:
<input type="text" id="preciodesde" name="preciodesde" class="form-control mt-2" value="<?php echo isset($_POST["preciodesde"]) ? $_POST["preciodesde"] : ''; ?>">
Precio hasta:
<input type="text" id="preciohasta" name="preciohasta" class="form-control mt-2" value="<?php echo isset($_POST["preciohasta"]) ? $_POST["preciohasta"] : ''; ?>">
<label for="fecha">Fecha:</label>
<input type="date" id="fecha" name="fecha" class="form-control mt-2">


            <button class="dirigir"><a href="" class="dirigir1">Aceptar</a></button>
            </div>
    </div>
    <?php
$db = new mysqli('localhost', 'root', '', 'real_state');

if ($db->connect_error) {
  die('Connection failed: ' . $db->connect_error);
}

$sql = 'SELECT * FROM busqueda';

if(isset($_POST["buscar"]) && $_POST["buscar"] != '') {
  $sql .= " WHERE nombre = '{$_POST["buscar"]}'"; 
}

if(isset($_POST["buscarpublicacion"]) && $_POST["buscarpublicacion"] != 'todos') {
  if(strpos($sql, 'WHERE') === false) {
    $sql .= " WHERE "; 
  } else {
    $sql .= " AND ";
  }
  
  $sql .= "buscarpublicacion = '{$_POST["buscarpublicacion"]}'";
}

// Añadir otros filtros aquí con la misma lógica...

$result = $db->query($sql);

if(!$result) {
  die('Query failed: ' . $db->error);
}
?>
<?php
$result->free();
$db->close();
?>

<?php
    // Obtener los datos de búsqueda y mostrarlos en una tabla
    $resultados = buscarDatos($_POST);

    if ($resultados && $resultados->num_rows > 0) {
        ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr style="background-color: #00695c; color:#FFFFFF;">
                        <th style="text-align: center;"> Nombre </th>
                        <th style="text-align: center;"> Precio desde </th>
                        <th style="text-align: center;"> Precio hasta </th>
                        <th style="text-align: center;"> Fecha </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($row = $resultados->fetch_assoc()) {
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $row['nombre']; ?></td>
                        <td style="text-align: center;"><?php echo $row['preciodesde']; ?></td> 
                        <td style="text-align: center;"><?php echo $row['preciohasta']; ?></td>
                        <td style="text-align: center;"><?php echo $row['fecha']; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        $resultados->free(); // Liberar resultados
    } else {
        echo "No se encontraron resultados";
    }
    ?>
    </div>
    </form>
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
            <button class="comprar"><a href="../VIEW/compras.php" class="comprar_estilo">Ver Propiedad</a></button>
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

            <button class="comprar"><a href="../VIEW/compras.php" class="comprar_estilo">Ver Propiedad</a></button>
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
            <button class="comprar"><a href="../VIEW/compras.php" class="comprar_estilo">Ver Propiedad</a></button>
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
