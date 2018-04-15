<?php
	session_start();
	include 'server.php';
	include_once 'menu.php';

if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM clientes WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$identificador_cliente = $n['identificador_cliente'];
			$firstname = $n['firstname'];
			$lastname = $n['lastname'];
			
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




<?php $results = mysqli_query($db, "SELECT * FROM clientes"); ?>

<table class='table table-hover'>
		<tr>
			<th>Identificador</th>
			<th>Primer nombre</th>
			<th>Primer apellido</th>
			<th colspan="2">Acción</th>
		</tr>
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['identificador_cliente']; ?></td>
			<td><?php echo $row['firstname']; ?></td>
			<td><?php echo $row['lastname']; ?></td>
			<td>
				<a href="clientes.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Editar</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" onclick="return confirm('¿Seguro?')" class="del_btn">Borrar</a>
			</td>
		</tr>
	<?php } ?>
	
</table>
      
 <div class="container">
<div class="row">
<div class="col-md-12 page-header">

		<form role="form" action="server.php" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		  <div class="form-group">
		    <label for="identificador_cliente">Identificador</label>
		    <input type="text" class="form-control" id="identificador_cliente" name="identificador_cliente" placeholder="Identificador"  value="<?php echo $identificador_cliente;?>" required pattern="[0-9]{8}" title="El identificador del cliente debe contener 8 numeros (no letras) ">
		  </div>
		  <div class="form-group">
		    <label for="fullname">Primer nombre</label>
		    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Primer nombre" value="<?php echo $firstname;?>" required>
		  </div>
		  <div class="form-group">
		    <label for="email">Primer Apellido</label>
		    <input type="text-center" class="form-control" id="lastname" name="lastname" placeholder="Primer apellido" value="<?php echo $lastname;?>" required>
		  </div>
		<div class="input-group">
		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >Actualizar</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Guardar</button>
		<?php endif ?>
		</div>

		</form>
		</div>
		</div>
		</div>


</section>


