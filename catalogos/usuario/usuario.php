<?php  
	include 'server.php';
	include 'menu.php';


	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM user WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$fullname = $n['fullname'];
			$username = $n['username'];
			$email = $n['email'];
			$password = $n['password'];
		}
	}
?>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
	<link rel="icon" type="image/ico" href="../../img/book.ico" />
</head>

<section class="main-container">
    <div class="col-lg-12 page-header text-center">

   <p>&nbsp;</p>
	<?php 

		if (isset($_SESSION['message'])): 

	?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
	<?php endif ?>


<?php $results = mysqli_query($db, "SELECT * FROM user"); ?>

<table class='table table-hover'>
		<tr>
			<th>Usuario</th>
			<th>Nombre completo</th>
			<th>Correo</th>
			<th>Contraseña</th>
			<th>Creado:</th>
			<th colspan="2">Acción</th>
		</tr>
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['fullname']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['password']; ?></td>
			<td><?php echo $row['created_at']; ?></td>
			<td>
		<a href="../../registro.php?edit=<?php echo $row['id']; ?>" class="edit_btn">Editar</a>
			</td>
			<td>
		<a href="server.php?del=<?php echo $row['id']; ?>" onclick="return confirm('¿Seguro?')" class="del_btn">Borrar</a>
			</td>
		</tr>

	<?php } ?>



		<a class="new_añadir"  href="../../registro.php?nuevo" >Nuevo</a>

</table>

</section>

