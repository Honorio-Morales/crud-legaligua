<?php
include '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nick = htmlentities($_POST['nick']);
    $nombre = htmlentities($_POST['nombre']);
    $pass1 = htmlentities($_POST['pass1']);
    $pass2 = htmlentities($_POST['pass2']);
    $correo = htmlentities($_POST['correo']);
    $nivel = htmlentities($_POST['nivel']);
    $foto = $_FILES['foto'];

    // Validar que las contraseñas coincidan
    if ($pass1 !== $pass2) {
        header('location:../extend/alerta.php?msj=Las contraseñas no coinciden&c=us&p=in&t=error');
        exit;
    }

    // Validar longitud del nick
    if (strlen($nick) < 5 || strlen($nick) > 15) {
        header('location:../extend/alerta.php?msj=El nick debe tener entre 5 y 15 caracteres&c=us&p=in&t=error');
        exit;
    }

    // Validar longitud de la contraseña
    if (strlen($pass1) < 8 || strlen($pass1) > 15) {
        header('location:../extend/alerta.php?msj=La contraseña debe tener entre 8 y 15 caracteres&c=us&p=in&t=error');
        exit;
    }

    // Validar correo electrónico
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        header('location:../extend/alerta.php?msj=El correo no es válido&c=us&p=in&t=error');
        exit;
    }

    // Procesar la foto
// Procesar la foto
	$ruta = 'foto_perfil'; // Ruta por defecto (relativa a la raíz del servidor)
	if ($foto['tmp_name'] != '') {
		$ext_permitidas = ['png', 'jpg', 'jpeg'];
		$ext_actual = strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION));

		// Validar si la extensión es permitida
		if (!in_array($ext_actual, $ext_permitidas)) {
			header('location:../extend/alerta.php?msj=El formato no es válido (solo png, jpg, jpeg)&c=us&p=in&t=error');
			exit;
		}

		// Ruta absoluta para mover el archivo
		$ruta_destino = __DIR__ . '/foto_perfil/' . $nick . '.' . $ext_actual;

		// Mover el archivo al directorio destino
		if (!move_uploaded_file($foto['tmp_name'], $ruta_destino)) {
			header('location:../extend/alerta.php?msj=No se pudo cargar la foto&c=us&p=in&t=error');
			exit;
		}

		// Guardar la ruta en la base de datos (relativa al directorio público)
		$ruta = 'foto_perfil/' . $nick . '.' . $ext_actual;
	}


    // Encriptar la contraseña
    $pass1 = sha1($pass1);

    // Insertar en la base de datos
    $stmt = $con->prepare("INSERT INTO Usuario (nick, nombre, pass, correo, nivel, bloqueo, foto) VALUES (?, ?, ?, ?, ?, 1, ?)");
    if ($stmt) {
        $stmt->bind_param("ssssss", $nick, $nombre, $pass1, $correo, $nivel, $ruta);
        if ($stmt->execute()) {
            header('location:../extend/alerta.php?msj=Usuario registrado con éxito&c=us&p=in&t=success');
        } else {
            header('location:../extend/alerta.php?msj=Error al registrar usuario: ' . $stmt->error . '&c=us&p=in&t=error');
        }
        $stmt->close();
    } else {
        header('location:../extend/alerta.php?msj=Error al preparar consulta: ' . $con->error . '&c=us&p=in&t=error');
    }
    $con->close();
} else {
    header('location:../extend/alerta.php?msj=Método no permitido&c=us&p=in&t=error');
}
?>
