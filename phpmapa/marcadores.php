<?php
 
    // Archivo de Conexión a la Base de Datos 
    include('../php/conexiones.php'); 
    
    // Listamos las direcciones con todos sus datos (lat, lng, dirección, etc.)
    $result = mysqli_query($con, "SELECT * FROM google_maps_php_mysql");
    
    // Seleccionamos los datos para crear los marcadores en el Mapa de Google serian direccion, lat y lng 
    while ($row = mysqli_fetch_array($result)) {
        echo '["' . $row['nombre'] . ', ' . $row['direccion'] . '", ' . $row['lat'] . ', ' . $row['lng'] . '],';
    }
 
?>