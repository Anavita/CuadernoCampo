<?php
    error_reporting(E_ALL ^ E_NOTICE);

    //Obtengo el timestamp del servidor de cuanto se hizo la petición
    $hora = $_SERVER["REQUEST_TIME"];

    $duracion = 10000;

    if (isset($_SESSION['ultima_actividad']) && ($hora - $_SESSION['ultima_actividad']) > $duracion) {
    session_unset();
    session_destroy();
    session_start();
    };
  
    //Defino el valor de la sesión "ultima_actividad" como el timestamp del servidor
    $_SESSION['ultima_actividad'] = $hora;
?>