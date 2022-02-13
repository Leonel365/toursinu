<?php

namespace App\Controllers;

use App\Models\hotel;

class Turistas extends BaseController
{
    public function validarTurista(){
        $db = \Config\Database::connect();
      
        $nombre = $this->request->getVar('name');
        $apellido1 = $this->request->getVar('firstName1');
        $apellido2 = $this->request->getVar('firstName2');
        $correo = $this->request->getVar('correo');
        $contrasena1 = $this->request->getVar('password');
        $contrasena2 = $this->request->getVar('password2');
        $existe = -1;
        $idPersona = -1;

        $sql = "SELECT idPersona FROM persona WHERE correo like '$correo'";
        $query = $db->query($sql);
        $results = $query->getResultArray();
  
        foreach ($results as $row){
            $existe = 1;
        }

      if($contrasena1 != $contrasena2){
?>
      <script>
           window.parent.location="<?=Base_url('addTurista/1')?>";
      </script>  
  <?php
  
      } if($existe>0){
        ?>
        <script>
             window.parent.location="<?=Base_url('addTurista/2')?>";
        </script>  
    <?php
      }else{

        $password = sha1($contrasena1);
       
       $sql = "INSERT INTO persona(primer_nombre, primer_apellido, segundo_apellido, usuario, contrasena, correo) VALUES ('$nombre','$apellido1','$apellido2','$correo','$password','$correo')";
       $query = $db->query($sql);

       $sql = "SELECT MAX(idPersona) as id FROM persona ";
      $query = $db->query($sql);
      $results = $query->getResultArray();
  
        foreach ($results as $row){
            $idPersona = $row['id'];
        }
        
        $sql = "INSERT INTO turista(idPersona) VALUES ('$idPersona')";
        $query = $db->query($sql);

       ?>
        <script>
        window.parent.location="<?=Base_url('login')?>";
       </script> 
   <?php
      }
    }

    public function Reservas()
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

        return view('registro/turista/reservas', $data);
    }

}