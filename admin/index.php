<?php
include "check_session.php";
include "../Controlador/conexion.php";
$user_id=$_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Panel de Administrador</title>
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
  	<div class="panel panel-default">
	<div class="panel-heading" style="background-color:#c4e17f">
	<h1>Bienvenido </h1></div><br>
	<div class="panel-body">
		<h3>
<?php  //success message
if(isset($_POST['success'])) {
$success = $_POST["success"];
echo "<h1 style='color:#0C0'>Tu Producto fue agregado correctamente &nbsp;&nbsp;<span class='glyphicon glyphicon-ok'></h1></span>";
}
?></h3>
	</div>
</div></div></div>
<?php include "include/js.php"; ?>
</body>
</html>