<?php
    //Conexión con la base datos
    require('conexiones.php');
    var_dump($_FILES);

	//Obtengo los datos que entran por el formulario de creación de ficha
	$nomPOST = $_POST["nombreFicha"];
	$latitudPOST = $_POST["latitudFicha"];
	$longitudPOST = $_POST["longitudFicha"];
	$fechaPOST = $_POST["fechaFicha"]; 
	$horaPOST = $_POST["horaFicha"];
	$cieloPOST = $_POST["cieloFicha"];
    $climaPOST = $_POST<["climaFicha"];
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
    //$arch01POST = $_POST["arch01"];
    //$arch02POST = $_POST["arch02"];
   	//$arch03POST = $_POST["arch03"];
    //$arch04POST = $_POST["arch04"];
	$idUsuarioRegPOST = $_POST["idUsuarioReg"];


	//Convertir la información de las imágenes en binario para insertarla en la BD
	if(!empty($_FILES['arch01']['tmp_name'])) {
		$imagenBinaria01 = addslashes(file_get_contents($_FILES['arch01']['tmp_name']));
		$nombreArchivo01 = $_FILES['arch01']['name'];
	}else {
		$nombreArchivo01 = '';
	}
	if(!empty($_FILES['arch02']['tmp_name'])) {
		$imagenBinaria02 = addslashes(file_get_contents($_FILES['arch02']['tmp_name']));
		$nombreArchivo02 = $_FILES['arch02']['name'];
	}else {
		$nombreArchivo02 = '';
	}
	if(!empty($_FILES['arch03']['tmp_name'])) {
		$imagenBinaria03 = addslashes(file_get_contents($_FILES['arch03']['tmp_name']));
		$nombreArchivo03 = $_FILES['arch03']['name'];
	}else {
		$nombreArchivo03 = '';
	}
	if(!empty($_FILES['arch04']['tmp_name'])) {
		$imagenBinaria04 = addslashes(file_get_contents($_FILES['arch04']['tmp_name']));
		$nombreArchivo04 = $_FILES['arch04']['name'];
	} else {
		$nombreArchivo04 = '';
	}
	

			//Consulta para introducir los datos que entran por el formulario de registro de la ficha 
			//para posteriormente ser insertado en el campo correspondiente de la tabla "ficha"
			$consulta = "INSERT INTO `ficha` (nombreFicha, latitudFicha, longitudFicha, fechaFicha, horaFicha, cieloFicha, climaFicha, nomEspFicha, nomCieFicha, vertInvertFicha, alimentFicha, desarrolloFicha, habitatFicha, generoFicha, tamanoFicha, descripFicha, comportFicha, arch01, arch02, arch03, arch04, idRegistro) 
			VALUES ('$nomPOST','$latitudPOST','$longitudPOST','$fechaPOST','$horaPOST', '$cieloPOST', '$climaPOST', '$nomEspPOST', '$nomCiePOST', '$vertInvertPOST', '$alimentPOST', '$desarrolloPOST', '$habitatPOST', '$generoPOST', '$tamanoPOST', '$descripPOST', '$comportPOST', '$imagenBinaria01', '$imagenBinaria02', '$imagenBinaria03', '$imagenBinaria04', '$idUsuarioRegPOST')";

				//Si los datos se introducen correctamente, se muestran los datos
				//Sino, emerge un mensaje de error
				if(mysqli_query($conexion, $consulta)) {
					die('<script>$(".registro").val("");</script>
			Ficha registrada con éxito');
				} else {
					die(mysqli_error($conexion));
					die('Error');
				};
	
?>