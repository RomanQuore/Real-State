<?php
include_once 'Conexion.php'; // Incluye el archivo que configura la conexión PDO.

/*$conexion = new PDO("mysql:host=localhost;dbname=crud", 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/

session_start();
if (!isset($_SESSION['rol']))
	{
		header('location: iniciosesion1.php');
		exit();
	}
else
	{
		if($_SESSION['rol'] !=1)
			{
				header('location: iniciosesion1.php');
				exit();
			}
	}
?>
<html><head></head>
<body>
<div align="center">
	<?php
/*
// Usamos la conexión PDO configurada en 'conexionPDO.php'
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=crud", 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Error en la conexión: ' . $e->getMessage());
        }

        $usuario = $_SESSION['nomusuario'];
        $fotosesion = $_SESSION['foto'];
        echo "<font face=  'impact' size='6'> Bienvenid@ <br>Administrador  <br>" . $usuario . "</font><br>";
*/

		$conexion=mysqli_connect('localhost','root','','real_state') or die ('problemas en la conexión');
		$usuario = $_SESSION['Usuario'];
		$fotosesion = $_SESSION['foto'];	//echo $fotosesion;
			echo "<font face= impact size= 6> Bienvenid@ <br>Administrador  <br>".$usuario."</font><br>";
	?>
</div >
<table border="1" align="center">
	<tr>
		<td>	
		<div align="center">
			<form method="POST" action="#">
				NOMBRE <input type="text"     name="Usuario" required="" placeholder="Ingrese Nombre" pattern="[a-z]{4,8}"><br>
				CLAVE  <input type="password" name="contrasena"   required="" placeholder="Ingrese Contraseña"><br>
				IDROL  <input type="number"   name="idrol"   required="" placeholder="Ingrese Rol" min="1" max="4"><br>
				EMAIL  <input type="email"    name="correoElectronico"   required="" placeholder="Ingrese Email"><br>
				ENVIAR <input type="submit"   name="insertar" value="Insertar Datos">
			</form>
		</div>
		<?php
		//include_once 'conexionPDO.php';
		//session_start();
		if(isset($_POST['insertar']))
			{
			$usuario = $_POST['Usuario'];
			$contrasenau   = $_POST['contrasena'];
			$idrol   = $_POST['idrol'];
			$correoElectronico = $_POST['correoElectronico'];
			$insertar = "INSERT INTO usuarios(Usuario,contrasena,idrol,correoElectronico) VALUES ('$usuario','$contrasenau','$idrol','$correoElectronico')";
			$ejecutar=mysqli_query($conexion,$insertar);
			if ($ejecutar)
				{
					//header("location: administrador.php");
					 echo "<script> window.open('administrador.php')  </script> ";
				}
			}
				unset($_POST['insertar']);//La función unset() destruye las variables especificadas.
				//no es necesario usar unset($_POST['insertar']); o unset($_POST['editar']);. Los datos POST se enviarán solo cuando el formulario se envía, por lo que no necesitas eliminarlos manualmente.
		?>
		</td>
		<td>
			<?php
			echo "<div align='center'><img src='imagenes/$fotosesion ?>' width='200' height='160' ></div>";	
			?>
		</td>
	</tr>
</table>
<table border="1" align="center">
	<tr>	
			<th>ID</th>
			<th>NOMBRE</th>
			<th>PASSWORD</th>
			<th>IDROL</th>
			<th>EMAIL</th>
	 		<th>FOTO</th>
			<th>EDITAR</th>
			<th>BORRAR</th>
	</tr>
	<?php
$observar = "SELECT * FROM usuarios";
$ejecutar=mysqli_query($conexion,$observar);
	$contador = 0;
	while ($filas=mysqli_fetch_array($ejecutar)) 
	{
		$id = $filas['id'];
		$usuario = $filas['Usuario'];
		$contrasenau = $filas['contrasena'];
		$idrol = $filas['idrol'];
		$correoElectronico = $filas['correoElectronico'];
		$fotografia=$filas['foto'];
		$contador++;
	?>
	<tr align="center">	
			<td><?php echo $id ?></td>
			<td><?php echo $usuario ?></td>
			<td><?php echo $contrasenau ?></td>
			<td><?php echo $idrol ?></td>
			<td><?php echo $correoElectronico ?></td>
			<td><img src="imagenes/<?php echo $fotografia ?>" width="50" height="40" ></td>
			<td><a href="administrador.php? editar= <?php echo $id; ?>">Editar</a></td>
			<td><button style="background-color: orange"><a href="administrador.php? borrar= <?php echo $id; ?>">Borrar</a></button></td>
	</tr>
	<?php
	}
	?>
