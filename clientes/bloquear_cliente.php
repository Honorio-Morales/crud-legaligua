<?php 
// Incluye la conexión a la base de datos
include '../conexion/conexion.php';

// Obtiene y sanitiza el ID del cliente
$id = $con->real_escape_string(htmlentities($_GET['idClientes']));
$accion = isset($_GET['accion']) ? $_GET['accion'] : '';

// Realiza la acción de bloquear o desbloquear
if ($accion === 'desbloquear') {
    // Desbloquear el cliente: eliminamos su registro de la tabla bloqueados
    $eliminar = $con->query("DELETE FROM bloqueados WHERE idClientes = '$id'");
    
    if ($eliminar) {
        // Redirige con un mensaje de éxito
        header('location:../extend/alerta.php?msj=Cliente desbloqueado&c=cli&p=in&t=success');
    } else {
        // Redirige con un mensaje de error
        header('location:../extend/alerta.php?msj=El cliente no pudo ser desbloqueado&c=cli&p=in&t=error');
    }
} else {
    // Bloquear el cliente: insertamos su ID en la tabla bloqueados
    $bloquear = $con->query("INSERT INTO bloqueados (idClientes) VALUES ('$id')");
    
    if ($bloquear) {
        // Redirige con un mensaje de éxito
        header('location:../extend/alerta.php?msj=Cliente bloqueado&c=cli&p=in&t=success');
    } else {
        // Redirige con un mensaje de error
        header('location:../extend/alerta.php?msj=El cliente no pudo ser bloqueado&c=cli&p=in&t=error');
    }
}

// Cierra la conexión
$con->close();
?>
