<?php
	session_start();
	include 'menu.php';
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}

	$db = mysqli_connect('localhost', 'root', '', 'libreriados');
	$result = mysqli_query($db,"select username from user where id ='".$_SESSION['user_id']."'");
	$row = mysqli_fetch_array($result);
	$username = $row['username'];
	
?>

<html>
	<head>
		<title>Inicio</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<style>
.flip3D{ width:240px; height:200px; margin:10px; float:left; }
.flip3D > .front{
	position:absolute;
	-webkit-transform: perspective( 600px ) rotateY( 0deg );
	transform: perspective( 600px ) rotateY( 0deg );
	background:#FC0; width:240px; height:200px; border-radius: 7px;
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden;
	transition: -webkit-transform .5s linear 0s;
	transition: transform .5s linear 0s;
}
.flip3D > .back{
	position:absolute;
	-webkit-transform: perspective( 600px ) rotateY( 180deg );
	transform: perspective( 600px ) rotateY( 180deg );
	background: #80BFFF; width:240px; height:200px; border-radius: 7px;
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden;
	transition: -webkit-transform .5s linear 0s;
	transition: transform .5s linear 0s;
}
.flip3D:hover > .front{
	-webkit-transform: perspective( 600px ) rotateY( -180deg );
	transform: perspective( 600px ) rotateY( -180deg );
}
.flip3D:hover > .back{
	-webkit-transform: perspective( 600px ) rotateY( 0deg );
	transform: perspective( 600px ) rotateY( 0deg );
}
</style>
    </head>
	<body>

<div class="col-md-12 page-header text-center">
		<p>&nbsp;</p>
       <h2>¡Hola <?php echo $username;?>!</h2> 
       <div class="bootstrap/css/bootstrap.min.css">

     <table  border=0" align="center">
   
  <tr>
    <td> <div class="flip3D" >
  	<div class="back">Libros</div>
  	<div class="front"><img src="img/bk.jpg" width="240px" height="200px"></div>
	</div></td>
    <td><div class="flip3D" align="center">
 	 <div class="back">Lapices</div>
 	 <div class="front"><img src="img/colores.jpg" width="240px" height="200px"></div>
	</div></td>
	<td><div class="flip3D" align="center">
 	 <div class="back"> - Back</div>
 	 <div class="front"><img src="img/calc.jpg" width="240px" height="200px"></div>
	</div></td>
    <td><div class="flip3D">
  	<div class="back">Mapa</div>
  	<div class="front"><img src="img/captura.png" width="240px" height="200px"></div>
	</div></td>
  </tr>
</table>

</div>

    <script src="js/valida_registro.js"></script>
	
	</body>
</html>
