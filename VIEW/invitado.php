<?php
include_once 'Conexion.php';
session_start();
if(!isset($_SESSION['rol']))
	{
		header('location: iniciosesion1.php');
	}
else
	{
		if($_SESSION['rol'] !=4)
			{
				header('location: iniciosesion1.php');
			}
	}
?>
<html><head></head>
<body>
<?php
$conexion=mysqli_connect('localhost','root','','real_state') or die ('problemas en la conexion');
?>
<div align="center">
	<?php
	$usuario = $_SESSION['Usuario'];
	$fotosesion = $_SESSION['foto'];
	echo "<font face= impact size= 6> Bienvenid@ <br>Invitad@  <br>".$usuario."</font><br>";
	echo "<div align='center'><img src='imagenes/$fotosesion ?>' width='200' height='160' ></div>";	
	?>
</div>
<h1 align=center>Consulta de Usuarios</h1>
<table border="3" align="center">
	<tr>
		<th>Usuarios</th>
<!-- 		<th>Clave</th>	
		<th>Idrol</th>	 -->
		<th>Email</th>
	<!-- 	<th>Foto</th> -->
	</tr>
<?php
$consulta="SELECT * FROM usuarios";
$ejecutar=mysqli_query($conexion,$consulta);
$i=0;
while($fila=mysqli_fetch_array($ejecutar))
	{
		$usuario=$fila['Usuario'];
		// $contrasena=$fila['clave'];
		// $idrol=$fila['idrol'];
		$email=$fila['correoElectronico'];
		$i++;
?>
	<tr>
		<td><?php echo $usuario ?></td>
<!-- 		<td><?php //echo $contrasena ?></td>
		<td><?php //echo $idrol ?></td> -->
		<td><?php echo $correoElectronico ?></td>
	</tr>
<?php
	}
 ?>
<!--  <div align="right"><img src="imagenes/<?php //echo $fotografia ?>" width="50" height="40" ></div> -->
</table>
<div align="center">	
	<form action="iniciosesion1.php" method="POST">
		<input type="submit" name="cerrar_sesion" value="CERRAR SESION">
	</form>
</div>
</body>
</html>