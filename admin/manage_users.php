<?php
include "check_session.php";
include "../Controlador/conexion.php";
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
<?php include "include/header.php"; ?>

<div class="container-fluid">

<?php include("include/side_bar.php"); ?>
<div class="col-sm-9" style="margin-left:10px"> 
<div class="panel-heading" style="background-color:#c4e17f">
	<h1>Administración de Clientes </h1></div><br>

<div style="overflow-x:scroll;">
<table class="table table-bordered table-hover table-striped" style="font-size:18px">
	<tr>
               <th>Nombre</th>
               <th>Correo</th>
               <th>Teléfono</th>
               <th>Dirección</th>
               <th></th>
   	</tr>	
<?php 
$result=mysqli_query($con,"select * from cliente")or die ("query 2 incorrect.......");
while(list($Nombre,$Correo,$telefono,$Direccion)=
mysqli_fetch_array($result)){
echo "<tr><td>$Nombre</td><td>$Correo</td><td>$telefono</td><td>$Direccion</td>";
?><td><a href="borrarusuario.php?correo=<?php echo $Correo ?>" style="color: red">Eliminar Cliente</a></td></tr><?php
}
?>
</table>
</div>	
</div></div>
<?php include("include/js.php"); ?>
</body>
</html>