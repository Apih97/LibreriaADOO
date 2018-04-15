<?php 
	$db = mysqli_connect('localhost', 'root', '', 'libreriados');

	// initialize variables
	$identificador_cliente = "";
	$firstname = "";
	$lastname = "";
	$id = 0;
	$update = false;


// agregar
	if (isset($_POST['save'])) {
		$identificador_cliente = $_POST['identificador_cliente'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];


		mysqli_query($db, "INSERT INTO clientes (identificador_cliente, firstname, lastname) VALUES ('$identificador_cliente', '$firstname', '$lastname')"); 
		$_SESSION['message'] = "Registro guardado"; 
		header('location: clientes.php');
	}

// actualizar
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$identificador_cliente = $_POST['identificador_cliente'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];

	mysqli_query($db, "UPDATE clientes SET identificador_cliente='$identificador_cliente', firstname='$firstname', lastname='$lastname' WHERE id=$id");
	$_SESSION['message'] = "Registro actualizado"; 
	header('location: clientes.php');
}

//borrar
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM clientes WHERE id=$id");
	$_SESSION['message'] = "Registro borrado!"; 
	header('location: clientes.php');
}