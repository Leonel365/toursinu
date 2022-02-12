<?=$cabecera?>
<p><br></p>
<h5 class="modal-title w-100 text-center" style="color: #36907A"><b>Formulario para registrar un nuevo turista</b></h5>
<p><br></p>
<form id="form">
  <div class="form-row">
    <div class="form-group col-md">
      <label for="name">Nombre:</label>
      <input type="text" name="name"class="form-control" id="name">
    </div>
    <div class="form-group col-md">
      <label for="firstName1">Primer apellido:</label>
      <input type="text"  name="firstName1" class="form-control" id="firstName1">
    </div>
    <div class="form-group col-md">
    <label for="firstName2">Segundo Apellido:</label>
    <input type="text" class="form-control" name="firstName2" id="firstName2">
  </div>
  </div>
 

  <div class="form-row">
  <div class="form-group col-md">
    <label for="email">Correo electronico:</label>
    <input type="email" class="form-control" id="email" placeholder="Micorreo@dominio.com">
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
      <a href=""<?=Base_url('atras')?>"" class="btn" style="background-color: #36907A; color:#FFFFFF">Regresar</a>
 <input type="submit" class="btn" style="background-color: #36907A; color:#FFFFFF" value="Registrar">
 </div>
</formmethod=>

<script src ="<?=Base_url()?>/CodeJS/turista.js"></script>

<?=$pie?>