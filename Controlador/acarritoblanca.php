<?php
session_start();
if(!empty($_POST)){
	if(isset($_POST["Id"]) && isset($_POST["q"])){
		if(empty($_SESSION["carrito"])){
			$_SESSION["carrito"]=array( array("Id"=>$_POST["Id"],"q"=> $_POST["q"]));
		}else{
			$cart = $_SESSION["carrito"];
			$repeated = false;
			foreach ($cart as $c) {
				if($c["Id"]==$_POST["Id"]){
					$repeated=true;
					break;
				}
			}
			if($repeated){
				print "<script>alert('Error: Producto Repetido!');</script>";
			}else{
				array_push($cart, array("Id"=>$_POST["Id"],"q"=> $_POST["q"]));
				$_SESSION["carrito"] = $cart;
			}
		}
		print "<script>window.location='../Vista/blanca.php';</script>";
	}
}
?>