<?=$cabecera?>
<p><br></p>
<?php 
    $db = \Config\Database::connect();

        $sql  ="SELECT precio, descripcion, tipo FROM habitaciones WHERE idHabitaciones = $idHabitacion";  
        $query = $db->query($sql);
        $results = $query->getResultArray();
    
        foreach ( $results as $hotel){
           $precio = $hotel['precio'];
           $descripcion = $hotel['descripcion'];
           $tipo = $hotel['tipo'];
        }     
      ?>
<h5 class="modal-title w-100 text-center" style="color: #36907A"><b>Formulario para editar una habitación</b></h5>
<p><br></p>
<form method="POST" action="<?=Base_url('editFormHab')?>">
  <div class="form-row">
    <div class="form-group col-md">
      <label for="tipo">Tipo de Habitación:</label>
      <input type="hidden" name="idHabitacion" value = "<?=$idHabitacion?>">
      <input type="text" name="tipo" required  value = "<?=$tipo?>" class="form-control" id="tipo">
    </div>
    <div class="form-group col-md">
      <label for="precio">Precio por noche:</label>
      <input type="text"  name="precio"  value = "<?=$precio?>" required class="form-control" id="precio">
    </div>
  </div>
 

  <div class="form-row">
  <div class="form-group col-md">
    <label for="email">Descripción de la habitación:</label>
    <textarea name="descripcion" id="descripcion" class="form-control" rows="8" required placeholder="Escriba todos los servicios que se incluyen y demás información importante"><?php echo $descripcion; ?></textarea>
  </div>
    
  </div>
<br>
  <div class="text-right">
      <a class="btn" style="background-color: #36907A; color:#FFFFFF" onclick="window.location.href = document.referrer; return false;">Regresar</a>
 <input type="submit" class="btn" style="background-color: #36907A; color:#FFFFFF" value="Actualizar">
 </div>
</form>

<?=$pie?>