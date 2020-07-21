<?php
session_start();
include "../Controlador/conexion.php";
$id=($_GET['id']);
$eliminar = mysqli_query($con,"DELETE FROM producto_carrito WHERE Id='$id'");
if (!$eliminar){
	echo "Error al eliminar";
}else{
	echo "Eliminado con exito";
	header("location: orders.php");
}
?>