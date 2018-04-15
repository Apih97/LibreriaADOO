<?php
  $db = mysqli_connect('localhost', 'root', '', 'libreriados');
  $result = mysqli_query($db,"select username from user where id ='".$_SESSION['user_id']."'");
  $row = mysqli_fetch_array($result);
  $username = $row['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/ico" href="img/book.ico" />
<link rel="icon" type="image/ico" href="../../img/book.ico" />
<title>libreria</title>
<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css">


</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
       <span class="sr-only">Toggle navigation</span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
       <a class="navbar-brand" href="../../home.php"><span class="glyphicon glyphicon-home"></span> <?php echo $username;?> </a>
   </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      

      <ul class="nav navbar-nav navbar-right">

         <ul class="nav navbar-nav navbar-right">
       <ul class="nav navbar-nav">
          <?php 
          if(!isset($_SESSION["user_id"])):?>
      <li><a href="../../login.php"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
    <?php else:
    ?>
      <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Facturar <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavAddOrder"><a href="../../orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Añadir facturas</a></li>            
            <li id="topNavManageOrder"><a href="../../orders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> Manejar facturas</a></li>            
          </ul>
        </li>  
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Catalogos<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="usuario.php">Usuarios</a> </li>
            <li><a href="../productos/productos.php">Productos</a> </li>
            <li><a href="../cliente/clientes.php">Clientes</a> </li>
            <li><a href="../proveedores/proveedores.php">Proveedores</a> </li>
          </ul>
        </li>
        <li><a href="../../php/logout.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
    <?php endif;?>
         </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="../../js/jquery.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="../../js/bootstrap.js"></script>

