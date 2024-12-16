<?php
include '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['Estado'])) {
    $id = $con->real_escape_string(htmlentities($_POST['id']));
    $nuevo_estado = $con->real_escape_string(htmlentities($_POST['Estado']));

    // Actualizar el estado del producto en la base de datos
    $update = $con->query("UPDATE productos SET Estado='$nuevo_estado' WHERE idProductos='$id'");

    if ($update) {
        $mensaje = "El estado del producto ha sido actualizado correctamente.";
        $tipo = "success";
    } else {
        $mensaje = "Error al actualizar el estado del producto.";
        $tipo = "error";
    }

    $con->close();

    // Redireccionar a la página con un mensaje de alerta
    header("location:../extend/alerta.php?msj=$mensaje&c=prod&p=in&t=$tipo");
} else {
    header("location:../extend/alerta.php?msj=Solicitud inválida.&c=prod&p=in&t=error");
}
?>
