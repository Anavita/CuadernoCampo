<?php

    require('conexiones.php');
	//Conexión con la base datos
    var_dump($_POST);


	//Obtengo los datos que entran por el formulario de creación de ficha
	$nomPOST = $_POST["nombreFicha"];
	$coordenadasPOST = $_POST["coordenadasFicha"];
	$fechaPOST = $_POST["fechaFicha"]; 
	$horaPOST = $_POST["horaFicha"];
	$cieloPOST = $_POST["cieloFicha"];
    $climaPOST = $_POST["climaFicha"];
    $nomEspPOST = $_POST["nomEspFicha"];
    $nomCiePOST = $_POST["nomCieFicha"];
    $vertInvertPOST = $_POST["vertInvertFicha"];
    $alimentPOST = $_POST["alimentFicha"];
    $desarrolloPOST = $_POST["desarrolloFicha"];
    $habitatPOST = $_POST["habitatFicha"];
    $generoPOST = $_POST["generoFicha"];
    $tamanoPOST = $_POST["tamanoFicha"];
    $descripPOST = $_POST["descripFicha"];
    $comportPOST = $_POST["comportFicha"];
    $arch01POST = $_POST["arch01"];
    $arch02POST = $_POST["arch02"];
    $arch03POST = $_POST["arch03"];
    $arch04POST = $_POST["arch04"];


	//Consulta para introducir los datos (con la contraseña encriptada)
	$consulta = "INSERT INTO `ficha` (nombreFicha, coordenadasFicha, fechaFicha, horaFicha, cieloFicha, climaFicha, nomEspFicha, nomCieFicha, vertInvertFicha, alimentFicha, desarrolloFicha, habitatFicha, generoFicha, tamanoFicha, descripFicha, comportFicha, arch01, arch02, arch03, arch04) 
	VALUES ('$nomPOST','$coordenadasPOST','$fechaPOST','$horaPOST', '$cieloPOST', '$climaPOST', '$nomEspPOST', '$nomCiePOST', '$vertInvertPOST', '$alimentPOST', '$desarrolloPOST', '$habitatPOST', '$generoPOST', '$tamanoPOST', '$descripPOST', '$comportPOST', '$arch01POST', '$arch02POST', '$arch03POST', '$arch04POST')";

		//Si los datos se introducen correctamente, se muestran los datos
		//Sino, emerge un mensaje de error
        //var_dump(mysqli_query($conexion, $consulta));
        //die;
		if(mysqli_query($conexion, $consulta)) {
			die('<script>$(".registro").val("");</script>
	Registrado con éxito <br>
	Ya puedes acceder a tu cuenta <br>
	<br>
	Datos:<br>
	Correo Usuario:<br>
	Contraseña: ');
		} else {
			die('Error');
		};
    //var_dump($consulta);
   // die;

?>