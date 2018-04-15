<?php 
	session_start(); 
	include 'menu.php';
?>
<html>
	<head>
		<title>Formulario de Registro</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
<div class="container">
	<div class="card card-container">
<div class="row">
<div class="col-md-12 page-header">
		<p>&nbsp;</p>
		<h2>Login</h2>

		<form role="form" name="login" action="php/login.php" method="post">
		  <div class="form-group">
		    <label for="username">Nombre de usuario o email</label>
		    <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" required="">
		  </div>
		  <div class="form-group">
		    <label for="password">Contrase&ntilde;a</label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a" required="">
		  </div>

		  <button type="submit" class="btn btn-default">Acceder</button>
		</form>
			</div>
		</div>
	</div>
</div>
		<script src="js/valida_login.js"></script>
	</body>
</html>