<?php
	
	//Conexión con la base de datos
	require('conexiones.php');

	//Obtengo los datos del formulario de acceso
	//var_dump($_POST);
	$userPOST = $_POST["correoLogin"]; 
	$passPOST = $_POST["passLogin"];

	//Filtro anti-XSS
	$userPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $userPOST));
	$passPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $passPOST));

	//Se define la cantidad máxima de caracteres
	$maxCaracteresUsername = "100";
	$maxCaracteresPassword = "15";

	//Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente
	if(strlen($userPOST) > $maxCaracteresUsername) {
		//var_dump("Entró en if 1");
		die('El nombre de usuario no puede superar los '.$maxCaracteresUsername.' caracteres');
	};

	if(strlen($passPOST) > $maxCaracteresPassword) {
		die('La contraseña no puede superar los '.$maxCaracteresPassword.' caracteres');
	};

	//Se pasa el input del usuario a minúsculas para compararlo después con
	//el campo "usernamelowercase" de la base de datos
	$userPOSTMinusculas = strtolower($userPOST);

	//Consulta BD
	$consulta = "SELECT * FROM `registro` WHERE emailReg='".$userPOSTMinusculas."'";

	//Y obtención de los resultados
	$resultado = mysqli_query($conexion, $consulta);
	$datos = mysqli_fetch_array($resultado);

	//Se guardan los resultados del nombre de usuario en minúsculas
	//y de la contraseña de la base de datos
	$userBD = $datos['emailReg'];
	$passwordBD = $datos['passReg'];

	//Se comprueban si los datos son correctos
	if($userBD == $userPOSTMinusculas /*and password_verify($passPOST, $passwordBD)*/){
		session_start();
		$_SESSION['usuario'] = $datos['emailReg'];
		$_SESSION['estado'] = 'Autenticado';

		/* Sesión iniciada, si se desea, se puede redireccionar desde el servidor */

	//Si los datos no son correctos, o están vacíos, muestra un error
	//Además, hay un script que vacía los campos con la clase "acceso" (formulario)
	} else if ( $userBD != $userPOSTMinusculas || 
	$userPOST == "" ||
	 $passPOST == "" /*|| !password_verify($passPOST, $passwordBD)*/ ) {
		die ('<script>$(".acceso").val("");</script>
	Los datos de acceso son incorrectos.');
	} else {
		die('Error');
	};

?>