<?php
	require('conexiones.php');

	//Datos del formulario de acceso
	$userPOST = $_POST["correoLogin"]; 
	$passPOST = $_POST["passLogin"];

	//Cantidad máxima de caracteres
	$maxCaracteresUsername = "100";
	$maxCaracteresPassword = "15";

	//Si los input son de mayor tamaño, se paraliza el resto del código y muestra la respuesta correspondiente
	if(strlen($userPOST) > $maxCaracteresUsername) {
		die('El nombre de usuario no puede superar los '.$maxCaracteresUsername.' caracteres');
	};

	if(strlen($passPOST) > $maxCaracteresPassword) {
		die('La contraseña no puede superar los '.$maxCaracteresPassword.' caracteres');
	};

	//Se pasa el input del usuario a minúsculas para compararlo después con
	//el campo de la base de datos
	$userPOSTMinusculas = strtolower($userPOST);

	//Consulta BD
	$consulta = "SELECT * FROM `registro` WHERE emailReg='".$userPOSTMinusculas."'";

	//Resultados
	$resultado = mysqli_query($conexion, $consulta);
	$datos = mysqli_fetch_array($resultado);

	//Se guardan los resultados del nombre de usuario en minúsculas
	//y de la contraseña de la base de datos
	$userBD = $datos['emailReg'];
	$passwordBD = $datos['passReg'];

	//Se comprueban los datos. Si son correctos se inicia la sesión
	if($userBD == $userPOSTMinusculas){
		session_start();
		$_SESSION['usuario'] = $datos['emailReg'];
		$_SESSION['estado'] = 'Autenticado';
		$_SESSION['idUsuarioReg'] = $datos['idUsuarioReg'];

	//Si los datos no son correctos, o están vacíos, muestra un error
	} else if ( $userBD != $userPOSTMinusculas || 
	$userPOST == "" ||
	 $passPOST == "") {
		die ('<script>$(".acceso").val("");</script>
	Los datos de acceso son incorrectos.');
	} else {
		die('Error');
	};
?>