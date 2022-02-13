<?=$cabecera?>
<?php
 $db = \Config\Database::connect();
$cabecera;
    $sql = "SELECT idHoteles, descripcion, nombre, direccion FROM hoteles";
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
        $idHotel = $hotel['idHoteles'];
        $sql = "SELECT foto FROM catalogo_hotel WHERE idHoteles = $idHotel";
        $query = $db->query($sql);
        $results = $query->getResultArray();
        foreach ( $results as $photo){
            $foto = $photo['foto'];
            }
    ?>


        <div class="col-4">
         <div class="card" style="width: 18rem;">
            <img src="<?=Base_URL()?>/catalogoH/<?php echo $foto;?>" class="card-img-top" height="270"  alt="...">
            <div class="card-body">
                <div class="text-center"><h5 class="card-title" ><?=$hotel['nombre']?></h5></div>
                <p class="card-text" style = "text-align: justify;"><?php echo substr($hotel['descripcion'], 0, 150)." ..."; ?></p>
                <a href="#" class="btn btn-primary btn-block">Conocer más</a>
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
echo $pie;