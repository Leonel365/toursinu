<?php

namespace App\Controllers;

use App\Models\hotel;

class Hoteles extends BaseController
{
    public function index(){
        $tipo = "index";     
        $user['tipo'] = $tipo;
        $data['cabecera'] = view('templates/cabecera', $user);
       $data['pie'] = view('templates/footer');
 
        
         return view('hoteles', $data);
    }

    public function hotelesUser(){

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

      return view('hoteles', $data);
  }
    public function validarHotel(){
      
        $db = \Config\Database::connect();
      
        $nombreHotel = $this->request->getVar('name');
        $direccionHotel = $this->request->getVar('direccion');
        $user = $this->request->getVar('correo');
        $Foto = $this->request->getVar('imagen');
        $contrasena1 = $this->request->getVar('password');
        $contrasena2 = $this->request->getVar('password2');
        $descripcion = $this->request->getVar('descripcion');

      if($contrasena1 != $contrasena2){
?>
      <script>
           window.parent.location="<?=Base_url('addHotel/1')?>";
      </script>  
  <?php
  
      }else{
        $imagen=$this->request->getFile('imagen');
        $nuevoNombre= $imagen->getRandomName();
        $imagen->move('../public/catalogoH/',$nuevoNombre);

        $password = sha1($contrasena1);
       
       $sql = "INSERT INTO hoteles (descripcion, nombre, direccion, usuario, contrasena) VALUES ('$descripcion','$nombreHotel','$direccionHotel','$user','$password')";
       $query = $db->query($sql);

      $sql = "SELECT MAX(idHoteles) as id FROM hoteles";
      $query = $db->query($sql);
      $results = $query->getResultArray();
  
        foreach ($results as $row){
            $idHotel = $row['id'];
        }
        
        $sql = "INSERT INTO catalogo_hotel (idHoteles, foto) VALUES ('$idHotel','$nuevoNombre')";
        $query = $db->query($sql);
       ?>
        <script>
        window.parent.location="<?=Base_url('login')?>";
       </script> 
   <?php
      }


         
    }

    public function verHotel($id){
      $tipo = "index";     
      $user['tipo'] = $tipo;
      $data['cabecera'] = view('templates/cabecera', $user);
     $data['pie'] = view('templates/footer');
     $data['idHotel'] = $id;

      
       return view('registro/hotel/verHotel', $data);
  }
}