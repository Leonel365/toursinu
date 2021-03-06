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

    public function tipoMenu(){
      $db = \Config\Database::connect();
      session_start();
      $tipo =  $_SESSION['tipo_user'];
      $nombre = 'NN';
      $bandera = 0;
      $data['reserva'] = "si";
      if($tipo==='nn'){
        $data['tipo']  = "nn";
        $break;
      }else
      if($tipo!=='hotel'){
          $data['tipo']  = $tipo;
          $correo = $_SESSION['usuario'];
          $sql = "SELECT CONCAT(primer_nombre, ' ', primer_apellido) as nombre, idPersona FROM persona WHERE correo like '$correo'";
          $query = $db->query($sql);
          $results = $query->getResultArray();
      
      foreach ($results as $row){
          $nombre = $row['nombre'];
          $idPersona = $row['idPersona'];
      }
      $sql = "SELECT idTurista FROM turista WHERE idPersona = $idPersona";
      $query = $db->query($sql);
      $results = $query->getResultArray();

      foreach ($results as $row){
       $bandera = 1;
       $idTurista = $row['idTurista'];
    }
      
      $sql = "SELECT idEmpleado, idHoteles FROM empleado WHERE idPersona = $idPersona";
      $query = $db->query($sql);
      $results = $query->getResultArray();

      foreach ($results as $row){
      $bandera = 2;
      $idTrabajador = $row['idEmpleado'];
      $idHotel = $row['idHoteles'];
    }
    if($bandera===1){
      $data['idTurista'] = $idTurista;
    }
    if($bandera===2){
      $data['idEmpleado'] = $idTrabajador;
      $data['idHotel'] = $idHotel;
    }
      $data['idPersona'] = $idPersona;
      $user['tipo'] = $tipo;
      $user['nombre'] = $nombre;
      $data['cabecera'] = view('components/navbar', $user);
      $data['pie'] = view('templates/footer');

      }else{
        $correo = $_SESSION['usuarioHotel'];

        $sql = "SELECT nombre, idHoteles FROM hoteles WHERE usuario LIKE '$correo'";
        $query = $db->query($sql);
        $results = $query->getResultArray();
    
    foreach ($results as $row){
        $nombre = $row['nombre'];
        $idHotel = $row['idHoteles'];
    }
    $user['tipo'] = $tipo;
    $user['nombre'] = $nombre;
    $data['idHotel'] = $idHotel;
    $data['cabecera'] = view('components/navbar', $user);
   $data['pie'] = view('templates/footer');

      }
   return $data;

    }

    public function hotelesUser(){

      $data = $this->tipoMenu();
      
      return view('hotelesUser', $data);
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

  public function verHotelUser($id){

    $data = $this->tipoMenu();
      
   $data['idHotel'] = $id;

    
     return view('registro/hotel/verHotelUser', $data);
}
  public function AddTrabajador($estado){

    $data = $this->tipoMenu();
    $data['update'] = $estado; 

    return view('registro/hotel/AddTrabajador', $data);
}

public function habitacionesEmpleado($estado){

  $data = $this->tipoMenu();
  $data['update'] = $estado; 

  return view('registro/hotel/habitaciones', $data);
}

public function formAddHabitacion($estado){
  $data = $this->tipoMenu();
  $data['estado'] = $estado;

  return view('registro/empleado/formHabitacion', $data);

}


}