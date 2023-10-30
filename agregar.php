<?php
session_start();

if(!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<html>
<head>
	<title>Agregar datos</title>
</head>

<body>
<?php
include_once("conexion.php");

if(isset($_POST['update'])) {	
	$id_empleado = $_POST['id_empleado'];
	$nombre_empleado = $_POST['nombre_empleado'];
	$fecha_contratacion = $_POST['fecha_contratacion'];
	$cargo = $_POST['cargo'];
	$salario = $_POST['salario'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$correo_electronico = $_POST['correo_electronico'];
	$id_inicio = $_SESSION['id_inicio'];

	if(empty($id_empleado) || empty($nombre_empleado) || empty($fecha_contratacion) || empty($cargo) || empty($salario) || empty($direccion) || empty($telefono) || empty($correo_electronico)) {
		echo "<font color='red'>Por favor, complete todos los campos.</font><br/>";
		echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
	} else { 
		$resultado = mysqli_query($mysqli, "INSERT INTO empleado (id_empleado, nombre_empleado, fecha_contratacion, cargo, salario, direccion, telefono, correo_electronico, id_inicio) VALUES ('$id_empleado', '$nombre_empleado', '$fecha_contratacion', '$cargo', '$salario', '$direccion', '$telefono', '$correo_electronico', '$id_inicio')");
		
		if($resultado){
			echo "<font color='green'>Datos añadidos con éxito.</font>";
			echo "<br/><a href='ver.php'>Ver resultados</a>";
		} else {
			echo "Error en la inserción: " . mysqli_error($mysqli);
		}
	}
}
?>
</body>
</html>
