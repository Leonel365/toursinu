<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>TourSinú</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light"  style="background-color: #36907A">
<a class="navbar-brand" href="<?=Base_url('home')?>">
    <img src="<?=Base_url()?>/photo/logo.png" width="100px" height="30" alt="TourSinú">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarScroll">
    <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
      <li class="nav-item active">
        <a class="nav-link" href="<?=Base_url('home')?>"><b style="color:  #FDFEFE">Inicio</b> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=Base_url('lugares/user')?>"><b style="color:  #FDFEFE">Lugares</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=Base_url('hoteles/user')?>"><b style="color:  #FDFEFE">Hoteles</b></a>
      </li>
    
      <?php
        if($tipo==='turista')
{
?>
      <li class="nav-item">
        <a class="nav-link" href="<?=Base_url('publicar/0')?>"><b style="color:  #FDFEFE">Publicar</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=Base_url('#')?>"><b style="color:  #FDFEFE">Reservas</b></a>
      </li>

      <?php
}

        if($tipo==='empleado')
{
?>
      <li class="nav-item">
        <a class="nav-link" href="<?=Base_url('#')?>"><b style="color:  #FDFEFE">Reservas pendientes</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=Base_url('#')?>"><b style="color:  #FDFEFE">Reservas aprobadas</b></a>
      </li>

      <?php
}
?>
      </ul>
     
    
  
    <?php
    if($tipo==="index"){
?>
    <a class="nav-link" href="<?=Base_url('login')?>">
      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16" style="color: #FDFEFE">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
      </a>

      <?php
   }else{
?>
  <ul class="navbar-nav" style="max-height: 100px;">
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16" style="color: #FDFEFE">
      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
    </svg>
          </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><?php echo $nombre;?></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?=Base_url('logout')?>">Cerrar sesión</a>
        </div>
      </li>
     </ul>
      <?php
   }
?>
<form class="d-flex"  method="post" action="<?=Base_url('#')?>" enctype="multipart/form-data">
      <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search" name="buscar" >
      <button class="btn btn-outline-light" type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" style="color: #FDFEFE">
      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
</button>
    </form> 
  </div>
</nav>


    <div class="container">