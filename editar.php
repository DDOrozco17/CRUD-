<?php session_start(); ?>

<?php
if (!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<?php
// Incluyendo el archivo de conexión a la base de datos
include_once("conexion.php");

if (isset($_POST['update'])) {
	$id = $_POST['id_empleado'];

	$nombre_empleado = $_POST['nombre_empleado'];
	$fecha_contratacion = $_POST['fecha_contratacion'];
	$cargo = $_POST['cargo'];
	$salario = $_POST['salario'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$correo_electronico = $_POST['correo_electronico'];

	// Verificar campos vacíos
	if (empty($nombre_empleado) || empty($fecha_contratacion) || empty($correo_electronico) || empty($cargo) || empty($salario) || empty($direccion) || empty($telefono)) {
		if (empty($nombre_empleado)) {
			echo "<font color='red'>El campo de cantidad en stock está vacío.</font><br/>";
		}

		if (empty($fecha_contratacion)) {
			echo "<font color='red'>El campo de tallas disponibles está vacío.</font><br/>";
		}

		if (empty($correo_electronico)) {
			echo "<font color='red'>El campo de correo_electronico está vacío.</font><br/>";
		}

		if (empty($cargo)) {
			echo "<font color='red'>El campo de precio de compra está vacío.</font><br/>";
		}

		if (empty($salario)) {
			echo "<font color='red'>El campo de precio de venta está vacío.</font><br/>";
		}

		if (empty($direccion)) {
			echo "<font color='red'>El campo de nombre del producto está vacío.</font><br/>";
		}

		if (empty($telefono)) {
			echo "<font color='red'>El campo de fecha de reposición está vacío.</font><br/>";
		}

	} else {
		// Actualizando la tabla
// Actualizando la tabla
		$resultado = mysqli_query($mysqli, "UPDATE empleado SET nombre_empleado='$nombre_empleado', fecha_contratacion='$fecha_contratacion', correo_electronico='$correo_electronico', cargo='$cargo', salario='$salario', direccion='$direccion', telefono='$telefono' WHERE id_empleado='$id'");

		// Redireccionando a la página de visualización. En este caso, es ver.php
		header("Location: ver.php");
	}
}
?>

<?php
// Obtener el id del URL
$id = $_GET['id_empleado'];

if ($id != '') {
	// Seleccionar los datos asociados con este id particular
	$resultado = mysqli_query($mysqli, "SELECT * FROM empleado WHERE id_empleado=$id");

	while ($res = mysqli_fetch_array($resultado)) {
		$nombre_empleado = $res['nombre_empleado'];
		$fecha_contratacion = $res['fecha_contratacion'];
		$correo_electronico = $res['correo_electronico'];
		$cargo = $res['cargo'];
		$salario = $res['salario'];
		$direccion = $res['direccion'];
		$telefono = $res['telefono'];
	}
} else {
	echo "ID de producto no encontrado en la URL. Asegúrate de pasar el ID correctamente.";
}
?>


<html>

<head>
	<title>Editar Datos</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="ver.php">Ver Productos</a> | <a href="cerrar.php">Cerrar Sesión</a>
	<br /><br />

	<form name="form1" method="post" action="editar.php">
		<table border="0">
			<tr>
				<td>Nombre Empleado</td>
				<td><input type="text" name="nombre_empleado" value="<?php echo $nombre_empleado; ?>"></td>
			</tr>
			<tr>
				<td>Fecha de Contratacion</td>
				<td><input type="date" name="fecha_contratacion" value="<?php echo $fecha_contratacion; ?>"></td>
			</tr>
			<tr>
				<td>Cargo</td>
				<td><input type="text" name="cargo" value="<?php echo $cargo; ?>"></td>
			</tr>
			<tr>
				<td>Salario</td>
				<td><input type="text" name="salario" value="<?php echo $salario; ?>"></td>
			</tr>
			<tr>
				<td>Direccion</td>
				<td><input type="text" name="direccion" value="<?php echo $direccion; ?>"></td>
			</tr>
			<tr>
				<td>Telefono</td>
				<td><input type="text" name="telefono" value="<?php echo $telefono; ?>"></td>
			</tr>
			<tr>
				<td>Cargo</td>
				<td><input type="text" name="correo_electronico" value="<?php echo $correo_electronico; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id_empleado" value=<?php echo $_GET['id_empleado']; ?>></td>
				<td><input type="submit" name="update" value="Actualizar"></td>
			</tr>
		</table>
	</form>
</body>

</html>