<?php
include "check_session.php";
include "../Controlador/conexion.php";
$query = "SELECT Correo_Electronico FROM Cliente";
$email = mysqli_query($con,$query);
$r2 = mysqli_fetch_assoc($email);
$correo= $r2['Correo_Electronico'];
$q2 = "SELECT C.NombreCliente,C.Direccion,C.Correo_Electronico,P.Nombre,P.Precio,P.Categoria,Pc.q,Pc.producto_id,Pc.Id,Ca.correo, Ca.dia, Ca.estado FROM cliente C, producto P, producto_carrito Pc, carrito Ca WHERE Ca.correo=C.Correo_Electronico && P.Id=Pc.producto_id && Ca.Id=Pc.carrito_id && Ca.estado = 'proceso' && C.Correo_Electronico = '$correo'";
$cliente = mysqli_query($con,$q2);
$numero =0;
$suma=0;
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Panel de Administración</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>
<body>
  <?php include "include/header.php";?>
   	<div class="container-fluid main-container">
	<?php include "include/side_bar.php";?>
    <div class="col-md-9 content" style="margin-left:10px">
    <div class="panel-heading" style="background-color:#c4e17f">
	<h1>Pedidos</h1></div><br>
<div class='table-responsive'>  
<div style="overflow-x:scroll;">
<table class="table  table-hover table-striped" style="font-size:18px" width="100%">
<thead><th>Cliente</th><th>Dirección</th><th>Correo</th><th >Fecha</th><th>Productos</th><th >Precio Final</th><th>Estado</th><th></th></thead>
<tr>
<?php while($r = mysqli_fetch_assoc($cliente)){?>
	<td><?php echo $r['NombreCliente'];?></td>
	<td><?php echo $r['Direccion'];?></td>
	<td><?php echo $r['Correo_Electronico']; ?></td>
	<td><?php echo $r['dia'];?></td>
	<td><?php echo $r['Nombre']; ?></td>
	<?php $p1=$r['q']*$r['Precio']; ?>
	<td>S/ <?php echo $p1+$p1*0.18; ?></td>
	<td><?php echo $r['estado'];?></td>
	<td><?php $id= $r['Id'];?><a href="anularpedido.php?id=<?php echo $id ?>" style="color: red">Anular Pedido</a></td>
</tr>
<?php }?>
<tt><a href="../Controlador/realizarboleta.php">Realizar Boleta</a></tt>
</table>
</div>
</div>
</div>
</div>
<?php include("include/js.php");?>
</body>
</html>