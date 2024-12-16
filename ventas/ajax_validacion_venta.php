<?php
	include '../conexion/conexion.php';
	$descripcion=$con->real_escape_string($_POST['descripcion']);
	$sel=$con->query("SELECT idVenta FROM venta WHERE descripcion='$descripcion' ");
	$row=mysqli_num_rows($sel);
	if($row !=0)
	{ 
		echo"<label style='color:red; '>El número de venta ya existe</label>";
	}
	else
	{ 
		echo"<label style='color:green; '>El número de venta esta disponible</label>";
	}
	$con->close();
?>