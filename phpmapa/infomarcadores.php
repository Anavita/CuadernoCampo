 <?php

  //Se agrega el nombre común y científico de la especie a la ventana de información de cada marcador

  $result = mysqli_query($conexion, "SELECT nomEspFicha, nomCieFicha, latitudFicha, longitudFicha, arch01 FROM ficha");

  if($result->num_rows > 0){
    
    while($row = $result->fetch_assoc()){ ?>
    
    ['<div class="info_content">' + '<h3><?php echo $row['nomEspFicha']; ?></h3>' + '<h4><p><?php echo $row['nomCieFicha']; ?></h4></p>' + '<h5><p><?php echo $row['latitudFicha']; ?></h5></p>' + '<h5><p><?php echo $row['longitudFicha']; ?></h5></p>' + '</div>'], 

    <?php }
  }

?>
