<?php
include '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producto = $con->real_escape_string(htmlentities($_POST['producto']));
    $estado = $con->real_escape_string(htmlentities($_POST['estado']));
    $stock = (int)$_POST['stock'];
    $precio = (float)$_POST['precio'];

    if (empty($producto) || empty($estado) || empty($stock) || empty($precio)) {
        header('Location: ../extend/alerta.php?msj=Hay un campo sin especificar&c=prod&p=in&t=error');
        exit;
    }

    $insertar = $con->query("INSERT INTO productos (Nombre, estado, stock, precio) VALUES ('$producto', '$estado', $stock, $precio)");

    if ($insertar) {
        header('Location: ../extend/alerta.php?msj=Producto agregado correctamente&c=prod&p=in&t=success');
    } else {
        header('Location: ../extend/alerta.php?msj=Error al agregar producto&c=prod&p=in&t=error');
    }

    $con->close();
} else {
    header('Location: ../extend/alerta.php?msj=Utiliza el formulario para agregar productos&c=prod&p=in&t=error');
}
?>