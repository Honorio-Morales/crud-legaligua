<?php
include '../conexion/conexion.php';

$id = $con->real_escape_string(htmlentities($_GET['prod']));
$estado = $con->real_escape_string(htmlentities($_GET['st']));

$nuevoEstado = $estado == 'Activo' ? 'Inactivo' : 'Activo';

$up = $con->query("UPDATE productos SET estado='$nuevoEstado' WHERE idProductos='$id' ");

if ($up) {
    $mensaje = $nuevoEstado == 'Activo' ? 'El producto ha sido activado' : 'El producto ha sido desactivado';
    $tipo = 'success';
} else {
    $mensaje = $nuevoEstado == 'Activo' ? 'El producto no ha podido ser activado' : 'El producto no ha podido ser desactivado';
    $tipo = 'error';
}

$con->close();

// Redireccionar a la página con un mensaje de alerta
header("location:../extend/alerta.php?msj=$mensaje&c=prod&p=in&t=$tipo");
?>