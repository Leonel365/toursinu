<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function index()
    {

        $user['tipo'] = 'index';
        $data['cabecera'] = view('templates/cabecera', $user);
       $data['pie'] = view('templates/footer');
       
        return view('index', $data);
    }

    public function registrar_1()
    {
        ?>
		<script>
		window.parent.location="<?=Base_url('registrar')?>";
		</script>
<?php
    }

    public function cerrarSesion()
    {
        @session_start();
        session_destroy();
        ?>
		<script>
		window.parent.location="<?=Base_url('/')?>";
		</script>
<?php
    }
    public function registrar()
    {

  
        $user['tipo'] = 'index';
        $data['cabecera'] = view('templates/cabecera', $user);
       $data['pie'] = view('templates/footer');
       
        return view('registro/index', $data);
    }

    public function Home()
    {

       $db = \Config\Database::connect();
       session_start();
       $tipo = "index";
       $nombre = 'NN';
       if($_SESSION['usuario']!= '0'){
           $correo = $_SESSION['usuario'];
           $tipo = $_SESSION['tipo_user'];
           $sql = "SELECT CONCAT(primer_nombre, ' ', primer_apellido) as nombre FROM persona WHERE correo like '$correo'";
           $query = $db->query($sql);
           $results = $query->getResultArray();
       
       foreach ($results as $row){
           $nombre = $row['nombre'];
       }
       }
    
       $user['tipo'] = $tipo;
       $user['nombre'] = $nombre;
       $data['cabecera'] = view('components/navbar', $user);
      $data['pie'] = view('templates/footer');

        return view('index', $data);
    }
    public function publicar($estado)
    {
        $db = \Config\Database::connect();
        session_start();
        $tipo = "index";
        $nombre = 'NN';
        if($_SESSION['usuario']){
            $correo = $_SESSION['usuario'];
            $tipo = $_SESSION['tipo_user'];
            $sql = "SELECT CONCAT(primer_nombre, ' ', primer_apellido) as nombre FROM persona WHERE correo like '$correo'";
            $query = $db->query($sql);
            $results = $query->getResultArray();
        
        foreach ($results as $row){
            $nombre = $row['nombre'];
        }
        }
     
        $user['tipo'] = $tipo;
        $user['nombre'] = $nombre;
        $data['cabecera'] = view('components/navbar', $user);
       $data['pie'] = view('templates/footer');
       $data['estado'] = $estado;
       
        return view('publicar', $data);
    }

    public function addTurista($estado)
    {

        $tipo = "index";
     
        $user['tipo'] = $tipo;
        $data['cabecera'] = view('templates/cabecera', $user);
       $data['pie'] = view('templates/footer');
       $data['estado'] = $estado;
       
        return view('registro/turista/turista', $data);
    }

    public function addHotel($estado)
    {

        $tipo = "index";
     
       $user['tipo'] = $tipo;
       $data['cabecera'] = view('templates/cabecera', $user);
       $data['pie'] = view('templates/footer');
       $data['estado'] = $estado;
       
        return view('registro/hotel/hotel', $data);
    }


}
