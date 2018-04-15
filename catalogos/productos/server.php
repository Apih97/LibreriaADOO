<?php 
	date_default_timezone_set('America/Managua');
	$db = mysqli_connect('localhost', 'root', '', 'libreriados');

	// inicializar variables
	$product_name = "";
	$quantity = "";
	$rate = "";
	$active = "";
	$product_image = "";
	$brand_id = "";
	$categories_id = "";
	$status = "";

	$product_id = 0;
	$update = false;

	
// agregar
	if (isset($_POST['save'])) {
		$product_name = $_POST['product_name'];
		$quantity = $_POST['quantity'];
		$rate = $_POST['rate'];
		$active = $_POST['active'];

		$product_image = $_POST['product_image']; 
		$brand_id = $_POST['brand_id'];
		$categories_id = $_POST['categories_id'];
		$status = $_POST['status'];

		mysqli_query($db, "INSERT INTO product (product_name, quantity, rate, active, product_image, brand_id, categories_id ,status) 
		VALUES ('$product_name', '$quantity', '$rate', '$active', 'No hay imagen', '0', '0','1')");
		$_SESSION['message'] = "Registro guardado!"; 
		header('location: productos.php');
	}

// actualizar
if (isset($_POST['update'])) {
	$product_id = $_POST['product_id'];
	$quantity = $_POST['quantity'];
	$rate = $_POST['rate'];
	$active = $_POST['active'];

	$product_image = $_POST['product_image']; 
	$brand_id = $_POST['brand_id'];
	$categories_id = $_POST['categories_id'];
	$status = $_POST['status'];

	mysqli_query($db,"UPDATE product SET product_name = '$product_name', quantity = '$quantity', rate = '$rate', active = '$active', product_image = 'No hay imagen', brand_id = '0',categories_id = '0', status = '1' WHERE product_id = $product_id ");
	$_SESSION['message'] = "Registro actualizado!"; 
	header('location: productos.php');
}

//borrar
if (isset($_GET['del'])) {
	$product_id = $_GET['del'];
	mysqli_query($db, "DELETE FROM product WHERE product_id=$product_id");
	$_SESSION['message'] = "Registro borrado!"; 
	header('location: productos.php');
}