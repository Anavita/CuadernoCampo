<?php
    include_once("conexiones.php");
    //Código para editar cada ficha de la tabla
    if ($_POST['action'] == 'edit' && $_POST['id']) {	
        $updateField='';
        if(isset($_POST['name'])) {
            $updateField.= "nombreFicha='".$_POST['name']."'";
        } else if(isset($_POST['gender'])) {
            $updateField.= "latitudFicha='".$_POST['gender']."'";
        } else if(isset($_POST['age'])) {
            $updateField.= "longitudFicha='".$_POST['age']."'";
        }
        if($updateField && $_POST['id']) {
            $sqlQuery = "UPDATE ficha SET $updateField WHERE idFicha='" . $_POST['id'] . "'";	
            mysqli_query($conexion, $sqlQuery) or die("Error en la base de datos:". mysqli_error($conexion));	
            $data = array(
                "message"	=> "Campo actualizado",	
                "status" => 1
            );
            echo json_encode($data);		
        }
    }
    if ($_POST['action'] == 'delete' && $_POST['id']) {
        $sqlQuery = "DELETE FROM ficha WHERE id='" . $_POST['id'] . "'";	
        mysqli_query($conexion, $sqlQuery) or die("Error en la base de datos:". mysqli_error($conexion));	
        $data = array(
            "message"	=> "Campo eliminado",	
            "status" => 1
        );
        echo json_encode($data);	
    }
?>