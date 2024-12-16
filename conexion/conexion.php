<?php
// Conexión a la base de datos
$con = new mysqli("localhost", "root", "", "sistemax_2", 3306); // 3306 es el puerto por defecto de MySQL

@session_start();
// Verificar la conexión
if ($con->connect_error) {
    die("Error de conexión: " . $con->connect_error);
}

// Configurar el conjunto de caracteres
$con->set_charset("utf8");

echo "Conexión exitosa";
?>
