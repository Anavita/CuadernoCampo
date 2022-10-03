<?php

    $servername = "localhost";
    $database = "cuadernocampo"; 
    $username = "cuadernocampo"; 
    $password = "cuadernocampo"; 
    // Creamos la conexión
    $conexion = mysqli_connect($servername, $username, $password, $database);
    // Comprobamos la conexión
    if (!$conexion) {
        die("La conexión ha fallado: " . mysqli_connect_error());
    }
    
    echo "Conexión satisfactoria.";
    //mysqli_close($conexion);
?>