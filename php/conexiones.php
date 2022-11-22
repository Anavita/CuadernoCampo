<?php
    $servername = "localhost";
    $database = "cuadernocampo"; 
    $username = "cuadernocampo"; 
    $password = "cuadernocampo"; 

    $conexion = mysqli_connect($servername, $username, $password, $database);
    if (!$conexion) {
        die("La conexión ha fallado: " . mysqli_connect_error());
    }
    echo "Conexión satisfactoria.";
?>