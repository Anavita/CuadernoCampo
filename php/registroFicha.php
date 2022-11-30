<?php
    //Conexión con la base datos
    require('conexiones.php');
    var_dump($_POST);

	//Obtengo los datos que entran por el formulario de creación de ficha
	$nomPOST = $_POST["nombreFicha"];
	$latitudPOST = $_POST["latitudFicha"];
	$longitudPOST = $_POST["longitudFicha"];
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

	//Consulta para introducir los datos que entran por el formulario de registro de la ficha 
	//para posteriormente ser insertado en el campo correspondiente de la tabla "ficha"
	$consulta = "INSERT INTO `ficha` (nombreFicha, latitudFicha, longitudFicha, fechaFicha, horaFicha, cieloFicha, climaFicha, nomEspFicha, nomCieFicha, vertInvertFicha, alimentFicha, desarrolloFicha, habitatFicha, generoFicha, tamanoFicha, descripFicha, comportFicha, arch01, arch02, arch03, arch04) 
	VALUES ('$nomPOST','$latitudPOST','$longitudPOST','$fechaPOST','$horaPOST', '$cieloPOST', '$climaPOST', '$nomEspPOST', '$nomCiePOST', '$vertInvertPOST', '$alimentPOST', '$desarrolloPOST', '$habitatPOST', '$generoPOST', '$tamanoPOST', '$descripPOST', '$comportPOST', '$arch01POST', '$arch02POST', '$arch03POST', '$arch04POST')";

		//Si los datos se introducen correctamente, se muestran los datos
		//Sino, emerge un mensaje de error
		if(mysqli_query($conexion, $consulta)) {
			die('<script>$(".registro").val("");</script>
	Ficha registrada con éxito');
		} else {
			die('Error');
		};
?>