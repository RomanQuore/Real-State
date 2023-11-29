<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Datos Usuarios</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <script src="../JS/Principal.js"></script>
    <title> Pagina Principal </title>
    <div class="header"><img src="http://imgfz.com/i/nzv3l4K.png" style="margin-left: 1em; width: 100px; height: 100px; float: left;"><div class="real-state">Real State</div>
    <div class="container-select">
        <div class="select-box">
            <select id="scrollDownButton1" onchange="redireccionar()">
                <option disabled selected value>Arriendo</option>
                <option value="casa">Casas</option>
                <option value="apartamento">Apartamentos</option>
                <option value="local">Locales</option>
            </select>
            <select id="scrollDownButton2" onchange="redireccionar()">
                <option disabled selected value>Venta</option>
                <option value="casa">Casas</option>
                <option value="apartamento">Apartamentos</option>
                <option value="local">Locales</option>
            </select>
            <select id="scrollDownButton3" onchange="redireccionar()">
                <option disabled selected value>Permutacion</option>
                <option value="casa">Casas</option>
                <option value="apartamento">Apartamentos</option>
                <option value="local">Locales</option>
            </select>
        </div>
            <div class="container-select2">
        <select id="accionesSelect" onchange="redireccionar()">
            <option disabled selected value>Opciones ⚙︎</option>
            <option value="editar_perfil">Perfil</option>
            <option value="cerrar_sesion">Cerrar sesión</option>
        </select>
        </div>
        </div>
        <form id="cerrarSesionForm" action="../MODEL/cerrarsesion.php" method="POST"></form>
    </div>

</div>

<script>
function redireccionar() {
    var select = document.getElementById("arriendo");
  var opcionSeleccionada = select.options[select.selectedIndex].value;

  console.log("Opción seleccionada:", opcionSeleccionada);

  if (opcionSeleccionada === "casa") {
    console.log("Redirigiendo a la página de compra de casas...");
    window.location.href = "compraComprador.php";
  } else if (opcionSeleccionada === "apartamento") {
    console.log("Redirigiendo a la página de compra de apartamentos...");
    window.location.href = "compraComprador.php";
  } else if (opcionSeleccionada === "local") {
    console.log("Redirigiendo a la página de compra de locales...");
    window.location.href = "compraComprador.php";
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
<button type="submit" class="volver"><span><a href="../VIEW/PagAdmin.php" class="volver1">volver</a></span></button>
</head>
<body>
    <?php
    // Conexión a la base de datos
    $conex = mysqli_connect("localhost", "root", "", "real_state");

    // Verificar la conexión
    if (!$conex) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Procesar el formulario cuando se envíe
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar si se ha enviado un ID para eliminar
        if (isset($_POST["eliminar_id"])) {
            $id_a_eliminar = $_POST["eliminar_id"];

            // Realizar la consulta de eliminación
            $sql_eliminar = "DELETE FROM registro WHERE id = $id_a_eliminar";
            $resultado_eliminar = mysqli_query($conex, $sql_eliminar);

            // Verificar si la eliminación fue exitosa
            if ($resultado_eliminar) {
                echo "Registro eliminado correctamente.";
            } else {
                echo "Error al eliminar el registro: " . mysqli_error($conex);
            }
        }

        // Verificar si se ha enviado un ID y datos para actualizar
        elseif (isset($_POST["actualizar_id"])) {
            $id_a_actualizar = $_POST["actualizar_id"];

            // Actualizar cada campo modificado
            $campos_actualizados = array();
            foreach ($_POST as $clave => $valor) {
                // Verificar si el nombre del campo contiene el ID y no es el ID mismo
                if (strpos($clave, $id_a_actualizar) !== false && $clave !== "actualizar_id") {
                    // Obtener el nombre del campo real
                    $nombre_campo = str_replace("_$id_a_actualizar", "", $clave);

                    // Agregar el campo actualizado al array
                    $campos_actualizados[$nombre_campo] = $valor;
                }
            }

            // Construir la consulta de actualización
            $sql_actualizar = "UPDATE registro SET ";
            foreach ($campos_actualizados as $campo => $valor) {
                $sql_actualizar .= "$campo = '$valor', ";
            }
            // Eliminar la coma adicional al final
            $sql_actualizar = rtrim($sql_actualizar, ", ");
            $sql_actualizar .= " WHERE id = $id_a_actualizar";

            // Ejecutar la consulta de actualización
            $resultado_actualizar = mysqli_query($conex, $sql_actualizar);

            // Verificar si la actualización fue exitosa
            if ($resultado_actualizar) {
                echo "Registro actualizado correctamente.";
            } else {
                echo "Error al actualizar el registro: " . mysqli_error($conex);
            }
        }

        // Verificar si se está creando un nuevo registro
        elseif (isset($_POST["crear_nuevo"])) {
            // Aquí deberías manejar la lógica de creación del nuevo registro
            // Puedes obtener los datos del formulario y ejecutar una consulta SQL para insertar el nuevo registro
            echo "Crear un nuevo registro";
        }
    }

    // Consulta para obtener datos
    $sql = "SELECT id, Usuario, Nombres, Apellidos, FechaNacimiento, TipoDocumento, NumeroDocumento, Direccion, NumeroTelefono, CorreoElectronico, Rol, Activo FROM registro";
    $resultado = mysqli_query($conex, $sql);

    // Verificar si la consulta fue exitosa
    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conex));
    }

    // Mostrar los resultados en una tabla HTML con formularios para editar y crear
    echo "<form method='post'>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Usuario</th><th>Nombres</th><th>Apellidos</th><th>Fecha de Nacimiento</th><th>Tipo de Documento</th><th>Número de Documento</th><th>Dirección</th><th>Número de Teléfono</th><th>Correo Electrónico</th><th>Rol</th><th>Activo</th><th>Acciones</th></tr>";

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        foreach ($fila as $clave => $valor) {
            // Agregar formularios para editar y botones de "Eliminar"
            echo "<td>";
            if ($clave !== "id") {
                echo "<input type='text' name='{$clave}_{$fila["id"]}' value='$valor'>";
            }
            echo "</td>";
        }
        echo "<td>";
        echo "<button type='submit' name='eliminar_id' value='{$fila["id"]}'>Eliminar</button>";
        echo "<button type='submit' name='actualizar_id' value='{$fila["id"]}'>Actualizar</button>";
        echo "</td>";
        echo "</tr>";
    }

    

    // Cerrar la conexión
    mysqli_close($conex);
    ?>
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
