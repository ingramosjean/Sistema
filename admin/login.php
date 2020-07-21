<?php
session_start();
include "../Controlador/conexion.php";
$check=0;

if(isset($_POST['submit']))
{
$usuario = $_POST['usuario'];
$password = $_POST['pass'];

$query=mysqli_query($con,"select usuario from usuario where usuario='$usuario' and password='$password'");

list($user_id)=mysqli_fetch_array($query);

$_SESSION['user_id']=$user_id;
header("location: index.php");

$check=1;

if($check==0)
{
$check=2;
}

mysqli_close($con);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../js/bootstrap-3.1.1.min.js">
<title>Administrador</title>
</head>
<body>
<div class="container page-header well" align="center">
<img src="../images/logo.jpg">
<h1 align="center">Bienvenido</h1>
<div align="center">
<form action="login.php" method="post" id="login" name="login" enctype="multipart/form-data">
<div class="form-group">
<input type="text" style="font-size:18px; width:200px" class="input-lg" name="usuario" id="usuario" placeholder="Usuario" required autofocus>
</div>
<div class="form-group">
<input type="password" class="input-lg" name="pass" style="font-size:18px; width:200px" id="pass" placeholder="Contraseña" required>
 </div>
 <div class="form-group">
<button class="btn btn-large btn-lg btn-success" type="submit" name="submit" id="submit">Ingresar</button>
</div>
</form>
</div>
</div>
</body>
</html>