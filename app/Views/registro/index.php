<?=$cabecera?>
<p><br></p>
    <div class="row">

    <h5 class="modal-title w-100 text-center" style="color: #36907A"><b>Desea registrarse como</b></h5>
    <p><br><br></p>
    <div class ="col-2" >
</div>
        <div class ="col-sm" >
        <div class="card" style="width: 18rem; border: none">
        <a  href="<?=Base_url('addTurista')?>"><img src="<?=Base_url()?>/photo/turistas.png" class="card-img-top" alt="Registro como Turista"></a>  
            <div class="card-body">
                 <a href="<?=Base_url('addTurista')?>" style="background-color: #36907A; color:#FFFFFF" class="btn btn-block">Turista</a>
            </div>
            </div>

  
        </div>

        <div class ="col-sm" >
        <div class="card" style="width: 18rem; border: none">
        <a href="<?=Base_url('addHotel')?>" ><img src="<?=Base_url()?>/photo/hoteles.png" class="card-img-top" alt="Registro como Hotel"></a>
            <div class="card-body">
       
              <a href="<?=Base_url('addHotel')?>" style="background-color: #36907A; color:#FFFFFF" class="btn btn-block">Hotel</a>
          
            </div>
            </div>

    
        </div>

       
    </div>

<?=$pie?>