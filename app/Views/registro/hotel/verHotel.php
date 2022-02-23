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
    <?php

$sql = "SELECT idHabitaciones, idHoteles, precio, descripcion, tipo, estado, foto FROM habitaciones WHERE idHoteles = $idHotel";
$query = $db->query($sql);
$results = $query->getResultArray();
$open = 3;
$close = 0;
$foto = "1";


foreach ( $results as $hotel){
    if($open === 3){
        echo "<p><br></p>";
        echo "<div class = 'row'>";
         $open = 0;

    }

    $foto = $hotel['foto'];
    $idHabitacion = $hotel['idHabitaciones'];
?>


    <div class="col-4">
     <div class="card" style="width: 18rem;">
        <img src="<?=Base_URL()?>/catalogoH/<?php echo $foto;?>" class="card-img-top" height="270"  alt="...">
        <div class="card-body">
            <div class="text-center"><h5 class="card-title" ><?=$hotel['tipo']?></h5></div>
            <p class="card-text" style = "text-align: justify;"><?php echo substr($hotel['descripcion'], 0, 150)." ..."; ?></p>
            <a href="<?=Base_URL('empleado/res/'.$idHabitacion)?>"  class="btn btn-primary btn-block">Conocer más</a>
        </div>
        </div>

    </div>

   


<?php
$close++;
if($close === 3){
echo "</div>";
$close = 0;

}
$open ++;

}
if($close !== 3){
echo "</div>";
}
?>

 

<p><br></p>
<?=$pie?>