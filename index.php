<?php
//Inicio de sesión
session_start();

//Código para evitar que salgan los NOTICES de PHP
error_reporting(E_ALL ^ E_NOTICE);

//Se comprueba si la sesión está iniciada
//Si existe una sesión correcta, se pasa a mostrar la página para los usuarios registrados
//En caso contrario, aparece la página de acceso y registro de usuarios
if(isset($_SESSION['usuario']) and $_SESSION['estado'] == 'Autenticado') {
	include('pagina.php');
	die();
} else {
	include('login.php');
	die();
};
?>