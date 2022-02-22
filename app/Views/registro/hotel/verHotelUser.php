<?php
 $db = \Config\Database::connect();
echo $cabecera;

    $sql = "SELECT idHoteles, descripcion, nombre, direccion FROM hoteles WHERE idHoteles = $idHotel";
    $query = $db->query($sql);
    $results = $query->getResultArray();

    foreach ( $results as $hotel){
       $nombre = $hotel['nombre'];
       $descripcion = $hotel['descripcion'];
       $descripcion = $hotel['descripcion'];
       $direccion = $hotel['direccion'];

        }

        $sql = "SELECT foto FROM catalogo_hotel WHERE idHoteles = $idHotel";
        $query = $db->query($sql);
        $results = $query->getResultArray();
        foreach ( $results as $photo){
            $foto = $photo['foto'];
            }
    ?>

<p><br><br></p>
    <div class="row">
        <div class="col-sm">
        <img src="<?=Base_URL()?>/catalogoH/<?php echo $foto;?>" class="img-fluid" class="img-circle"alt="...">
        </div>

        <div class="col-sm">
           <div class="text-center"><h3 style="color: #36907A">Descripción del hotel</h3></div>
           <br>
           <p class="text-justify"><?=$descripcion?> 
        <br><br>
        
      </p>
     <div class="text-center">
     <svg xmlns="http://www.w3.org/2000/svg" width="50" height="60" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16" style="color: #36907A">
        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
       </svg> <p><?=$direccion?></p>
     </div>

        </div>

    </div>
    <p><br><br></p>
    <div class="row">
          
           
            <div class="col-sm">
            <div class="text-center"> <h3 style="color: #36907A">Habitaciones Disponibles</h3></div>
            </div>

    </div>

<p><br></p>
<?=$pie?>