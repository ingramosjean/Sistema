<?php
include "check_session.php";
include "../Controlador/conexion.php";
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Panel de Administración</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/bootstrap.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>
<body>
  <?php include "include/header.php";?>
   	<div class="container-fluid main-container">
	<?php include "include/side_bar.php";?>
    <div class="col-md-9 content" style="margin-left:10px">
    <div class="panel-heading" style="background-color:#c4e17f">
	<h1>Comedores</h1></div><br>
<div class='table-responsive'>
<div style="overflow-x:scroll;">
<table class="table  table-hover table-striped" style="font-size:18px">
<tr><th align="center">Imagen</th><th align="center">Nombre</th><th align="center">Precio</th></tr>
<?php
	$q = "SELECT Imagen FROM producto WHERE Categoria='COMEDOR'";
	$result = mysqli_query($con,$q) or die ("Error al consultar");
	$img = mysqli_fetch_assoc($result);
	$products = $con->query("select * from producto where Categoria='COMEDOR'");	
	while($r=$products->fetch_object()):
?>
<tr align="center">
	<td width="20%"><img height="150" src="data:image/jpg;base64,<?php echo base64_encode($img['Imagen']);?>"/></td>
	<td width="25%"><?php echo $r->Nombre;?></td>
	<td width="25%">S/ <?php echo $r->Precio;?></td>
</tr>
<?php
	endwhile;
?>
</table>
</div></div>
</td></tr>
</table>
</div></div>
<nav align="center">
</nav>
</div></div>
<?php include "include/js.php";?>
</body>
</html>
