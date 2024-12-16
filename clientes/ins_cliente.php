<?php
// Incluye la conexión a la base de datos
include '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtiene y sanitiza los datos del formulario
    $nombres = $con->real_escape_string(htmlentities($_POST['nombres']));
    $apellidos = $con->real_escape_string(htmlentities($_POST['apellidos']));
    $correo = $con->real_escape_string(htmlentities($_POST['correo']));
    $telefono = $con->real_escape_string(htmlentities($_POST['telefono']));
    $fechoingreso = $con->real_escape_string(htmlentities($_POST['fechoingreso']));
    $asesor = $con->real_escape_string(htmlentities($_POST['asesor'])); // Obtener el nombre del asesor

    // Validación de campos vacíos
    if (empty($nombres) || empty($apellidos) || empty($correo) || empty($telefono) || empty($fechoingreso) || empty($asesor)) {
        header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=cli&p=in&t=error');
        exit;
    }

    // Validación del nombre y apellido (solo letras y espacios)
    if (!preg_match("/^[a-zA-Z\s]+$/", $nombres)) {
        header('location:../extend/alerta.php?msj=El nombre contiene caracteres no permitidos&c=cli&p=in&t=error');
        exit;
    }

    if (!preg_match("/^[a-zA-Z\s]+$/", $apellidos)) {
        header('location:../extend/alerta.php?msj=El apellido contiene caracteres no permitidos&c=cli&p=in&t=error');
        exit;
    }

    // Validación del correo (formato válido)
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        header('location:../extend/alerta.php?msj=El correo electrónico no es válido&c=cli&p=in&t=error');
        exit;
    }

    // Validación del teléfono (solo números y longitud mínima/máxima)
    if (!preg_match("/^\d{7,15}$/", $telefono)) {
        header('location:../extend/alerta.php?msj=El teléfono debe contener entre 7 y 15 dígitos&c=cli&p=in&t=error');
        exit;
    }

    // Validación de la fecha (formato YYYY-MM-DD)
    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $fechoingreso)) {
        header('location:../extend/alerta.php?msj=La fecha de ingreso no es válida&c=cli&p=in&t=error');
        exit;
    }

    // Inserta los datos en la tabla clientes, incluyendo el asesor
    $ins = $con->query("INSERT INTO clientes (nombres, apellidos, correo, telefono, fechoingreso, asesor) 
                        VALUES ('$nombres', '$apellidos', '$correo', '$telefono', '$fechoingreso', '$asesor')");

    // Verifica si la inserción fue exitosa
    if ($ins) {
        header('location:../extend/alerta.php?msj=Cliente registrado correctamente&c=cli&p=in&t=success');
    } else {
        header('location:../extend/alerta.php?msj=El cliente no pudo ser registrado&c=cli&p=in&t=error');
    }

    // Cierra la conexión
    $con->close();
} else { // Si no se accede mediante el formulario
    header('location:../extend/alerta.php?msj=Acceso no permitido&c=cli&p=in&t=error');
}
?>
