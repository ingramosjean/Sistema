<!DOCTYPE html>
<?php
session_start();
include "../Controlador/conexion.php";
$id=0;
?>
<html>
<head>
<title>De Todo Peru</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="De Todo Perú, muebles, ropa, motos, videojuegos" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="../js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->
<script src="../js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="../js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smooth-scrolling -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- //end-smooth-scrolling -->
</head>

<body>
<!-- header -->
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
						<li><a href="Contactenos.php">Contactenos</a></li>
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
<!-- //banner -->
<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<br><br>
			<?php
			if(isset($_SESSION["carrito"]) && !empty($_SESSION["carrito"])):
			?>
			<table class="table table-bordered">
				<thead>
					<th style="text-align:center">N°</th>
					<th style="text-align:center">CANTIDAD</th>
					<th style="text-align:center">PRODUCTO</th>
					<th style="text-align:center">PRECIO UNITARIO</th>
					<th style="text-align:center">TOTAL</th>
					<th></th>
				</thead>
				<?php
					foreach($_SESSION["carrito"] as $c):
					$productos = $con->query("select Id,Nombre, Precio FROM producto where Id=$c[Id]");
					$r=$productos->fetch_object();
					$id=$id+1;
				?>
				<tr>
					<td style="text-align:center" width="100"><?php echo $id;?></td>
					<td style="text-align:center" width="100"><?php echo $c["q"];?></td>
					<td style="text-align:center" width="300"><?php echo $r->Nombre; ?></td>
					<td style="text-align:center" width="200">S/ <?php echo $r->Precio; ?></td>
					<td style="text-align:center" width="200">S/ <?php echo $c["q"]*$r->Precio; ?></td>
					<td style="text-align:center" width="260"><?php $found = false; foreach ($_SESSION["carrito"] as $c) { if($c["Id"]==$r->Id){ $found=true; break; }}?>
					<a href="../Controlador/borrarcarrito.php?id=<?php echo $c["Id"];?>" class="btn btn-danger">Eliminar</a>
					</td>
				</tr>
				<?php endforeach;?>
			</table>
			<h3 align="right">LOS PRECIOS NO INCLUYEN IGV</h3>
				<form class="form-horizontal" method="post" action="../Controlador/proceso.php">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Email del cliente</label>
							<div class="col-sm-5">
								<input type="email" name="Email" required class="form-control" id="inputEmail3" placeholder="Email del cliente">
							</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-primary">Procesar Venta</button>
						</div>
					</div>
     			</form>
     			<?php else:?>
     				<p class="alert alert-warning">El carrito esta vacio.</p>
     			<?php endif;?>
     			<br><br><hr>
		</div>
	</div>
	<div class="w3l_related_products">
		<div class="container">
				<script type="text/javascript">
					$(window).load(function() {
						$("#flexiselDemo2").flexisel({
							visibleItems:4,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: {
								portrait: {
									changePoint:480,
									visibleItems: 1
								},
								landscape: {
									changePoint:640,
									visibleItems:2
								},
								tablet: {
									changePoint:768,
									visibleItems: 3
								}
							}
						});

					});
				</script>
				<script type="text/javascript" src="../js/jquery.flexisel.js"></script>
		</div>
	</div>
<!-- //checkout -->
<!-- newsletter -->
	<div class="newsletter">
		<div class="container">
			<div class="col-md-6 w3agile_newsletter_left">
				<h3>Mantengase informado</h3>
				<p>Cada mes tenemos nuevas ofertas, mantengase informado.</p>
			</div>
			<div class="col-md-6 w3agile_newsletter_right">
				<form action="#" method="post">
					<input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					<input type="submit" value="">
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //newsletter -->
<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-3 w3_footer_grid">
					<h3>Contactenos</h3>
					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Jr. Padre Urraca 386, San Miguel <span>Lima.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="tendenciassigloxxi@gmail.com">tendenciassigloxxi@gmail.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>1-5786159</li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Información</h3>
					<ul class="info">
						<li><a href="Nosotros.php">Acerca de</a></li>
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
