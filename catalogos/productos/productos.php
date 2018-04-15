<?php 
	session_start(); 
	include 'server.php';
	include 'menu.php';

if (isset($_GET['edit'])) {
		$product_id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM product WHERE product_id=$product_id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$product_id = $n['product_id'];
			$product_name = $n['product_name'];
			$quantity = ['quantity'];
			$rate = ['rate'];
			$active = ['active'];
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
<div class="container">
<div class="row">
<div class="col-md-12 page-header">
		<form role="form" action="server.php" method="post">
		<input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
		  <div class="form-group">
		    <label for="product_name">Nombre</label>
		    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Nombre del producto" value="<?php echo $product_name;?>" required>
		  </div>
		  <div class="form-group">
		    <label for="quantity">Cantidad</label>
		    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Cantidad de producto" value="<?php echo $quantity;?>" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números" maxlength="8">
		  </div>	  
		  <div class="form-group">
		    <label for="rate">Precio</label>
		    <input type="text" class="form-control" id="rate" name="rate" placeholder="Precio de venta del producto" value="<?php echo $rate;?>" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="8">
		  </div>
		  <div class="form-group">
				<label for="active">Estado</label>
				 <select class="form-control" id="active" name="active" required>
				 	<option value="">~ SELECCIONAR ~</option>
					<option value="1">Activo</option>
					<option value="2">Inactivo</option>
				  </select>
			  </div>
		<div class="input-group">
		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update">Actualizar</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save">Guardar</button>
		<?php endif ?>
		</div>

		</form>
		</div>
		</div>
		</div>	
<?php  

?> 

<?php 
$sql = "SELECT product_name, quantity, rate, active FROM product WHERE status = '1' ORDER By product_name";
$results = mysqli_query($db, $sql) or die(mysqli_error($db)); ?>

<table class='table table-hover' id="productos">
		<tr>
			<th>Nombre producto</th>
			<th>Estado</th>
			<th>Cantidad</th>
			<th>Precio</th>
			<th colspan="2">Acción</th>
		</tr>

	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['product_name']; ?></td>
			<td><?php $active = $row['active']; 
			if ($active==1)
				{$estado="Activo";}
			else
				{$estado="Inactivo";}
			echo $estado;
			?></td>
			<td><?php echo $row['quantity']; ?></td>
			<td>C$ <?php $rate =$row['rate']; 
			echo number_format($rate,2,'.',',');
			?></td>
			<td>
				<a href="productos.php?edit=<?php echo $row['product_id']; ?>" class="edit_btn"><span class="glyphicon glyphicon-edit"></span> Editar</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['product_id']; ?>" onclick="return confirm('¿Seguro?')" class="del_btn"><span class="glyphicon glyphicon-remove"></span> Borrar</a>
			</td>
		</tr>
	<?php } ?>

</table>

</section>