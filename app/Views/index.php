
	<?=$cabecera?>
<p>
  <br><br>
</p>
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?=Base_url()?>/catalogo/malecon.jpg" height="350" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?=Base_url()?>/catalogo/rio.jpg" height="350" class="d-block w-100" alt="...">
     </div>
    <div class="carousel-item">
      <img src="<?=Base_url()?>/catalogo/manuel.jpeg" height="350" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
</div>

	<div  style="bottom: 20px; right: 20px; position: fixed; display: block;
  width: 50px;
  height: 50px;">
	<a href="<?=Base_url('publicar/0')?>" class="btn btn-primary" >
	<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-vector-pen" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10.646.646a.5.5 0 0 1 .708 0l4 4a.5.5 0 0 1 0 .708l-1.902 1.902-.829 3.313a1.5 1.5 0 0 1-1.024 1.073L1.254 14.746 4.358 4.4A1.5 1.5 0 0 1 5.43 3.377l3.313-.828L10.646.646zm-1.8 2.908-3.173.793a.5.5 0 0 0-.358.342l-2.57 8.565 8.567-2.57a.5.5 0 0 0 .34-.357l.794-3.174-3.6-3.6z"/>
  <path fill-rule="evenodd" d="M2.832 13.228 8 9a1 1 0 1 0-1-1l-4.228 5.168-.026.086.086-.026z"/>
	</svg>
</a>
	</div>


<?=$pie?>
</body>
</html>
