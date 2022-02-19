<?=$cabecera?>
<p><br><br><br></p>
<?php 
    $db = \Config\Database::connect();

        $sql  ="SELECT cargo, p.primer_nombre as nombre, p.primer_apellido as apellido1, p.segundo_apellido as apellido2
        FROM empleado as e, persona as p 
        WHERE e.idEmpleado = $idEmpleado AND e.idPersona = p.idPersona";  
        $query = $db->query($sql);
        $results = $query->getResultArray();
    
        foreach ( $results as $hotel){
           $nombre = $hotel['nombre'];
           $cargo = $hotel['cargo'];
           $apellido1 = $hotel['apellido1'];
           $apellido2 = $hotel['apellido2'];
        }     
      ?>
    
  
  

<h5 class="modal-title w-100 text-center" style="color: #36907A"><b>Actualizar datos del empleado</b></h5>
<p><br></p>
<form method="POST" action="<?=Base_url('update/trabajador')?>" >
<input type="hidden" name="idEmpleado" value = <?=$idEmpleado?>>
  <div class="form-row">
    <div class="form-group col-md">
      <label for="name">Nombre:</label>
      <input type="text" name="name" required value="<?=$nombre?>" class="form-control" id="name">
    </div>
    <div class="form-group col-md">
      <label for="firstName1">Primer apellido:</label>
      <input type="text"  name="firstName1" required value="<?=$apellido1?>" class="form-control" id="firstName1">
    </div>
    <div class="form-group col-md">
    <label for="firstName2">Segundo Apellido:</label>
    <input type="text" class="form-control" required value="<?=$apellido2?>" name="firstName2" id="firstName2">
  </div>
  <div class="form-group col-md">
    <label for="rol">Rol o cargo:</label>
    <input type="text" class="form-control" required value="<?=$cargo?>" name="rol" id="rol">
  </div>
  </div>
 
<br>
  <div class="text-right">
      <a class="btn" style="background-color: #36907A; color:#FFFFFF" onclick="window.location.href = document.referrer; return false;">Regresar</a>
 <input type="submit" class="btn" style="background-color: #36907A; color:#FFFFFF" value="Actualizar">
 </div>
</form>

<?=$pie?>