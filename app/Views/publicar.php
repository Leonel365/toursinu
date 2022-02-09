<?=$cabecera?>
<p><br></p>
<?php 
   if($estado==='1'){
       ?>
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡Todos los campos son obligatorios!'
            })
        </script>

<?php
   } else{?>
    <script>
        Swal.fire({
            icon: 'info',
            title: '¡Genial!',
            text: 'Es un gusto que desees compartir con otros tú lugar secreto'
            })
    </script>
       <?php } ?>
<form method="POST" action="<?=Base_url('publicarForm')?>" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="placeName" name ="">Nombre del Lugar</label>
      <input type="text" name="placeName" required class="form-control" id="placeName">
    </div>
    <div class="form-group col-md-6">
      <label for="address">Dirección</label>
      <input type="text" name="address" required  class="form-control" id="address" placeholder="CL 123 Kra 124">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="imagen">Foto</label>
    <input type="file" name="imagen" required class="form-control" id="imagen" >
  </div>
  <div class="form-group col-md-6">
    <label for="descripcion">Descripción</label>
    <textarea name="descripcion" required class="form-control" id="descripcion" rows="3" placeholder="Cuentenos la razón por la cual este lugar te encantó"></textarea>
  </div>
    </div>
 <div class="text-right">
 <input type="submit" class="btn btn-primary" value="Publicar">
 </div>
</form>

<?=$pie?>