<?php
//Reanudamos la sesión
session_start();

//Comprobamos si el usario está logueado
//Si no lo está, se le redirecciona al index
//Si lo está, definimos el botón de cerrar sesión y la duración de la sesión
if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
	header('Location: index.php');
} else {
	$estado = $_SESSION['usuario'];
	$salir = '<a href="sesiones/salir.php" target="_self">Cerrar sesión</a>';
	require('sesiones/sesiones.php');
};
?>