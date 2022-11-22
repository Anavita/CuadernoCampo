<?php
    session_start();

    require('conexiones.php');

    //Desestablecer todas las sesiones
    unset($_SESSION);

    //Sesión destruída
    session_destroy();

    //Cierre de sesión con la BD
    mysqli_close($conexion);

    //Redirección a index.php
    header("Location: ../index.php");
    die();
?>
