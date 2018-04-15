<?php 
  require_once 'php_action/core.php'; 
  $db = mysqli_connect('localhost', 'root', '', 'libreriados');
  $result = mysqli_query($db,"select username from user where id ='".$_SESSION['user_id']."'");
  $row = mysqli_fetch_array($result);
  $username = $row['username'];
?>

<!DOCTYPE html>
<html>
<head>

	<title>libreria</title>
  <link rel="icon" type="image/ico" href="img/book.ico" />
	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">

	<!-- DataTables -->
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>


	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
       <a class="navbar-brand" href="home.php"><span class="glyphicon glyphicon-home"></span> <?php echo $username;?> </a>
      
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      

      <ul class="nav navbar-nav navbar-right">

         <ul class="nav navbar-nav navbar-right">
       <ul class="nav navbar-nav">
          <?php 
          if(!isset($_SESSION["user_id"])):?>
      <li><a href="./login.php"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
    <?php else:
    ?>
      <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Facturar <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavAddOrder"><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Añadir Factura</a></li>            
            <li id="topNavManageOrder"><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> Manejar facturas</a></li>            
          </ul>
        </li> 
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Catalogos<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="./catalogos/usuario/usuario.php">Usuarios</a> </li>
            <li><a href="./catalogos/productos/productos.php">Productos</a> </li>
            <li><a href="./catalogos/cliente/clientes.php">Clientes</a> </li>
            <li><a href="./catalogos/proveedores/proveedores.php">Proveedores</a> </li>
          </ul>
        </li>
        <li><a href="./php/logout.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
    <?php endif;?>
         </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">
