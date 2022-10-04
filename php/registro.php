<?php
	//Conexión con la base datos
	require('conexiones.php');

	//Obtengo los datos que entran por el formulario de registro
	$namePOST = $_POST["nombreReg"];
	$lastnamePOST = $_POST["apellidosReg"];
	$userPOST = $_POST["correoReg"]; 
	$aliasPOST = $_POST["aliasReg"];
	$passPOST = $_POST["passReg"];

	//Filtro anti-XSS para proteger al usuario registrado de posibles ataques
	$namePOST = htmlspecialchars(mysqli_real_escape_string($conexion, $userPOST));
	$lastnamePOST = htmlspecialchars(mysqli_real_escape_string($conexion, $userPOST));
	$userPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $userPOST));
	$aliasPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $userPOST));
	$passPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $passPOST));

	//Defino la cantidad máxima de caracteres
	$maxCaracteresUsername = "100";
	$maxCaracteresPassword = "15";

	//Si los input son de mayor tamaño, se "paraliza" el resto del código y muestra la respuesta correspondiente
	if(strlen($userPOST) > $maxCaracteresUsername) {
		//var_dump("Entró en if 1");
		die('El nombre de usuario no puede superar los '.$maxCaracteresUsername.' caracteres');
	};
	//Lo mismo con el input de la contraseña
	if(strlen($passPOST) > $maxCaracteresPassword) {
		//var_dump("Entró en if 2");
		die('La contraseña no puede superar los '.$maxCaracteresPassword.' caracteres');
	};

	//Se pasa el input del usuario a minúsculas
	$userPOSTMinusculas = strtolower($userPOST);

	//Escribo la consulta necesaria
	$consultaUsuarios = "SELECT emailReg FROM `registro`";

	//Y obtengo los resultados
	$resultadoConsultaUsuarios = mysqli_query($conexion, $consultaUsuarios) or die(mysqli_error());
	$datosConsultaUsuarios = mysqli_fetch_array($resultadoConsultaUsuarios);
	$userBD = $datosConsultaUsuarios['emailReg'];

	//Si el input de usuario o contraseña está vacío, se muestra un mensaje de error
	//Si el valor del input del usuario es igual a alguno que ya exista en la bd, se muestra un mensaje de error
	if(empty($userPOST) || empty($passPOST)) {
		//var_dump("Entró en if 3");
		die('Debes introducir datos válidos');
	} else if ($userPOSTMinusculas == $userBD) {
		var_dump("Entró en if 4");
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

		//Consulta para introducir los datos
		$consulta = "INSERT INTO `registro` (emailReg, passReg) 
		VALUES ('$userPOST', '$passwordConSalt')";
		
		//Si los datos se introducen correctamente, mostramos los datos
		//Sino, mostramos un mensaje de error
		if(mysqli_query($conexion, $consulta)) {
			//var_dump("Entró en if 5");
			die('<script>$(".registro").val("");</script>
	Registrado con éxito <br>
	Ya puedes acceder a tu cuenta <br>
	<br>
	Datos:<br>
	Usuario: '.$userPOST.'<br>
	Contraseña: '.$passPOST);
		} else {
			die('Error');
		};
	};//Fin comprobación if(empty($userPOST) || empty($passPOST))
?>