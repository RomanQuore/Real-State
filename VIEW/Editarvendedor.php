<?php
    include("../CONTROLLER/conexion.php");

    if(isset($_POST['enviar'])){
        // Aquí entra cuando se presiona el botón de enviar
        // Agrega aquí el código para procesar el formulario cuando se envía
        $id=$_POST['id'];
        $usuario=$_POST['Usuario'];
        $contrasena = $_POST['Contrasena'];
        $numeroTel = $_POST['numeroTelefono'];
        $correoElectronico = $_POST['correoElectronico'];

        $sql ="UPDATE registro SET Usuario='".$usuario."',Contrasena='".$contrasena."',numeroTelefono='".$numeroTel."',correoElectronico='".$correoElectronico."' WHERE id='".$id."'";
        $resultado = mysqli_query($conex,$sql);

        if($resultado){
            echo "<script language='JavaScript'>
                    alert('Los datos se actualizaron correctamente');
                    location.assign('../VIEW/Editarvendedor.php); 
                    </script>";
        }else{
            echo "<script language='JavaScript'>
                    alert('Los datos NO se actualizaron correctamente');
                    location.assign('../VIEW/Editarvendedor.php);
                    </script>";
        }
    } else {
        // Aquí entra si no se ha presionado el botón de enviar 
        $usuario = $_GET['Usuario'] ?? '';
        $contrasena = $_GET['Contrasena'] ?? '';
        $numeroTel = $_GET['numeroTelefono'] ?? '';
        $correoElectronico = $_GET['correoElectronico'] ?? '';
        
        if (!empty($usuario) && !empty($contrasena) && !empty($numeroTel) && !empty($correoElectronico)) {
            $sql = "SELECT Usuario, Contrasena, numeroTelefono, correoElectronico FROM registro WHERE Usuario = ? AND Contrasena = ? AND numeroTelefono = ? AND correoElectronico = ?";
            $stmt = mysqli_prepare($conex, $sql);
            mysqli_stmt_bind_param($stmt, "ssss", $usuario, $contrasena, $numeroTel, $correoElectronico);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);

            $fila = mysqli_fetch_assoc($resultado);
            if ($fila) {
                $usuario = $fila['Usuario'];
                $contrasena = $fila['Contrasena'];
                $numeroTel = $fila['numeroTelefono'];
                $correoElectronico = $fila['correoElectronico'];
            }
        }
        
        mysqli_close($conex);
    }
?>

<html>
<head>
    <title>Editar</title>
</head>
<body>
    <h1>Editar datos </h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label>Usuario</label><br>
        <input type="text" id="Usuario" name="Usuario" class="text" placeholder="Usuario" value="<?php echo $usuario; ?>" required><br><br>

        <label>Contraseña</label><br>
        <input type="password" id="contrasena" name="Contrasena" class="text" placeholder="Contraseña" value="<?php echo $contrasena; ?>" required><br><br>
        
        <label> Teléfono</label><br>
        <input type="tel" id="numeroTelefono" name="numeroTelefono" class="tel" placeholder="Teléfono" value="<?php echo $numeroTel; ?>" required><br><br>

        <label> Email</label><br>
        <input type="email" id="correoElectronico" name="correoElectronico" class="email" placeholder="Email" value="<?php echo $correoElectronico; ?>" required><br><br>

        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" name="enviar" value="ACTUALIZAR">
        <a href="../VIEW/pagVendedor.php">Regresar</a>
    </form>
</body>
</html>
