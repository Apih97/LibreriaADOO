<?php
	session_start();
	include 'server.php';
	include 'menu.php';

if (isset($_GET['edit'])) {
		$id_proveedor = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM provider WHERE id_proveedor=$id_proveedor");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$id_proveedor = $n['id_proveedor'];
			$nombre_prov = $n['nombre_prov'];
			$direccion = $n['direccion'];
			$contacto_prov = $n['contacto_prov'];
			$contacto_num = $n['contacto_num'];
			$status_prov = $n['status_prov'];			
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
		<input type="hidden" name="id_proveedor" value="<?php echo $id_proveedor; ?>">
		  <div class="form-group">
		  	<h3><center> Manejo de Proveedores </center></h3>
		    <label for="nombre_prov">Proveedor</label>
		    <quote><input type="text" class="form-control" id="nombre_prov" name="nombre_prov" placeholder="Nombre del proveedor"  value="<?php echo $nombre_prov;?>" required>
		  </div>
		  <div class="form-group">
		    <label for="direccion">Direccion</label>
		    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion del proveedor" value="<?php echo $direccion;?>" required>
		  </div>
		  <div class="form-group">
		    <label for="contacto_prov">Contacto proveedor</label>
		    <input type="text" class="form-control" id="contacto_prov" name="contacto_prov" placeholder="Nombre del contacto" value="<?php echo $contacto_prov;?>" required>
		  </div>
		  <div class="form-group">
		    <label for="contacto_num">Numero telefono </label>
		    <input type="text" class="form-control" id="contacto_num" name="contacto_num" placeholder="Numero de telefono Contacto" value="<?php echo $contacto_num;?>" required pattern="[0-9]{8,10}" title="Ingresa solo numeros">
		  </div>
		  <div class="form-group">
				<label for="status_prov">Estado</label>
				 <select class="form-control" id="status_prov" name="status_prov" required>
				 	<option selected>-- Seleccione el estado --</option>
					<option value="1">Activo</option>
					<option value="0">Inactivo</option>
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
<div class="container">	
	<div class="form-group row">
	<label for="caja_busqueda" class="col-md-2 control-label">Nombre</label>
	<div class="col-md-8">
	<input type="text" class="form-control" id="caja_busqueda" placeholder="Nombre o contacto del proveedor">
	</div>
	<div class="col-md-1">
	<button type="button" class="btn" id="btn_buscar">
	<span class="glyphicon glyphicon-search" ></span> Buscar</button>
	</div>
	</div>
</div>

<!-- BOTON BUSCAR -->
<?php  

?> 

<?php $results = mysqli_query($db, "SELECT * FROM provider ORDER By nombre_prov"); ?>

<table class='table table-hover'>
		<tr>
			<th>Proveedor</th>
			<th>Direccion</th>
			<th>Contacto</th>
			<th>Numero telefono</th>
			<th>Estado</th>
			<th colspan="2">Acción</th>
		</tr>
		<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['nombre_prov']; ?></td>
			<td><?php echo $row['direccion']; ?></td>
			<td><?php echo $row['contacto_prov']; ?></td>
			<td>+505 <?php echo $row['contacto_num']; ?></td>
			<td><?php $status_prov = $row['status_prov']; 
			if ($status_prov==1)
				{$estado="Activo";}
			else
				{$estado="Inactivo";}
			echo $estado; ?></td>
			<td>
				<a href="proveedores.php?edit=<?php echo $row['id_proveedor']; ?>" class="edit_btn"><span class="glyphicon glyphicon-edit"></span> Editar</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id_proveedor']; ?>" onclick="return confirm('¿Seguro?')" class="del_btn"><span class="glyphicon glyphicon-remove"></span> Borrar</a>
			</td>
			</td>
		</tr>
	<?php } ?>

</table>
</section>