<?php
session_start();
include "../Controlador/conexion.php";
$correo=($_GET['correo']);
$eliminar = mysqli_query($con,"DELETE FROM cliente WHERE Correo_Electronico='$correo'");
if (!$eliminar){
	echo "Error al eliminar";
}else{
	echo "Eliminado con exito";
	header("location: manage_users.php");
}
?>