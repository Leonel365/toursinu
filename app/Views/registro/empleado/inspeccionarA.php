<?=$cabecera?>
<?php
 $cont = 1;
 $db = \Config\Database::connect();

 $sql  ="SELECT idReservas, idTurista, fecha_reserva, idHabitaciones, dias, estado FROM reservas WHERE idReservas = $reservaId  and idHabitaciones IN (SELECT idHabitaciones FROM habitaciones WHERE idHoteles = $idHotel)";  
   $query = $db->query($sql);
    $results = $query->getResultArray();

    foreach ( $results as $hotel){
       $idHabitacion = $hotel['idHabitaciones'];
       $fecha = $hotel['fecha_reserva'];
       $idTurista = $hotel['idTurista'];
       $idReserva = $hotel['idReservas'];
       $dias = $hotel['dias'];
       $estado = $hotel['estado'];

       $sql = "SELECT idPersona FROM turista WHERE idTurista = $idTurista";
       $query = $db->query($sql);
       $x = $query->getResultArray();
   
   foreach ($x as $row){
       $idPersona = $row['idPersona'];
   }
        $sql = "SELECT idPersona FROM empleado WHERE idEmpleado = $idEmpleado";
        $query = $db->query($sql);
        $x = $query->getResultArray();

        foreach ($x as $row){
        $idPersonaE = $row['idPersona'];
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

   $sql = "SELECT CONCAT(primer_nombre, ' ', primer_apellido, ' ', segundo_apellido) as nombre FROM persona WHERE idPersona = $idPersonaE";
   $query = $db->query($sql);
   $y = $query->getResultArray();

    foreach ($y as $row){
    $nomEmpleado = $row['nombre'];
    }

    $sql = "SELECT mensaje FROM mensaje WHERE idPago = $idpago";
    $query = $db->query($sql);
    $y = $query->getResultArray();
 
    foreach ($y as $row){
        $mensaje = $row['mensaje'];
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
                    <p> <h5 style="color: #36907A">Nombre del cliente</h5><?=$nombre?></p> 
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
               
                <?php if($estado ==='denegado' ){
                
                ?>
                 <div class ="col-sm">
                    <p> <h5 style="color: #36907A">Atendido por</h5><?=$nomEmpleado?></p> 
                </div>
                 <div class ="col-sm">
                    <p> <h5 style="color: #36907A">Mensaje</h5><?=$mensaje?></p> 
                </div>
                
                <?php }?>
                <?php if($estado ==='aprobado' ){
                
                ?>
                 <div class ="col-sm">
                    <p> <h5 style="color: #36907A">Atendido por</h5><?=$nomEmpleado?></p> 
                </div>
                
                <?php }?>
           </div>

    </div>

  

</div>

<div>

       <p><br></p>

    <div class="collapse" id="collapseExample">
        <div class="card card-body">
           <p class="text-center">Detalle los motivos por los cuales la reserva es denegada y un medio de comunicación <br><br></p>
                    <form name="calc" method="POST" action="<?=Base_url('denegar')?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md">
                                <label for="tipo">Mensaje:</label>
                                <input type="hidden" name="idPago" value = "<?=$idpago?>">
                                <textarea name="mensaje" id="mensaje" required cols="30" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="col-md">
                                <label for="contacto">Tel. Contacto:</label>
                                <input type="text" name="contacto"  required  class="form-control" id="contacto">
                            </div>
                           
                            <div class="col-md"> 
                            <br>
                          
                                <input type="submit" class="btn btn-success" id="boton" style="color:#FFFFFF" value="Confirmar">
                            </div> 
                        </div>
            
                        
                    </form>
           
        </div>
    </div>
</div>

<script src ="<?=Base_URL()?>/style.js"> </script>

<?php
    }
    echo $pie;