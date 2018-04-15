<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'libreriados');
	$result = mysqli_query($db,"select id from user where id ='".$_SESSION['user_id']."'");
  	$row = mysqli_fetch_array($result);
  	$idactual = $row['id'];

	// initialize variables
	$fullname = "";
	$username = "";
	$email = "";
	$password = "";
	$created_at="";
	$id = 0;
	$update = false;

	//$result = mysqli_query("select id from Users where id ='".$_SESSION['user_id']."'");
	//$row = mysqli_fetch_array($result);
	//$idComparar = $row['id'];



// agregar
	if (isset($_POST['save'])) {
		$fullname = $_POST['fullname'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$created_at = $_POST['created_at'];



		mysqli_query($db, "INSERT INTO user (fullname, username, email, password, created_at) VALUES ('$fullname', '$username', '$email', '$password', NOW())"); 
		$_SESSION['message'] = "Registro guardado"; 
		header('location: usuario.php');
	}

// actualizar
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	mysqli_query($db, "UPDATE user SET fullname='$fullname', username='$username', email='$email', password = '$password' WHERE id=$id");
	$_SESSION['message'] = "Registro actualizado"; 
	header('location: usuario.php');
}

//borrar
//if ($idComparar == $_GET['del']) {
//	print "<script>alert(\"No se puede borrar tu propio usuario\");window.location='usuario.php';</script>";
//	header('location: usuario.php');
//} 

if (isset($_GET['del'])) {
	$id = $_GET['del'];
if ($_GET['del'] == $idactual ) {
	print "<script>alert(\"No puedes borrar tu usuario\");window.location='usuario.php';</script>";
}else{
	mysqli_query($db, "DELETE FROM user WHERE id=$id");
	$_SESSION['message'] = "Registro borrado!"; 
	header('location: usuario.php');
	}
}


