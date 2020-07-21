<!DOCTYPE html>
<?php
session_start();
include "../Controlador/conexion.php";
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
<!-- Acerca de Nosotros -->
	<p><b>---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</b></p>
	<h3 align="center">ACERCA DE NOSOTROS</h3>
	<p>Actualmente Tendencias Siglo XXI cuenta con el respaldo de mas de 15 años de experiencia y trabajo en el mercado de muebles y electrodomésticos para el hogar, comercializando productos de primera calidad y a la vanguardia de nuevas tendencias para la satisfacción de nuestros clientes; además venimos dando facilidades y créditos a Instituciones públicas y privadas.
	Teniendo sobre todo una atención personalizada y profesional por parte de nuestros colaboradores del departamento de ventas.
	Cabe resaltar que debemos mucho a nuestros clientes ya que gracias a sus criticas constructivas y sobre todo a su gran exigencia se convierten en un gran motor que nos impulsa a optimizar nuestros productos día a día.</p>
	<p><b>---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</b></p>
	<h4 align="center">MISIÓN</h4>
	<p>Satisfacer los requerimientos de nuestros clientes, en el equipamiento de muebles y electrodomésticos para su hogar brindando diseños exclusivos, únicos e innovadores y sobre todo, brindar productos de gran calidad, comodidad, elegancia y durabilidad.</p>
<!-- //Acerca de Nosotros -->
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
						<li><a href="Nosotros.php">Acerca de</a></li>
						<li><a href="#">Contactenos</a></li>
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
</body>
</html>