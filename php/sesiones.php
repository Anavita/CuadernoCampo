<?php
    //Evitar notices en php
    error_reporting(E_ALL ^ E_NOTICE);

    //Obtengo el timestamp del servidor de cuanto se hizo la petición
    $hora = $_SERVER["REQUEST_TIME"];

    //Duración de la sesión en segundos
    $duracion = 1800;

    //Si el tiempo de la petición es mayor al tiempo permitido de la duración, 
    //destruye la sesión y crea una nueva
    if (isset($_SESSION['ultima_actividad']) && ($hora - $_SESSION['ultima_actividad']) > $duracion) {
    session_unset();
    session_destroy();
    session_start();
    };
    // * Por esto este archivo debe ser incluido en cada página que necesite comprobar las sesiones

    //Defino el valor de la sesión "ultima_actividad" como el timestamp del servidor
    $_SESSION['ultima_actividad'] = $hora;
?>