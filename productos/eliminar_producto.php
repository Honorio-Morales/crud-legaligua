<?php
include '../conexion/conexion.php';

$id = $con->real_escape_string(htmlentities($_GET['id']));

$del = $con->query("DELETE FROM productos WHERE idProducto='$id' ");

if ($del) {
    $mensaje = "El producto ha sido eliminado correctamente";
    $tipo = "success";
} else {
    $mensaje = "Error al eliminar el producto";
    $tipo = "error";
}

$con->close();

// Redireccionar a la página con un mensaje de alerta
header("location:../extend/alerta.php?msj=$mensaje&c=prod&p=in&t=$tipo");
?>