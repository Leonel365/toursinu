<?=$cabecera?>
<?php
 $db = \Config\Database::connect();
$cabecera;
    $sql = "SELECT idLugares, Descripcion, Direccion, Nombre FROM lugares WHERE tipo = 1";
    $query = $db->query($sql);
    $results = $query->getResultArray();
    $open = 3;
    $close = 0;


    foreach ( $results as $places){
        $id = $places['idLugares'];
        $sql = "SELECT foto FROM catalogo_lugar WHERE idLugares = $id";
        $query = $db->query($sql);
        $results = $query->getResultArray();
        foreach ( $results as $row){

$foto = $row['foto'];
        if($open === 3){
            echo "<p><br></p>";
            echo "<div class = 'row'>";
             $open = 0;

        }
    ?>


        <div class="col-4">
         <div class="card" style="width: 18rem;">
            <img src="<?=Base_URL()?>/catalogo/<?php echo $foto;?>" height="270"  class="card-img-top" alt="...">
            <div class="card-body">
                <div class="text-center"><h5 class="card-title" ><?=$places['Nombre']?></h5></div>
                <p class="card-text" style = "text-align: justify;"><?php echo substr($places['Descripcion'], 0, 150)." ..."; ?></p>
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
}
    if($close !== 3){
    echo "</div>";
    }
echo $pie;