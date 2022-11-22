 <?php

  //Se agrega la latitud y la longitud a la ventana de información de cada marcador

  if($result->num_rows > 0){
    
    while($row = $result->fetch_assoc()){ ?>
    
    ['<div class="info_content">' + '<h3><?php echo $row['latitudFicha']; ?></h3>' + '<p><?php echo $row['longitudFicha']; ?></p>' + '</div>'], 

    <?php }
  }

?>
