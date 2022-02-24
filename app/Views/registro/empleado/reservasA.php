<?=$cabecera?>
<p><br><br><br></p>

    <div class="text-center">
        <h3 style="color: #36907A">Lista de reservas</h3>
    </div>
<p><br></p>
<div class="row">
<div class="col-sm">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cliente</th>
      <th scope="col">Tipo Habitación</th>
      <th scope="col">Tiempo hospedaje</th>
      <th scope="col">Total (COP)</th>
      <th scope="col">Fecha de la solicitud</th>
      <th scope="col">Estado de la reserva</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>

<?php
 $cont = 1;
 $db = \Config\Database::connect();

 $sql  ="SELECT idReservas, idTurista, fecha_reserva, idHabitaciones, dias, estado FROM reservas WHERE idHabitaciones IN (SELECT idHabitaciones FROM habitaciones WHERE idHoteles = $idHotel) ";  
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

        $sql = "SELECT cantidad FROM pagos WHERE idReservas =  $idReserva";
        $query = $db->query($sql);
        $x = $query->getResultArray();

            foreach ($x as $row){
            $cantidad = $row['cantidad'];
            }

        $sql = "SELECT tipo FROM habitaciones WHERE idHabitaciones = $idHabitacion";
        $query = $db->query($sql);
        $x = $query->getResultArray();

            foreach ($x as $row){
            $tipo = $row['tipo'];
            }

       $sql = "SELECT CONCAT(primer_nombre, ' ', primer_apellido) as nombre FROM persona WHERE idPersona = $idPersona";
       $query = $db->query($sql);
       $y = $query->getResultArray();
   
   foreach ($y as $row){
       $nombre = $row['nombre'];
   }
   if($estado ==='aprobado'){
    ?>


   <tr>
      <th scope="row"><?=$cont?></th>
      <td><?=$nombre?></td>
      <td><?=$tipo?></td>
      <td><?=$dias." días"?></td>
      <td><?="$ ".$cantidad?></td>
      <td><?=$fecha?></td>
      <td style ="color: #27B401"><?=$estado?></td>
      <td>
          <a href="<?=Base_URL('inspeccionar/reservasA/'.$idReserva)?>" class="btn btn-success"><i class="bi bi-eye"></i></a>           
      </td>
    </tr>
    <?php
    $cont ++;
  

    
    }else{ ?>

<tr>
      <th scope="row"><?=$cont?></th>
      <td><?=$nombre?></td>
      <td><?=$tipo?></td>
      <td><?=$dias." días"?></td>
      <td><?="$ ".$cantidad?></td>
      <td><?=$fecha?></td>
      <td style ="color: #ED0718"><?=$estado?></td>
      <td>
          <a href="<?=Base_URL('inspeccionar/reservasA/'.$idReserva)?>" class="btn btn-success"><i class="bi bi-eye"></i></a>           
      </td>
    </tr>
    <?php
    $cont ++;
  
    }
}
?>
    
  </tbody>
</table>

<p><br><br></p>
</div>
</div>

<?=$pie?>