<?php
        include('php/conexiones.php');

        //Se lista la dirección con la latitud y longitud
        $result = mysqli_query($conexion, "SELECT latitudFicha, longitudFicha FROM `ficha`");

        //Se dibuja una tabla para listar los datos 
        echo "<div class='table-responsive'>";

        echo "<table class='table'>
                <thead>
                <tr>
                    <th scope='col'>Latitud</th>
                    <th scope='col'>Longitud</th>
                </tr>
                </thead>
                <tbody>";

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td scope='col'>" . $row['latitudFicha'] . "</td>";
            echo "<td scope='col'>" . $row['longitudFicha'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
        echo "</div>";

        mysqli_close($conexion);
?>
