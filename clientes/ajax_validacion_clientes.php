<?php
include '../conexion/conexion.php';

$clientes = $con->real_escape_string($_POST['clientes']);

$sel = $con->query("SELECT idClientes FROM clientes WHERE nombres ='$clientes'");
$row = mysqli_num_rows($sel);

if ($row != 0) {
    echo "<label style='color:red;'>El nombre del clientes ya existe</label>";
} else {
    echo "<label style='color:green;'>El nombre del clientes está disponible</label>";
}

$con->close();
?>
