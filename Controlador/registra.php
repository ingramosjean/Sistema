<?php
session_start();
include "conexion.php";
$nombre = $_POST["nombrecliente"];
$email = $_POST["emailcliente"];
$direccion = $_POST["direccioncliente"];
$telefono = $_POST["telefonocliente"];
$insertar = mysqli_query($con,"INSERT INTO cliente(NombreCliente,Correo_Electronico,telefono,Direccion) values('$nombre','$email','$telefono','$direccion')");
if (!$insertar){
	echo "Error al guardar";
}else{
	echo "Guardado con exito";
	header("location: ../index.html");
}
?>