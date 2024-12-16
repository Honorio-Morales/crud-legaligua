<?php include '../conexion/conexion.php';
    if (!isset($_SESSION['nick'])) {
    header(header: 'location:../');
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <script type="../js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- configuracion adicional -->
    <!-- <link rel="stylesheet" href="../css/sweetalert2.css"> -->
    <link rel="styleheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.15.8/sweetalert2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.css">
    <title>cabeceras</title>
</head>
<body class="">
    <main>
        <?php
            if ($_SESSION['nivel'] == 'ADMINISTRADOR') {
                include 'menu_admin.php';
            } elseif ($_SESSION['nivel'] == 'ASESOR') {
                include 'menu_asesor.php';
            } elseif ($_SESSION['nivel'] == 'VENDEDOR') {
                include 'menu_vendedor.php';
            } else {
                include 'menu_default.php'; 
            }
        ?>


