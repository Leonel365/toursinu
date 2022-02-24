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
       
       $sql = "INSERT INTO persona(primer_nombre, primer_apellido, segundo_apellido, usuario, contrasena, correo, estado) VALUES ('$nombre','$apellido1','$apellido2','$correo','$password','$correo', '0')";
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

        $menu = new Hoteles();
        $data = $menu->tipoMenu();

        return view('registro/turista/reservas', $data);
    }

    public function inspeccionar($idReserva){
        
        $db = \Config\Database::connect();

        $menu = new Hoteles();
        $data = $menu->tipoMenu();
        $data['reservaId'] = $idReserva; 
      

        return view('registro/turista/inspeccionar', $data);
    }

}