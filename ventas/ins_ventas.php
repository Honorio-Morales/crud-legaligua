<?php
include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$pago = htmlentities($_POST['pago']);
$fecha = htmlentities($_POST['fecha_registro']);
$cli = htmlentities($_POST['cli']);
$produ = htmlentities($_POST['produ']);
$precio = htmlentities($_POST['precio']);
$cantidad = htmlentities($_POST['cantidad']);
$id = '';
$total=$precio*$cantidad;

$ins = $con->prepare("INSERT INTO venta VALUES(?,?,?,?,?,?) ");
$ins->bind_param("isssss", $id, $fecha, $produ, $cli, $pago, $total);

if ($ins->execute()) {
  header('location:../extend/alerta.php?msj=Cliente registrado&c=cli&p=in&t=success');
}else {
  header('location:../extend/alerta.php?msj=El cliente no pudo ser registrado&c=cli&p=in&t=error');
}

  $ins->close();
  $con->close();
  }else {
    header('location:../extend/alerta.php?msj=Utiliza el formulario&c=cli&p=in&t=error');
  }

 ?>