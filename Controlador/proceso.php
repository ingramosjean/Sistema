<?php
session_start();
include "../Controlador/conexion.php";
$email=$_POST['Email'];
$query = "SELECT NombreCliente,Direccion,Correo_Electronico FROM cliente WHERE Correo_Electronico='$email'";
$cliente = mysqli_query($con,$query);
$r = mysqli_fetch_assoc($cliente);
$ce=$r['Correo_Electronico'];
if(!empty($ce)){
if(!empty($_POST)){
$q1 = $con->query("insert into carrito(correo,dia,estado) value(\"$email\",NOW(),'proceso')");
if($q1){
$carrito_id = $con->insert_id;
foreach($_SESSION["carrito"] as $c){
	$q1 = $con->query("insert into producto_carrito(producto_id,q,carrito_id) value($c[Id],$c[q],$carrito_id)");
}
unset($_SESSION["carrito"]);
}
}
}else{
print "<script>alert('REGISTRESE POR FAVOR');window.location='../index.html';</script>";
}
print "<script>alert('Pedido realizado exitosamente');window.location='../Vista/carrito.php';</script>";
?>