<?php
    include_once("conexiones.php");
    //Código para editar cada ficha de la tabla
    if ($_POST['action'] == 'edit' && $_POST['idF']) {	
        $updateField='';
        if(isset($_POST['nombreF'])) {
            $updateField.= "nombreFicha='".$_POST['nombreF']."'";
        } else if(isset($_POST['latitud'])) {
            $updateField.= "latitudFicha='".$_POST['latitud']."'";
        } else if(isset($_POST['longitud'])) {
            $updateField.= "longitudFicha='".$_POST['longitud']."'";
        } else if(isset($_POST['fecha'])) {
            $updateField.= "fechaFicha='".$_POST['fecha']."'";
        } else if(isset($_POST['hora'])) {
            $updateField.= "horaFicha='".$_POST['hora']."'";
        } else if(isset($_POST['cielo'])) {
            $updateField.= "cieloFicha='".$_POST['cielo']."'";   
        } else if(isset($_POST['clima'])) {
            $updateField.= "climaFicha='".$_POST['clima']."'"; 
        } else if(isset($_POST['nomEsp'])) {
            $updateField.= "nomEspFicha='".$_POST['nomEsp']."'"; 
        } else if(isset($_POST['nomCie'])) {
            $updateField.= "nomCieFicha='".$_POST['nomCie']."'"; 
        } else if(isset($_POST['vertInvert'])) {
            $updateField.= "vertInvertFicha='".$_POST['vertInvert']."'"; 
        } else if(isset($_POST['aliment'])) {
            $updateField.= "alimentFicha='".$_POST['aliment']."'"; 
        } else if(isset($_POST['desarrollo'])) {
            $updateField.= "desarrolloFicha='".$_POST['desarrollo']."'"; 
        } else if(isset($_POST['habitat'])) {
            $updateField.= "habitatFicha='".$_POST['habitat']."'"; 
        } else if(isset($_POST['genero'])) {
            $updateField.= "generoFicha='".$_POST['genero']."'"; 
        } else if(isset($_POST['tamano'])) {
            $updateField.= "tamanoFicha='".$_POST['tamano']."'"; 
        } else if(isset($_POST['descrip'])) {
            $updateField.= "descripFicha='".$_POST['descrip']."'"; 
        } else if(isset($_POST['comport'])) {
            $updateField.= "comportFicha='".$_POST['comport']."'"; 

        if($updateField && $_POST['idF']) {
            $sqlQuery = "UPDATE ficha SET $updateField WHERE idFicha='" . $_POST['idF'] . "'";	
            mysqli_query($conexion, $sqlQuery) or die("Error en la base de datos:". mysqli_error($conexion));	
            $data = array(
                "message"	=> "Campo actualizado correctamente",	
                "status" => 1
            );
            echo json_encode($data);		
        }
    }
    if ($_POST['action'] == 'delete' && $_POST['idF']) {
        $sqlQuery = "DELETE FROM ficha WHERE id='" . $_POST['idF'] . "'";	
        mysqli_query($conexion, $sqlQuery) or die("Error en la base de datos:". mysqli_error($conexion));	
        $data = array(
            "message"	=> "Campo eliminado correctamente",	
            "status" => 1
        );
        echo json_encode($data);	
    }
?>