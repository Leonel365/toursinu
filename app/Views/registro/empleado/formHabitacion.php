<?=$cabecera?>
<p><br></p>
<?php 
   if($estado==1){
       ?>
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡Las contraseñas no coinciden!'
            })
        </script>
        <?php
   }  if($estado==2){
    ?>
     <script>
     Swal.fire({
         icon: 'error',
         title: 'Oops...',
         text: '¡Ya existe un usuario registrado con este correo!'
         })
     </script>
     <?php
} ?>
<h5 class="modal-title w-100 text-center" style="color: #36907A"><b>Formulario para registrar una nueva habitación</b></h5>
<p><br></p>
<form method="POST" action="<?=Base_url('dataFormHab')?>" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md">
      <label for="tipo">Tipo de Habitación:</label>
      <input type="text" name="tipo" required class="form-control" id="tipo">
    </div>
    <div class="form-group col-md">
      <label for="precio">Precio por noche:</label>
      <input type="text"  name="precio" required class="form-control" id="precio">
    </div>
    <div class="form-group col-md">
      <label for="imagen">Foto:</label>
      <input type="file"  name="imagen" required class="form-control" id="imagen">
    </div>
  </div>
 

  <div class="form-row">
  <div class="form-group col-md">
    <label for="email">Descripción de la habitación:</label>
    <textarea name="descripcion" id="descripcion" class="form-control" rows="8" required placeholder="Escriba todos los servicios que se incluyen y demás información importante"></textarea>
  </div>
    
  </div>
<br>
  <div class="text-right">
      <a class="btn" style="background-color: #36907A; color:#FFFFFF" onclick="window.location.href = document.referrer; return false;">Regresar</a>
 <input type="submit" class="btn" style="background-color: #36907A; color:#FFFFFF" value="Registrar">
 </div>
</form>

<?=$pie?>