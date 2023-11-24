<?php
$host = "localhost";
$user = "root";
$pw = "";
$db = "real_state";
$conn = new mysqli($host, $user, $pw, $db);

// Verifica la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define $pdo como una nueva instancia de PDO usando la conexión mysqli
$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pw);

?>
<html>
<form action="#" method="post">
    Buscar usuario:<input type="number" name="id"><br>
    
    <?php
    if (isset($_GET['editar'])) {
        $editar_id = $_GET['editar'];
        
        $consulta = "SELECT * FROM registro WHERE id = :editar_id";
        $stmt = $pdo->prepare($consulta);
        $stmt->bindParam(':editar_id', $editar_id, PDO::PARAM_INT);
        $stmt->execute();
        $filas = $stmt->fetch(PDO::FETCH_ASSOC);

        $id = $filas['id'];
        $usuario = $filas['Usuario'];
        $nombres = $filas['nombres'];
        $apellidos = $filas['Apellidos'];
        $contrasena = $filas['Contrasena'];
        $fecha = $filas['fechaNacimiento'];
        $tipoD = $filas['tipoDocumento'];
        $numeroD = $filas['numeroDocumento'];
        $direccion = $filas['direccion'];
        $numeroT = $filas['numeroTelefono'];
        $correoE = $filas['correoElectronico'];
        $rol = $filas['rol'];
        $activo = $filas['activo'];
    }
    else
    {
    $consulta_primer_registro = "SELECT * FROM registro ORDER BY id LIMIT 1";
    $stmt = $pdo->query($consulta_primer_registro);
    $filas = $stmt->fetch(PDO::FETCH_ASSOC);
echo "hola";

    $id2 = $filas['id'];
    $usuario2 = $filas['Usuario'];
    $nombres2 = $filas['nombres'];
    $apellidos2 = $filas['apellidos'];
    $contrasena2 = $filas['Contrasena'];
    $fecha2 = $filas['fechaNacimiento'];
    $tipoD2 = $filas['tipoDocumento'];
    $numeroD2 = $filas['numeroDocumento'];
    $direccion2 = $filas['direccion'];
    $numeroT2 = $filas['numeroTelefono'];
    $correoE2 = $filas['correoElectronico'];
    $rol2 = $filas['Rol'];
    $activo2 = $filas['activo'];
    }
    ?>
    
    <label for="usuario">nombre de usuario:</label>
    <input type="text" id="usuario" name="Usuario" value="<?php echo "$usuario"; ?>"><br>

    <label for="contrasena">contraseña:</label>
    <input type="password" id="contrasena" name="contrasena" value="<?php echo $contrasena; ?>"><br>


    <label for="nombres">nombres:</label>
    <input type="text" id="nombres" name="nombres" value="<?php echo $nombres; ?>"><br>

    <label for="apellidos">apellidos:</label>
    <input type="text" id="apellidos" name="apellidos" value="<?php echo $apellidos; ?>"><br>

    <label for="fechaNacimiento">fecha de nacimiento:</label>
    <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $fecha; ?>"><br>

    <label for="tipoDocumento">tipo de documento:</label>
    <input type="number" id="tipoDocumento" name="tipoDocumento" value="<?php echo $tipoD; ?>"><br>

    <label for="numeroDocumento">numero de documento:</label>
    <input type="text" id="numeroDocumento" name="numeroDocumento" value="<?php echo $numeroD; ?>"><br>

    <label for="direccion">Direccion:</label>
    <input type="text" id="direccion" name="direccion" value="<?php echo $direccion; ?>"><br>

    <label for="numeroTelefono">numero de telefono:</label>
    <input type="text" id="numeroTelefono" name="numeroTelefono" value="<?php echo $numeroT; ?>"><br>

    <label for="correoElectronico">Correo Electronico:</label>
    <input type="text" id="correoElectronico" name="correoElectronico" value="<?php echo $correoE; ?>"><br>

    <label for="activo">activo:</label>
    <input type="number" id="activo" name="activo" value="<?php echo $activo; ?>"><br>

    <label for="rol">rol:</label>
    <input type="text" id="rol" name="rol" value="<?php echo $rol; ?>"><br>

    <button type="submit" name="actualizame">Guardar Cambios</button><br><br>
    <input type="submit" name="editar" value="buscar"><br>
</form>
<?php
        if (isset($_POST['actualizame'])) 
        {
            $actualizaid = $_POST["id"];
            $actualizausuario = $_POST["Usuario"];
            $actualizacontrasenau = $_POST["contrasena"];
            $actualizanombres = $_POST["nombres"];
            $actualizaapellidos = $_POST["apellidos"];
            $actualizafechaNacimiento = $_POST["fechaNacimiento"];
            $actualizatipoDocumento = $_POST["tipoDocumento"];
            $actualizanumeroDocumento = $_POST["numeroDocumento"];
            $actualizadireccion = $_POST["direccion"];
            $actualizanumeroTelefono = $_POST["numeroTelefono"];
            $actualizacorreoElectronico = $_POST["correoElectronico"];
            $actualizarol = $_POST["rol"];
            $actualizaactivo = $_POST["activo"];

            $update = "UPDATE registro SET id = :id, Usuario = :Usuario, Contrasena = :contrasena, 
                    nombres = :telefono, apellidos = :id_tipdoc, fechaNacimiento = :numdoc, tipoDocumento = :fecha, 
                    numeroDocumento = :rol, direccion = :estado, numeroTelefono = :numeroTelefono, 
                    correoElectronico = :correoElectronico, rol = :rol, activo = :activo WHERE id = :id";
            $stmt = $pdo->prepare($update);
            $stmt->bindParam(':Usuario', $actualizausuario);
            $stmt->bindParam(':contrasena', $actualizacontrasenau);
            $stmt->bindParam(':nombres', $actualizanombres);
            $stmt->bindParam(':apellidos', $actualizaapellidos);
            $stmt->bindParam(':fechaNacimiento', $actualizafechaNacimiento);
            $stmt->bindParam(':tipoDocumento', $actualizatipoDocumento);
            $stmt->bindParam(':numeroDocumento', $actualizanumeroDocumento);
            $stmt->bindParam(':direccion', $actualizadireccion);
            $stmt->bindParam(':numeroTelefono', $actualizanumeroTelefono);
            $stmt->bindParam(':correoElectronico', $actualizacorreoElectronico);
            $stmt->bindParam(':rol', $actualizarol);
            $stmt->bindParam(':activo', $actualizaactivo);
            $stmt->bindParam(':editar_id', $editar_id, PDO::PARAM_INT);

            if ($stmt->execute()) 
            {
                echo "<div>Actualización exitosa.</div>";
                echo '<script>setTimeout(function(){ window.location.href = "formularioSuspencion.php"; }, 1500);</script>';
                exit;
            } 
            else 
            {
                echo "No se pudo actualizar el registro.";
            }
        }
    ?>
</html>