<?php
	//Inicio de sesión
	session_start();

	//Código para evitar que salgan notices de PHP
	error_reporting(E_ALL ^ E_NOTICE);

	//Se comprueba si la sesión está iniciada y se reedirige al usuario a una u otra página según sea el caso. 
	if(isset($_SESSION['usuario']) and $_SESSION['estado'] == 'Autenticado') {
		include('pagina.php');
		die();
	} else {
		include('login.php');
		die();
	};
?>