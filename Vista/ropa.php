<!DOCTYPE html>
<?php
session_start();
include "../Controlador/conexion.php";
$q = "SELECT Imagen FROM producto WHERE Categoria='ROPA'";
$result = mysqli_query($con,$q) or die ("Error al consultar");
$img = mysqli_fetch_assoc($result);
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
<script>
		$('#myModal88').modal('show');
	</script>
	<div class="header">
		<div class="container">
			<div class="w3l_logo">
				<a href="../index.html"><img src="../images/logo.jpg"></a>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<li class="active"><a href="../index.html" class="act">Inicio</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Productos<b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<!-- <div class="col-sm-2">
										<ul class="multi-column-dropdown">
											<h6>Ropa</h6>
											<li><a href="ropa.php">Vestidos</a></li>
										</ul>
									</div> -->
									<div class="col-sm-2">
										<ul class="multi-column-dropdown">
											<h6>Muebles</h6>
											<li><a href="juegodesala.php">Juego de Sala</a></li>
											<li><a href="dormitorio.php">Dormitorios</a></li>
										</ul>
									</div>
									<div class="col-sm-2">
										<ul class="multi-column-dropdown">
											<h6>Comedores</h6>
											<li><a href="comedor.php">Comedores</a></li>
										</ul>
									</div>									
									<!--  <div class="col-sm-2">
										<ul class="multi-column-dropdown">
											<h6>Linea Blanca</h6>
											<li><a href="blanca.php">Linea Blanca</a></li>
										</ul>
									</div> -->
									<div class="col-sm-2">
										<ul class="multi-column-dropdown">
											<h6>Motocicletas</h6>
											<li><a href="motos.php">Motocicletas</a></li>
										</ul>
									</div>
								</div>
							</ul>
						</li>
						<li><a href="Nosotros.php">Acerca de Nosotros</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
<!-- //header -->
<!-- banner -->
	<div class="banner" id="home1">
		<div class="container">
		</div>
	</div>
<?php
$products = $con->query("select * from producto where Categoria='ROPA'");
?>
<table class="table table-bordered">
<thead>
	<th></th>
	<th style="text-align:center">PRODUCTO</th>
	<th style="text-align:center">PRECIO</th>
	<th></th>
</thead>
<?php
while($r=$products->fetch_object()):
?>
<tr>
	<td align="center" width="200"><img height="200" src="data:image/jpg;base64,<?php echo base64_encode($img['Imagen']);?>"/></td>
	<td style="text-align:center" width="400"><?php echo $r->Nombre;?></td>
	<td style="text-align:center" width="200">S/ <?php echo $r->Precio; ?></td>
	<td style="width:300px;">
	<?php
	$found = false;
	if(isset($_SESSION["carrito"])){ foreach ($_SESSION["carrito"] as $c) { if($c["Id"]==$r->Id){ $found=true; break; }}}
	?>
	<?php if($found):?>
		<a href="carrito.php" class="btn btn-info">Agregado</a>
	<?php else:?>
	<form class="form-inline" method="post" action="../Controlador/acarritoropa.php">
  <input type="hidden" name="Id" value="<?php echo $r->Id; ?>">
	  <div class="form-group">
	    <input type="number" name="q" value="1" style="width:100px;" min="1" class="form-control" placeholder="Cantidad">
	  </div>
	  <button type="submit" class="btn btn-primary">Agregar al carrito</button>
	</form>	
	<?php endif; ?>
	</td>
</tr>
<?php endwhile; ?>
</table>
<br><br><hr>
<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-3 w3_footer_grid">
					<h3>Contactenos</h3>
					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Jr. Padre Urraca 386, San Miguel <span>Lima.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="tendenciassigloxxi@gmail.com">tendenciassigloxxi@gmail.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>15786159</li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Información</h3>
					<ul class="info">
						<li><a href="#">Acerca de</a></li>
						<li><a href="Nosotros.php">Contactenos</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Categorias</h3>
					<ul class="info">
						<li><a href="ropa.php">Ropa</a></li>
						<li><a href="juegodesala.php">Muebles</a></li>
						<li><a href="comedor.php">Comedores</a></li>
						<li><a href="blanca.php">Linea Blanca</a></li>
						<li><a href="motos.php">Motocicletas</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Mi estado</h3>
					<ul class="info">
						<li><a href="carrito.php">Mi Carrito</a></li>
					</ul>
					<h4>Siguenos</h4>
					<div class="agileits_social_button">
						<ul>
							<li><a href="#" class="facebook"> </a></li>
							<li><a href="#" class="twitter"> </a></li>
						</ul>
					</div>

				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="footer-copy">
			<div class="footer-copy1">
				<div class="footer-copy-pos">
					<a href="#home1" class="scroll"><img src="../images/arrow.png" alt=" " class="img-responsive" /></a>
				</div>
			</div>
			<div class="container">
				<p>2017 De Todo Peru</p>
			</div>
		</div>
	</div>
<!-- //footer -->
</body>
</html>