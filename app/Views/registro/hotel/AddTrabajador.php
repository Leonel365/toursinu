<?php
echo $cabecera;

    $sql  ="SELECT idEmpleado, idPersona, cargo, fecha_contratacion, foto FROM empleado WHERE idHoteles = $idHotel ";
?>

<p><br><br></p>

<div class="row">
   <div class="col-sm">
        <a href="#" class="btn btn-primary float-right">Agregar nuevo emplado</a>
   </div>

</div>
<p><br></p>
<div class="row">
<div class="col-sm">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Foto</th>
      <th scope="col">Nombre</th>
      <th scope="col">Primer apellido</th>
      <th scope="col">Segundo apellido</th>
      <th scope="col">Cargo</th>
      <th scope="col">Fecha de inicio</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
   
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
      <td>@twitter</td>
      <td>@twitter</td>
      <td>@twitter</td>
      <td>
          <a href="#" class="btn btn-success"><i class="bi bi-pencil-square"></i></a> 
          <a href="#" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
          
       </td>
    </tr>
  </tbody>
</table>


</div>
</div>