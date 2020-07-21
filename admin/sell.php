<?php
include "check_session.php";
include "../Controlador/conexion.php";
$fecha=date("Y") . "/" . date("m") . "/" . date("d");
$query = "SELECT C.NombreCliente,C.Direccion,C.Correo_Electronico,P.Nombre,P.Precio,P.Categoria,Pc.q,Pc.producto_id,Ca.correo, Ca.dia, Ca.estado FROM cliente C, producto P, producto_carrito Pc, carrito Ca WHERE Ca.correo=C.Correo_Electronico && P.Id=Pc.producto_id && Ca.Id=Pc.carrito_id && Ca.estado = 'vendido'";
$q2 = "SELECT P.Precio,Pc.q FROM cliente C, producto P, producto_carrito Pc, carrito Ca WHERE Ca.correo=C.Correo_Electronico && P.Id=Pc.producto_id && Ca.Id=Pc.carrito_id";
$cliente = mysqli_query($con,$query);
$total = mysqli_query($con,$q2);
$numero =0;
$suma=0;
$id=0;
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
	<h1>Ventas</h1></div><br>
<div class='table-responsive'>  
<div style="overflow-x:scroll;">
<table class="table  table-hover table-striped" style="font-size:18px">
<tr><th width="20%">Cliente</th><th width="40%">Dirección</th><th width="20%">Correo</th><th width="10%">Fecha</th><th width="20%" >Productos</th><th width="20%" >Precio Final</th><th width="20%" >Estado</th>
<?php
while($r  = mysqli_fetch_assoc($cliente))
{$id=$id+1;?>	
<tr>
	<td><?php echo $r['NombreCliente'];?></td>
	<td><?php echo $r['Direccion'];?></td>
	<td><?php echo $r['Correo_Electronico'];?></td>
	<td><?php echo $r['dia'];?></td>
	<td><?php echo $r['Nombre']; ?></td>
	<?php $p1=$r['q']*$r['Precio']; ?>
	<td>S/ <?php echo $p1+$p1*0.18; ?></td>
	<td><?php echo $r['estado'];?></td>
</tr>
<?php
}
?>
</tr>
</table>
</div>
</div>
</div>
</div>
<?php include("include/js.php");?>
</body>
</html>