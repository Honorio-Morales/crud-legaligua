<?php
	include '../conexion/conexion.php';
	$idProducto=$con->real_escape_string($_POST['idProducto']);
	$sel=$con->query("SELECT idDetalleVenta FROM detalleventa WHERE idProducto='$idProducto' ");
	$row=mysqli_num_rows($sel);
	if($row !=0)
	{ 
		echo"<label style='color:red; '>El detalle de venta ya no existe</label>";
	}
	else
	{ 
		echo"<label style='color:green; '>El detale de venta esta disponible</label>";
	}
	$con->close();
?>