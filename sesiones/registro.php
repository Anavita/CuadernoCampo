<?php
//Conectamos a la base de datos
require('../../conexion.php');

//Obtenemos los datos del formulario de registro
$userPOST = $_POST["correoReg"]; 
$passPOST = $_POST["passReg"];

//Filtro anti-XSS
$userPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $userPOST));
$passPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $passPOST));

//Definimos la cantidad máxima de caracteres
//Esta comprobación se tiene en cuenta por si se llegase a modificar el "maxlength" del formulario
//Los valores deben coincidir con el tamaño máximo de la fila de la base de datos
$maxCaracteresUsername = "20";
$maxCaracteresPassword = "60";

//Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente
if(strlen($userPOST) > $maxCaracteresUsername) {
	die('El nombre de usuario no puede superar los '.$maxCaracteresUsername.' caracteres');
};

if(strlen($passPOST) > $maxCaracteresPassword) {
	die('La contraseña no puede superar los '.$maxCaracteresPassword.' caracteres');
};

//Pasamos el input del usuario a minúsculas para compararlo después con
//el campo "usernamelowercase" de la base de datos
$userPOSTMinusculas = strtolower($userPOST);

//Escribimos la consulta necesaria
$consultaUsuarios = "SELECT usernamelowercase FROM `mmv005`";

//Obtenemos los resultados
$resultadoConsultaUsuarios = mysqli_query($conexion, $consultaUsuarios) or die(mysql_error());
$datosConsultaUsuarios = mysqli_fetch_array($resultadoConsultaUsuarios);
$userBD = $datosConsultaUsuarios['usernamelowercase'];

//Si el input de usuario o contraseña está vacío, mostramos un mensaje de error
//Si el valor del input del usuario es igual a alguno que ya exista, mostramos un mensaje de error
if(empty($userPOST) || empty($passPOST)) {
	die('Debes introducir datos válidos');
} else if ($userPOSTMinusculas == $userBD) {
	die('Ya existe un usuario con el nombre '.$userPOST.'');
}
else {
//Si no hay errores, procedemos a encriptar la contraseña
//Lectura recomendada: https://mimentevuela.wordpress.com/2015/10/08/establecer-blowfish-como-salt-en-crypt-2/
	
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

	//Armamos la consulta para introducir los datos
	$consulta = "INSERT INTO `mmv005` (username, usernamelowercase, password) 
	VALUES ('$userPOST', '$userPOSTMinusculas' , '$passwordConSalt')";
	
	//Si los datos se introducen correctamente, mostramos los datos
	//Sino, mostramos un mensaje de error
	if(mysqli_query($conexion, $consulta)) {
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