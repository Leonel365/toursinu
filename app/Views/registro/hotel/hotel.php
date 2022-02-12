<?=$cabecera?>
<p><br></p>
<h5 class="modal-title w-100 text-center" style="color: #36907A"><b>Formulario para registrar un nuevo hotel</b></h5>
<p><br></p>
<form>
  <div class="form-row">
    <div class="form-group col-md">
      <label for="name">Razón social:</label>
      <input type="text" required name="name"class="form-control" id="name">
    </div>
    <div class="form-group col-md">
      <label for="direccion">Dirección:</label>
      <input type="text" required name="direccion" class="form-control" id="direccion" placeholder="CL 123 Kra 124">
    </div>
    <div class="form-group col-md">
    <label for="correo">Correo electronico:</label>
    <input type="correo" required class="form-control" id="correo" placeholder="Micorreo@dominio.com">
  </div>
  </div>
 

  <div class="form-row">

  <div class="form-group col-md">
    <label for="imagen">Foto:</label>
    <input type="file" required name="imagen"  class="form-control" id="imagen" >
  </div>
 
    <div class="form-group col-md">
      <label for="password">Contraseña:</label>
      <input type="password" required class="form-control" id="password" placeholder="Defina una contraseña">
    </div>
    <div class="form-group col-md">
      <label for="password2">Confirmar contraseña:</label>
      <input type="password2" required class="form-control" id="password2" placeholder="Escriba nuevamente su contraseña">
    </div>
  
  </div>
  <div class="form-row">
  <div class="form-group col-12">
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" required class="form-control" id="descripcion" cols="30" rows="3"placeholder="Agregue una descripción del hotel"></textarea>
  </div>
</div>

<br>
  <div class="text-right">
      <button class="btn" style="background-color: #36907A; color:#FFFFFF">Regresar</button>
 <input type="submit" class="btn" style="background-color: #36907A; color:#FFFFFF" value="Registrar">
 </div>
</form>
<?=$pie?>