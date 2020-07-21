<!DOCTYPE html>
<?php
session_start();
include "../Controlador/conexion.php";
$fecha=date("Y") . "/" . date("m") . "/" . date("d");
$fecha2=date("d") . "/" . date("m") . "/" . date("Y");
$email = $_POST['email'];
$query = "SELECT * FROM cliente C, producto P, producto_carrito Pc, carrito Ca WHERE Ca.correo=C.Correo_Electronico && P.Id=Pc.producto_id && Ca.Id=Pc.carrito_id && C.Correo_Electronico='$email'";
$q3 = "SELECT id FROM boleta";
$cliente = mysqli_query($con,$query);
$boleta = mysqli_query($con,$q3);
$suma=0;
?>
<html>
<head>
<title>De Todo Perú</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="De Todo Perú, muebles, ropa, motos, videojuegos" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
<script src="../js/jquery.min.js"></script>
<link rel="stylesheet" href="../css/jquery.countdown.css" />
<script src="../js/simpleCart.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-3.1.1.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
</head>
<body>
		<div class="container">
			<br><br>
			<table border="1" title="Boleta de ventas">
				<table border="1">
					<tr>
					<?php $b= mysqli_fetch_assoc($boleta)?>
						<td width="900" align="left"><img src="../images/logo.jpg" height="100" width="150"><br>
						&nbsp TENDENCIAS SIGLO XXI S.R.L.<br>
						&nbsp Jr. Padre Urraca 386, San Miguel<br>
						&nbsp Lima - Lima</td>
						<td align="center" width="300">BOLETA DE VENTA<br>
						ELECTRONICA<br>
						RUC: 20510108508<br>
						BE01- <?php echo $b['id']+1;?>
					</tr>
				</table>
				<?php $r = mysqli_fetch_assoc($cliente) ?>
				<table border="1">
					<tr align="left">
						<td width="1200">&nbsp Fecha de emision : <?php echo $fecha2; ?><br>
						&nbsp Nombre : <b> <?php echo $r['NombreCliente']; 
							$nombre=$r['NombreCliente'];?> </b><br>
						&nbsp Dirección : <b><?php echo $r['Direccion']; ?></b><br>
						&nbsp Correo : <b><?php echo $r['Correo_Electronico'];?></b></td>
					</tr>
				</table>
				<table border="1">
				<tr>
					<td width="300" align="center"><b>CANTIDAD</b></td>
					<td width="300" align="center"><b>DESCRIPCION</b></td>
					<td width="300" align="center"><b>VALOR UNITARIO</b></td>
					<td width="300" align="center"><b>IMPORTE DE VENTA</b></td>
				</tr>
				<tr>
					<td width="200" align="center"><?php echo $r['q'];?></td>
					<td style="text-align:center" width="400"><?php echo $r['Nombre']; ?></td>
					<td style="text-align:center" width="400">S/ <?php echo $r['Precio']; ?></td>
					<td style="text-align:center" width="200">S/ <?php echo $p1=$r['q']*$r['Precio'];?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td align="right">IGV: &nbsp</td>
					<td style="text-align:center" width="200"><?php echo $p1*0.18; ?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td align="right">Importe Total: &nbsp</td>
					<?php $p2=$r['q']*$r['Precio'];
							$suma = $p2+$p2*0.18+$suma;
					?>
					<td style="text-align:center" width="200">S/ <?php echo $suma; ?></td>
				</tr>
				</table>
			</table>
			<br>
			<?php
			$insertar = mysqli_query($con,"INSERT INTO boleta(fecha,cliente,correo,total) values('$fecha','$nombre','$email','$suma')");
			if (!$insertar){
				echo "Error al guardar";
			}else{
				echo "Guardado con exito";
				$actualizar = mysqli_query($con,"UPDATE carrito SET estado='vendido' WHERE correo='$email'");
			}
			?>
			<br>
			<a href="../admin/orders.php">Volver atras</a>
	</div>
</body>
</html>