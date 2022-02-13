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
<h5 class="modal-title w-100 text-center" style="color: #36907A"><b>Formulario para registrar un nuevo turista</b></h5>
<p><br></p>
<form method="POST" action="<?=Base_url('turistaForm')?>" >
  <div class="form-row">
    <div class="form-group col-md">
      <label for="name">Nombre:</label>
      <input type="text" name="name" required class="form-control" id="name">
    </div>
    <div class="form-group col-md">
      <label for="firstName1">Primer apellido:</label>
      <input type="text"  name="firstName1" required class="form-control" id="firstName1">
    </div>
    <div class="form-group col-md">
    <label for="firstName2">Segundo Apellido:</label>
    <input type="text" class="form-control" required name="firstName2" id="firstName2">
  </div>
  </div>
 

  <div class="form-row">
  <div class="form-group col-md">
    <label for="email">Correo electronico:</label>
    <input type="email" name =  "correo" class="form-control" id="email" required placeholder="Micorreo@dominio.com">
  </div>
    <div class="form-group col-md">
      <label for="password">Contraseña:</label>
      <input type="password" class="form-control" required name="password" placeholder="Defina una contraseña">
    </div>
    <div class="form-group col-md">
      <label for="password2">Confirmar contraseña:</label>
      <input type="password" class="form-control" required name="password2" placeholder="Escriba nuevamente su contraseña">
    </div>
  </div>
<br>
  <div class="text-right">
      <a class="btn" style="background-color: #36907A; color:#FFFFFF" onclick="window.location.href = document.referrer; return false;">Regresar</a>
 <input type="submit" class="btn" style="background-color: #36907A; color:#FFFFFF" value="Registrar">
 </div>
</form>

<?=$pie?>