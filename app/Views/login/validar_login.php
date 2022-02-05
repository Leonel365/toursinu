
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <title>Ecotour</title>
</head>
<body style="background-color:#E3FFF8">
<div class="text-center">
    <img class="block-center" src="<?=BAse_URL()?>/photo/login.png" width="120px">
                              
</div>
<?php 
   if(session('mensaje')){
    $tipo = session('mensaje');
       ?>
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡El correo o contraseña son erroneos!'
            })
        </script>

<?php
   } ?>

<form method="POST" action="<?=Base_url('validar_user')?>">

        <input type="hidden" name="tipo" value="<?=$tipo?>">
        
    <div class="form-group">
        <label for="user">Correo:</label>
        <input id="user" type="text" name="user" class="form-control">
    </div>
    <div class="form-group">
        <label for="password">Contraseña:</label>
        <input id="password" type="password" name="password" class="form-control">
    </div>
 
    <div class="text-center">
        <div class="text-center">
            <a href="<?=Base_url('lobby')?>"><b>¿Aún no tienens una cuenta?</b></a>
        </div>
        <br>
        <input type="submit" class="btn" style="background-color: #36907A" value="Log In">
    </div>
</form>

</div>
</body>
</html>