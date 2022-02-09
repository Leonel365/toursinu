<?=$cabecera?>
<p><br></p>
<h5 class="modal-title w-100 text-center" style="color: #36907A"><b>Formulario para registrar un nuevo turista</b></h5>
<p><br></p>
<form>
  <div class="form-row">
    <div class="form-group col-md">
      <label for="name">Nombre:</label>
      <input type="text" name="name"class="form-control" id="name">
    </div>
    <div class="form-group col-md">
      <label for="apellido1">Primer apellido:</label>
      <input type="text"  name="apellido1" class="form-control" id="apellido1">
    </div>
    <div class="form-group col-md">
    <label for="apellido2">Segundo Apellido:</label>
    <input type="text" class="form-control" name="apellido2" id="apellido2">
  </div>
  </div>
 

  <div class="form-row">
  <div class="form-group col-md">
    <label for="correo">Correo electronico:</label>
    <input type="correo" class="form-control" id="correo" placeholder="Micorreo@dominio.com">
  </div>
    <div class="form-group col-md">
      <label for="password">Contraseña:</label>
      <input type="password" class="form-control" id="password" placeholder="Defina una contraseña">
    </div>
    <div class="form-group col-md">
      <label for="password2">Confirmar contraseña:</label>
      <input type="password2" class="form-control" id="password2" placeholder="Escriba nuevamente su contraseña">
    </div>
  </div>
<br>
  <div class="text-right">
      <button class="btn" style="background-color: #36907A; color:#FFFFFF">Regresar</button>
 <input type="submit" class="btn" style="background-color: #36907A; color:#FFFFFF" value="Registrar">
 </div>
</form>

<?=$pie?>