<?php

    include('php/conexiones.php'); 
    
    // Se listan las direcciones con todos los datos (latitud y longitud)
    $result = mysqli_query($con, "SELECT latitudFicha, longitudFicha FROM ficha");
    
    //Se seleccionan los datos para crear los marcadores en el mapa de Google (latitud y longitud)
    while ($row = mysqli_fetch_array($result)) {
        echo '["' . $row['latitudFicha'] . ', ' . $row['longitudFicha'] . '],';
    }
?>