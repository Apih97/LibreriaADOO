<?php 
	session_start(); 
	include 'menu.php';
	include './catalogos/usuario/server.php';

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
<html>
	<head>
		<title>Formulario de Registro</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
<div class="container">
<div class="row">
<div class="col-md-12 page-header">

		<form role="form" action="./catalogos/usuario/server.php" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		  <div class="form-group">
		    <label for="username">Nombre de usuario</label>
		    <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" required="" value="<?php echo $username;?>" >
		  </div>
		  <div class="form-group">
		    <label for="fullname">Nombre completo</label>
		    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nombre Completo" required="" value="<?php echo $fullname;?>">
		  </div>
		  <div class="form-group">
		    <label for="email">Correo electronico</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electronico" required="" value="<?php echo $email;?>">
		  </div>
		  <div class="form-group">
		    <label for="password">Contrase&ntilde;a</label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a" required="" value="<?php echo $password;?>">
		  </div>
		  <div class="form-group">
		    <label for="confirm_password">Confirmar contrase&ntilde;a</label>
		    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmar contrase&ntilde;a" required="">
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
		<script src="js/valida_registro.js"></script>
	</body>
</html>