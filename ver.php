<?php session_start(); ?>

<?php
if(!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<?php
include_once("conexion.php");

$resultado = mysqli_query($mysqli, "SELECT * FROM empleado WHERE id_inicio=".$_SESSION['id_inicio']." ORDER BY id_empleado DESC");
?>

<html>
<head>
	<title>Página principal</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="agregar.html">Agregar nuevo dato</a> | <a href="cerrar.php">Cerrar sesión</a>
	<br/><br/>

	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Id Empleado</td>
			<td>Nombre Empleado</td>
			<td>Fecha de Contratacion</td>
			<td>cargo</td>
			<td>Salario</td>
			<td>Direccion</td>
			<td>telefono</td>
			<td>Correo Electronico</td>
			<td>Opciones</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($resultado)) {		
			echo "<tr>";
			echo "<td>".$res['id_empleado']."</td>";
			echo "<td>".$res['nombre_empleado']."</td>";
			echo "<td>".$res['fecha_contratacion']."</td>";
			echo "<td>".$res['cargo']."</td>";
			echo "<td>".$res['salario']."</td>";
			echo "<td>".$res['direccion']."</td>";	
			echo "<td>".$res['telefono']."</td>";
			echo "<td>".$res['correo_electronico']."</td>";
			echo "<td><a href=\"editar.php?id_empleado=$res[id_empleado]\">Editar</a> | <a href=\"eliminar.php?id=$res[id_empleado]\" onClick=\"return confirm('¿Estás seguro de que quieres eliminar?')\">Eliminar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
