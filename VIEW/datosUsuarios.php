
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Datos Usuarios</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/datosUsuarios.css">
    <title> Pagina Principal </title>
    <div class="header"><img src="http://imgfz.com/i/nzv3l4K.png" style="margin-left: 1em; width: 100px; height: 100px; float: left;"><div class="real-state">Real State</div>
    <button type="submit" class="volver"><span><a href="../MODEL/cerrarsesion.php" class="volver1">volver</a></span></button>
</div>
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
    echo "<table border='0'>";
    echo "<tr><th>ID</th><th>Usuario</th><th>Nombres</th><th>Apellidos</th><th>FechaNac</th><th>TipDoc</th><th>NúmDoc</th><th>Dirección</th><th>NúmTel</th><th>Correo</th><th>Rol</th><th>Activo</th><th>Acciones</th></tr>";

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
        echo "<div class='botones'>";
        echo "<button type='submit' name='eliminar_id' class='login' value='{$fila["id"]}'>Eliminar</button>";
        echo "<button type='submit' name='actualizar_id' class='login' value='{$fila["id"]}'>Actualizar</button>";
        echo "</div>";
        echo "</td>";
        echo "</tr>";
    }

    mysqli_close($conex);
    ?>
</body>
</html>
