<?php
	require('conexiones.php');

	//Datos formulario de registro
	$namePOST = $_POST["nombreReg"];
	$lastnamePOST = $_POST["apellidosReg"];
	$userPOST = $_POST["correoReg"]; 
	$aliasPOST = $_POST["aliasReg"];
	$passPOST = $_POST["passReg"];

	//Defino la cantidad máxima de caracteres, tal cual tengo en la tabla bd "registro"
	$maxCaracteresName = "20";
	$maxCaracteresLastname = "50";
	$maxCaracteresUsername = "100";
	$maxCaracteresAlias = "15";
	$maxCaracteresPassword = "15";

	//Si los input son de mayor tamaño, se paraliza el resto del código y muestra la respuesta correspondiente
	if(strlen($namePOST) > $maxCaracteresName) {

		die('El nombre de usuario no puede superar los '.$maxCaracteresName.' caracteres');
	};
	if(strlen($lastnamePOST) > $maxCaracteresLastname) {
	
		die('Los apellidos de usuario no pueden superar los '.$maxCaracteresLastname.' caracteres');
	};
	if(strlen($userPOST) > $maxCaracteresUsername) {
		
		die('El correo de usuario no puede superar los '.$maxCaracteresUsername.' caracteres');
	};
	if(strlen($aliasPOST) > $maxCaracteresAlias) {

		die('El alias de usuario no puede superar los '.$maxCaracteresName.' caracteres');
	};
	if(strlen($passPOST) > $maxCaracteresPassword) {
		die('La contraseña no puede superar los '.$maxCaracteresPassword.' caracteres');
	};

	//Se pasa el input del correo de usuario a minúsculas
	$userPOSTMinusculas = strtolower($userPOST);

	//Escribo la consulta necesaria
	$consultaUsuarios = "SELECT emailReg FROM `registro`";

	//Y obtengo los resultados
	$resultadoConsultaUsuarios = mysqli_query($conexion, $consultaUsuarios) or die(mysqli_error());
	$datosConsultaUsuarios = mysqli_fetch_array($resultadoConsultaUsuarios);
	$userBD = $datosConsultaUsuarios['emailReg'];

	//Si el input del correo de usuario o contraseña está vacío, se muestra un mensaje de error
	//Si el valor del input del usuario es igual a alguno que ya exista en la bd, se muestra un mensaje de error
	if(empty($userPOST) || empty($passPOST)) {
		die('Debes introducir datos válidos');
	} else if ($userPOSTMinusculas == $userBD) {
		die('Ya existe un usuario con esa dirección de correo '.$userPOST.'');
	}
	else {
	//Si no hay errores, se procede a encriptar la contraseña
		function aleatoriedad() {
			$caracteres = "abcdefghijklmnopqrstuvwxyz1234567890";
			$nueva_clave = "";
			for ($i = 5; $i < 35; $i++) {
				$nueva_clave .= $caracteres[rand(5,35)];
			};
			return $nueva_clave;
		};

		$aleatorio = aleatoriedad();
		$valor = "07";
		$salt = "$2y$".$valor."$".$aleatorio."$";

		$passwordConSalt = crypt($passPOST, $salt);

		//Consulta para introducir los datos (con la contraseña encriptada)
		$consulta = "INSERT INTO `registro` (nombreReg, apellidosReg, emailReg, aliasReg, passReg) 
		VALUES ('$namePOST','$lastnamePOST','$userPOST','$aliasPOST', '$passwordConSalt')";
		
		//Si los datos se introducen correctamente, se muestran los datos
		//Sino, emerge un mensaje de error
		if(mysqli_query($conexion, $consulta)) {
			die('<script>$(".registro").val("");</script>
	Registrado con éxito <br>
	Ya puedes acceder a tu cuenta <br>
	<br>
	Datos:<br>
	Correo Usuario: '.$userPOST.'<br>
	Contraseña: '.$passPOST);
		} else {
			die('Error');
		};
	};
?>