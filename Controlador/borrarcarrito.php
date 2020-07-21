<?php
session_start();
if(!empty($_SESSION["carrito"])){
	$cart  = $_SESSION["carrito"];
	if(count($cart)==1){
		unset($_SESSION["carrito"]);
	}else if(count($cart>1)){
		$newcart = array();
		foreach($cart as $c){
			if($c["Id"]!=$_GET["Id"]){
				$newcart[] = $c;
			}
		}
		$_SESSION["carrito"] = $newcart;
	}else{
		$newcart = array();
		foreach($cart as $c){
			if($c["Id"]!=$_GET["Id"]){
				$newcart[] = $c;
			}
		}
		$_SESSION["carrito"] = $newcart;
	}
}
print "<script>window.location='../Vista/carrito.php';</script>";
?>