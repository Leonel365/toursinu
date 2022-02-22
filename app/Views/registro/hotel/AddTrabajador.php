<?=$cabecera?>
<p><br><br></p>
<?php
if($update!=0){
?>
<script>
  Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Información guardada',
  showConfirmButton: false,
  timer: 2000
})
</script>

<?php
}
?>
<div class="row">
   <div class="col-sm">
        <a href="<?=Base_URL('form/trabajador/0')?>" class="btn btn-primary float-right">Agregar nuevo emplado</a>
   </div>

</div>
<p><br></p>
<div class="row">
<div class="col-sm">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Primer apellido</th>
      <th scope="col">Segundo apellido</th>
      <th scope="col">Cargo</th>
      <th scope="col">Fecha de inicio</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>

<?php
 $cont = 1;
 $db = \Config\Database::connect();

 $sql  ="SELECT idEmpleado, e.idPersona as id, p.estado as estado, cargo, fecha_contratacion as fecha, p.primer_nombre as nombre, p.primer_apellido as apellido1, p.segundo_apellido as apellido2
 FROM empleado as e, persona as p 
 WHERE idHoteles = $idHotel  AND e.idPersona = p.idPersona";  
   $query = $db->query($sql);
    $results = $query->getResultArray();

    foreach ( $results as $hotel){
       $nombre = $hotel['nombre'];
       $idPersona = $hotel['id'];
       $idTrabaajdor = $hotel['idEmpleado'];
       $cargo = $hotel['cargo'];
       $fecha = $hotel['fecha'];
       $nombre = $hotel['nombre'];
       $apellido1 = $hotel['apellido1'];
       $apellido2 = $hotel['apellido2'];
       $estado = $hotel['estado'];

    if($estado==0){

    ?>


   <tr>
      <th scope="row"><?=$cont?></th>
      <td><?=$nombre?></td>
      <td><?=$apellido1?></td>
      <td><?=$apellido2?></td>
      <td><?=$cargo?></td>
      <td><?=$fecha?></td>
      <td>
          <a href="<?=Base_URL('edit/trabajador/'.$idTrabaajdor)?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a> 
          <a href="<?=Base_URL('eliminar/trabajador/'.$idPersona)?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
          
      </td>
    </tr>
    <?php
    $cont ++;
    }else{
      ?>


<tr class="bg-danger">
      <th scope="row"><?=$cont?></th>
      <td><?=$nombre?></td>
      <td><?=$apellido1?></td>
      <td><?=$apellido2?></td>
      <td><?=$cargo?></td>
      <td><?=$fecha?></td>
      <td>
          <a href="<?=Base_URL('edit/trabajador/'.$idTrabaajdor)?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a> 
          <a href="<?=Base_URL('habilitar/trabajador/'.$idPersona)?>" class="btn btn-primary"><i class="bi bi-unlock-fill"></i></a>
          
      </td>
    </tr>
    <?php
    $cont ++;

    }
    }
    ?>
  </tbody>
</table>


</div>
</div>

<?=$pie?>