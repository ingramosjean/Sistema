<!doctype html>
<?php
session_start();
include "../Controlador/conexion.php";
$hoy=date("Y") . "/" . date("m") . "/" . date("d");
$query = "SELECT C.NombreCliente,C.Correo_Electronico,P.Nombre,P.Precio,P.Categoria,Pc.q,Pc.producto_id,Ca.correo,Ca.dia FROM cliente C, producto P, producto_carrito Pc, carrito Ca WHERE Ca.correo=C.Correo_Electronico && P.Id=Pc.producto_id && Ca.Id=Pc.carrito_id && Ca.estado='vendido'";
$q2 = "SELECT P.Precio,Pc.q FROM cliente C, producto P, producto_carrito Pc, carrito Ca WHERE Ca.correo=C.Correo_Electronico && P.Id=Pc.producto_id && Ca.Id=Pc.carrito_id";
$q3 = "SELECT max(id) as maxve FROM boleta WHERE fecha = '$hoy'";
$q4 = "SELECT max(Id) as maxpe FROM carrito WHERE dia = '$hoy'";
$cliente = mysqli_query($con,$query);
$total = mysqli_query($con,$q2);
$nv = mysqli_query($con,$q3);
$np = mysqli_query($con,$q4);
$suma=0;
$visitas = $_POST['visitas'];
?>
<html>
<head>
<meta charset="utf-8">
<title>Reportes</title>
<a href="../admin/index.php" onClick="window.close();">Volver atras</a>
</head>
<body>
<!-- www.contadorvisitasgratis.com/geozoom.php?c=sj9uwbkxuwyrc6zwgmyyrbzwr2hkerep&base=counter6 -->
<h1 align="center">REPORTES</h1>
<div>
		<div>
		<h2>REPORTE 1: COMPRAS DE CLIENTES</h2>
			<table class="table table-bordered" title="Compras de clientes">
				<thead>
					<th>CLIENTE</th>				
					<th>PRODUCTO</th>
					<th>CANTIDAD</th>
					<th>TOTAL</th>
					<th></th>
				</thead>
				<?php while ($r = mysqli_fetch_assoc($cliente)){ ?>									
				<tr>				
					<td style="text-align:center" width="400"><?php echo $r['NombreCliente']; ?></td>
					<td style="text-align:center" width="400"><?php echo $r['Nombre']; ?></td>
					<td><?php echo $r['q'];?></td>
					<?php $precio = $r['q']*($r['Precio']+$r['Precio']*0.18);?>
					<td style="text-align:center" width="200">S/ <?php echo $precio; ?></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td></td>
					<td></td>
					<td>TOTAL</td>
					<?php while ($r2 = mysqli_fetch_assoc($total)){
						$suma = $r2['q']*($r2['Precio']+$r2['Precio']*0.18)+$suma;
					}
					?>
					<td style="text-align:center" width="200"><hr>S/ <?php echo $suma; ?></td>					
				</tr>
			</table>
			<br><br>
		</div>
		<div>	
			<h2>REPORTE 2: INDICADOR VENTAS POR CLIENTE</h2>			
			<table class="table table-bordered" title="Compras de clientes" border="1">
				<thead>
					<th>N° CLIENTES</th>
					<th>VENTAS</th>
					<th>INDICADOR VxC</th>
				</thead>
				<?php $n = mysqli_fetch_assoc($nv)?>
				<tr>
					<td style="text-align:center" width="400"><?php echo $visitas ?></td>
					<?php $maxve = $n['maxve']; ?>
					<td style="text-align:center" width="400"><?php echo $maxve; ?></td>
					<td style="text-align:center" width="400"><?php echo $maxve/$visitas;?></td>
				</tr>				
			</table>
		</div>
		<div>	
			<h2>REPORTE 3: INDICADOR VENTAS POR PEDIDO</h2>			
			<table class="table table-bordered" title="Compras de clientes" border="1">
				<thead>
					<th>N° PEDIDOS</th>
					<th>VENTAS</th>
					<th>INDICADOR VxP</th>
				</thead>
				<?php $n2 = mysqli_fetch_assoc($np)?>
				<tr>
				<?php $maxpe = $n2['maxpe']; ?>
					<td style="text-align:center" width="400"><?php echo $maxpe ?></td>
					<td style="text-align:center" width="400"><?php echo $maxve;?></td>
					<td style="text-align:center" width="400"><?php echo $maxpe/$maxve;?></td>
				</tr>
			</table>
		</div>
</div>
</body>
</html>