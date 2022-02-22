<?=$cabecera?>
<p><br><br><br></p>
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
        <a href="<?=Base_URL('form/habitacion/0')?>" class="btn btn-primary float-right">Agregar nueva habitación</a>
   </div>

</div>
<p><br></p>
<div class="row">
<div class="col-sm">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tipo</th>
      <th scope="col">Precio</th>
      <th scope="col">Descripción</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>

<?php
 $cont = 1;
 $db = \Config\Database::connect();

 $sql  ="SELECT idHabitaciones, precio, descripcion, tipo, estado FROM habitaciones WHERE idHoteles =  $idHotel ";  
   $query = $db->query($sql);
    $results = $query->getResultArray();

    foreach ( $results as $hotel){
       $idHabitacion = $hotel['idHabitaciones'];
       $precio = $hotel['precio'];
       $descripcion = $hotel['descripcion'];
       $tipo = $hotel['tipo'];
       $estado = $hotel['estado'];
      

    if($estado==0){

    ?>


   <tr>
      <th scope="row"><?=$cont?></th>
      <td><?=$tipo?></td>
      <td><?=$precio?></td>
      <td><?=$descripcion?></td>
      <td>
          <a href="<?=Base_URL('edit/habitacion/'.$idHabitacion)?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a> 
          <a href="<?=Base_URL('eliminar/habitacion/'.$idHabitacion)?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
          
      </td>
    </tr>
    <?php
    $cont ++;
    }else{
      ?>


<tr class="bg-danger">
      <th scope="row"><?=$cont?></th>
      <td><?=$tipo?></td>
      <td><?=$precio?></td>
      <td><?=$descripcion?></td>
      <td>
          <a href="<?=Base_URL('edit/habitacion/'.$idHabitacion)?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a> 
          <a href="<?=Base_URL('habilitar/habitacion/'.$idHabitacion)?>" class="btn btn-primary"><i class="bi bi-unlock-fill"></i></a>
          
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