<?=$cabecera?>
<?php
 $cont = 1;
 $db = \Config\Database::connect();

 $sql  ="SELECT idReservas, idTurista, fecha_reserva, idHabitaciones, dias, estado FROM reservas WHERE idReservas = $reservaId";  
   $query = $db->query($sql);
    $results = $query->getResultArray();

    foreach ( $results as $hotel){
       $idHabitacion = $hotel['idHabitaciones'];
       $fecha = $hotel['fecha_reserva'];
       $idTurista = $hotel['idTurista'];
       $idReserva = $hotel['idReservas'];
       $dias = $hotel['dias'];
       $estado = $hotel['estado'];

       $sql = "SELECT nombre FROM hoteles WHERE idHoteles in (SELECT idHoteles FROM habitaciones where idHabitaciones = $idHabitacion)";
       $query = $db->query($sql);
       $x = $query->getResultArray();
   
   foreach ($x as $row){
       $nombreHotel = $row['nombre'];
   }
        

        $sql = "SELECT cantidad, comprobante, idPagos FROM pagos WHERE idReservas =  $idReserva";
        $query = $db->query($sql);
        $x = $query->getResultArray();

            foreach ($x as $row){
            $cantidad = $row['cantidad'];
            $foto = $row['comprobante'];
            $idpago = $row['idPagos'];
            }

        $sql = "SELECT tipo FROM habitaciones WHERE idHabitaciones = $idHabitacion";
        $query = $db->query($sql);
        $x = $query->getResultArray();

            foreach ($x as $row){
            $tipo = $row['tipo'];
            }

       $sql = "SELECT CONCAT(primer_nombre, ' ', primer_apellido, ' ', segundo_apellido) as nombre FROM persona WHERE idPersona = $idPersona";
       $query = $db->query($sql);
       $y = $query->getResultArray();
   
   foreach ($y as $row){
       $nombre = $row['nombre'];
   }


    $sql = "SELECT mensaje, contacto FROM mensaje WHERE idPago = $idpago";
    $query = $db->query($sql);
    $y = $query->getResultArray();
 
    foreach ($y as $row){
        $mensaje = $row['mensaje'];
        $contacto = $row['contacto'];
    }

    ?>

<div class="row">

<p><br></p>
    <div class="col-4"> 
    <p><br></p> 
        <div class="text-center">                
            <h5 style="color: #36907A" >Volante de pago</h5>
            <a class="my-image-links" data-gall="gallery01" href="<?=Base_URL()?>/catalogoH/<?php echo $foto;?>"><img width="350" src="<?=Base_URL()?>/catalogoH/<?php echo $foto;?>"></a>
            <a class="btn btn-primary btn-block" href="<?=Base_URL()?>/catalogo/1.png" data-lg-size="500-500"><i class="bi bi-zoom-in"></i></a>
        </div>
    </div>

    <div class="col-8">
        <br>
         <div class="text-center"><h3 style="color: #36907A">Información de la reserva</h3></div>
           <br>
           <div class ="row">
                <div class ="col-sm">
                    <p> <h5 style="color: #36907A">Nombre del Hotel</h5><?=$nombreHotel?></p> 
                </div>

                <div class ="col-sm">
                    <p> <h5 style="color: #36907A">Tipo de habitacion</h5><?=$tipo?></p> 
                </div>
                <div class ="col-sm">
                    <p> <h5 style="color: #36907A">Total pagado</h5><?php echo $cantidad." COP" ?></p> 
                </div>

           </div>

           <div class="row">
                <div class ="col-sm">
                    <p> <h5 style="color: #36907A">Fecha de la reserva</h5><?=$fecha?></p> 
                </div>
                <div class ="col-sm">
                    <p> <h5 style="color: #36907A">Estado de la reserva</h5><?=$estado?></p> 
                </div>
                
           </div>

           <div class="row">
                <?php if($estado ==='denegado'){
                
                ?>
                 <div class ="col-sm">
                    <p> <h5 style="color: #36907A">Mensaje</h5><?=$mensaje?></p> 
                </div>
                <div class ="col-sm">
                    <p> <h5 style="color: #36907A">Contacto</h5><?=$contacto?></p> 
                </div>
                
                <?php }?>
           </div>

    </div>

  

</div>



       <p><br></p>


<script src ="<?=Base_URL()?>/style.js"> </script>

<?php
    }
    echo $pie;