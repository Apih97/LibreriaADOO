<?php 
	$db = mysqli_connect('localhost', 'root', '', 'libreriados');

	// inicializar variables
	$nombre_prov = "";
	$direccion = "";
	$contacto_prov = "";
	$contacto_num = "";
	$status_prov = "";
	$id_proveedor = 0;
	$update = false;


// agregar
	if (isset($_POST['save'])) {
		$nombre_prov = $_POST['nombre_prov'];
		$direccion = $_POST['direccion'];
		$contacto_prov = $_POST['contacto_prov'];
		$contacto_num = $_POST['contacto_num'];
		$status_prov = $_POST['status_prov'];

		mysqli_query($db, "INSERT INTO provider (nombre_prov, direccion, contacto_prov, contacto_num, status_prov) VALUES ('$nombre_prov', '$direccion', '$contacto_prov', '$contacto_num', '$status_prov')"); 
		$_SESSION['message'] = "Registro guardado"; 
		header('location: proveedores.php');
	}

// actualizar
if (isset($_POST['update'])) {
	$id_proveedor = $_POST['id_proveedor'];
	$nombre_prov = $_POST['nombre_prov'];
	$direccion = $_POST['direccion'];
	$contacto_prov = $_POST['contacto_prov'];
	$contacto_num = $_POST['contacto_num'];
	$status_prov = $_POST['status_prov'];

mysqli_query($db, "UPDATE provider SET nombre_prov='$nombre_prov', direccion='$direccion', contacto_prov='$contacto_prov', contacto_num='$contacto_num', status_prov='$status_prov' WHERE id_proveedor=$id_proveedor");
	$_SESSION['message'] = "Registro ha sido actualizado!"; 
	header('location: proveedores.php');
}

//borrar
if (isset($_GET['del'])) {
	$id_proveedor = $_GET['del'];
	mysqli_query($db, "DELETE FROM provider WHERE id_proveedor=$id_proveedor");
	$_SESSION['message'] = "Registro borrado!"; 
	header('location: proveedores.php');
}