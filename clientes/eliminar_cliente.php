<?php 
// Incluye la conexión a la base de datos
include '../conexion/conexion.php';

// Obtiene y sanitiza el ID del cliente
$id = $con->real_escape_string(htmlentities($_GET['idClientes']));

// Realiza la consulta para eliminar al cliente
$del = $con->query("DELETE FROM clientes WHERE idClientes='$id'");

// Verifica si la consulta fue exitosa
if ($del) {
    header('location:../extend/alerta.php?msj=Cliente eliminado&c=cli&p=in&t=success');
} else {
    header('location:../extend/alerta.php?msj=El cliente no pudo ser eliminado&c=cli&p=in&t=error');
}

// Cierra la conexión
$con->close();
?>