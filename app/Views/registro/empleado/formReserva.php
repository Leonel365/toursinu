<?php
 $db = \Config\Database::connect();
echo $cabecera;
   
    $sql = "SELECT idHabitaciones, idHoteles, precio, descripcion, tipo, estado, foto FROM habitaciones WHERE idHabitaciones = $idHabitacion";
    $query = $db->query($sql);
    $results = $query->getResultArray();

    foreach ( $results as $hotel){
       $idHab = $hotel['idHabitaciones'];
       $idHotele = $hotel['idHoteles'];
       $descripcion = $hotel['descripcion'];
       $precio = $hotel['precio'];
       $tipo = $hotel['tipo'];
       $foto = $hotel['foto'];
   }
    ?>

<p><br><br></p>
    <div class="row">
        <div class="col-sm">
        <img src="<?=Base_URL()?>/catalogoH/<?php echo $foto;?>" class="img-fluid" class="img-circle"alt="...">
        <br>
        <div>
            <br>
            <a class="btn btn-block btn-sm" style="background-color: #36907A; color:#FFFFFF" onclick="window.location.href = document.referrer; return false;">Regresar</a> 
        </div>      
        </div>

        <div class="col-sm">
           <div class="text-center"><h3 style="color: #36907A">Información del la habitación</h3></div>
           <br>
           <div class ="row">
                <div class ="col-sm">
                <p> <h5 style="color: #36907A">Tipo de hanitación</h5><?=$tipo?></p> 
                </div>

                <div class ="col-sm">
                <p> <h5 style="color: #36907A">Precio por noche</h5><?php echo "$ ".$precio." COP"?></p> 
                </div>

           </div>
           <br>
         <div class="text-center">  <h5 style="color: #36907A">Servicios - Detalles</h5></div>
           <p class="text-justify"><?=$descripcion?> 
        <br><br>
        
      </p>


        </div>

    </div>
    <p><br><br></p>

    <p class="text-center">
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Reservar Habitación
        </button>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
           
                    <form name="calc" method="POST" action="<?=Base_url('addReserva')?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md">
                                <label for="tipo">Tiempo de hospedaje (días):</label>
                                <input type="hidden" name="idHabitacion" value= "<?=$idHab?>">
                                <input type="dias" name="dias" required  class="form-control" id="dias">
                            </div>
                            <div class="col-md">
                                <label for="valor">Valor a cancelar:</label>
                                <input type="hidden" name="precioHabitacion" value = "<?=$precio?>">
                                <input type="text" name="valor" readonly required  class="form-control" id="valor">
                            </div>
                           
         
              
                            <div class="col-md">
                                <label for="imagen">Abjuntar comprobante de pago:</label>
                                <input type="file"  name="imagen" required class="form-control" id="imagen">
                            </div>
                            <div class="col-md"> 
                            <br>
                            <a class="btn btn-info" onclick="calcula('*')" >Calcular</a> 
                                <input type="submit" class="btn btn-success" id="boton" style="color:#FFFFFF" value="Enviar">
                            </div> 
                        </div>
            
                        
                    </form>

            <script>
                 function calcula(operacion){
         
                        var dia = document.calc.dias.value
                        var precio = document.calc.precioHabitacion.value
                        var result = eval(dia + operacion + precio) 
                        document.calc.valor.value = result
                        
                }
            </script>
           
        </div>
    </div>


    <?=$pie?>