</table>
<?php
		if (isset($_GET['editar'])) {
			$editar_id = $_GET['editar'];
			$consulta = "SELECT * FROM usuarios WHERE id = '$editar_id'";
			$ejecutar = mysqli_query($conexion, $consulta);
			$filas = mysqli_fetch_array($ejecutar);
			$id = $filas['id'];
			$usuario = $filas['Usuario'];
			$contrasenau = $filas['contrasena'];
			$idrol = $filas['idrol'];
			$correoElectronico = $filas['correoElectronico'];
			$fotoeditor = $filas['foto']; // Inicializa la variable $fotoeditor con el valor del campo 'foto' de la base de datos
?>
<table border="6" align="center">
	<tr>
		<td>
<div align="center">
	<form method="POST" action="#" enctype="multipart/form-data">
		NOMBRE <input type="text"     name="Usuario" value="<?php echo $usuario  ?>"> <br>
		CLAVE  <input type="password" name="contrasena"   value="<?php echo $contrasenau ?>"><br>
		IDROL  <input type="number"   name="idrol"   value="<?php echo $idrol    ?>"><br>
		EMAIL  <input type="email"    name="correoElectronico"   value="<?php echo $correoElectronico    ?>"><br>
		FOTO   <input type="text"     name="foto"    value="<?php echo $fotoeditor ?>"><br>
			   <input type="file" 	  name="imagenasubir" ><br>
			   <input type="submit"   name="actualizame" value="Actualizar Datos" style="cursor: pointer;"><br>
	</form>
</div>
		</td>
		<td>
			<?php
			echo "<div align='center'><img src='imagenes/$fotoeditor ?>' width='200' height='160' ></div>";	
			?>
		</td>
	</tr>
</table>
<?php
unset($_POST['editar']);//no es necesario usar unset($_POST['insertar']); o unset($_POST['editar']);. Los datos POST se enviarán solo cuando el formulario se envía, por lo que no necesitas eliminarlos manualmente.
  }
?>
<?php
if(isset($_POST['actualizame']))
	{
	$actualizausuario = $_POST['Usuario'];
	$actualizaclave   = $_POST['contrasena'];
	$actualizaidrol   = $_POST['idrol'];
	$actualizaemail   = $_POST['correoElectronico'];
	$actualizafoto    = $_POST['foto'];

	$ruta = "imagenes/".basename($_FILES['imagenasubir']['name']);
		if (move_uploaded_file($_FILES['imagenasubir']['tmp_name'],$ruta)) 
			{
			echo "<div align='center'><font face='impact' size='3'><b> 
			El archivo ".basename($_FILES['imagenasubir']['name'])." ha sido subido satisfactoriamente</b></font></div>";
			}
		else
			{
				echo "el archivo de imagen no se cambio";
			}

	$update = "UPDATE usuarios SET Usuario = '$actualizausuario',contrasena = ('$actualizaclave'),idrol = '$actualizaidrol',correoElectronico = '$actualizaemail',foto ='$actualizafoto'  WHERE id = '$editar_id'";
	$ejecutar=mysqli_query($conexion,$update);
	if ($ejecutar)
		{
			//header("Location: administrador.php");
			echo "<script>
					window.open('administrador.php')
				 </script> ";
		}
	else
		{
			echo "<script>
					alert ('no se pudo EDITAR')
				</script> ";
		}
	}
	unset($_POST['actualizame']);
?>
<?php
if(isset($_GET['borrar']))
	{
	$borrar_id = $_GET['borrar'];
	$borrar = "DELETE FROM usuarios WHERE id = '$borrar_id'";
	$ejecutar=mysqli_query($conexion,$borrar);
	if($ejecutar)
		{
			//header("Location: administrador.php");
			echo "<script>
						window.open('administrador.php')
					 </script> ";
		}
	else
		{
			echo "<script>
						alert ('no se logró eliminar')
					 </script> ";
		}
    }
    	unset($_POST['borrar']);
?>
<div align="center">
<form action="iniciosesion1.php" method="POST">
  <button style="height:40px; width: 150px">
    <input type="submit" name="cerrar_sesion" value="CERRAR SESION">
  </button>
</form>

</div>
</body>
</html>