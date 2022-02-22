<?php

namespace App\Controllers;

use App\Models\hotel;

class Trabajador extends BaseController
{
  
    public function __construct(){
         
    }
    public function formAdd($estado){
        $menu = new Hoteles();
        $data = $menu->tipoMenu();
        $data['estado'] = $estado;

        return view('registro/empleado/formTrabajador', $data);

    }

    public function validarForm(){
        
        $db = \Config\Database::connect();

        $menu = new Hoteles();
        $data = $menu->tipoMenu();
      
        $nombre = $this->request->getVar('name');
        $apellido1 = $this->request->getVar('firstName1');
        $apellido2 = $this->request->getVar('firstName2');
        $rol = $this->request->getVar('rol');
        $correo = $this->request->getVar('correo');
        $contrasena1 = $this->request->getVar('password');
        $contrasena2 = $this->request->getVar('password2');
        $existe = -1;
        $idPersona = -1;
        $idHotel = $data['idHotel'];

        $sql = "SELECT idPersona FROM persona WHERE correo like '$correo'";
        $query = $db->query($sql);
        $results = $query->getResultArray();
  
        foreach ($results as $row){
            $existe = 1;
        }

      if($contrasena1 != $contrasena2){
?>
      <script>
           window.parent.location="<?=Base_url('form/trabajador/1')?>";
      </script>  
  <?php
  
      } if($existe>0){
        ?>
        <script>
             window.parent.location="<?=Base_url('form/trabajador/2')?>";
        </script>  
    <?php
      }else{
        $fecha = date('Y-m-d-H-i-s');
        $password = sha1($contrasena1);
       
       $sql = "INSERT INTO persona(primer_nombre, primer_apellido, segundo_apellido, usuario, contrasena, correo, estado) VALUES ('$nombre','$apellido1','$apellido2','$correo','$password','$correo', '0')";
       $query = $db->query($sql);

       $sql = "SELECT MAX(idPersona) as id FROM persona ";
      $query = $db->query($sql);
      $results = $query->getResultArray();
  
        foreach ($results as $row){
            $idPersona = $row['id'];
        }
        
        $sql = "INSERT INTO empleado(idPersona, idHoteles, cargo, fecha_contratacion) VALUES ('$idPersona','$idHotel','$rol','$fecha')";
        $query = $db->query($sql);

       ?>
        <script>
        window.parent.location="<?=Base_url('trabajadores/list/0')?>";
       </script> 
   <?php
      }

    }

    public function validarFormHab(){
        
        $db = \Config\Database::connect();

        $menu = new Hoteles();
        $data = $menu->tipoMenu();
      
        $tipo = $this->request->getVar('tipo');
        $precio = $this->request->getVar('precio');
        $descripcion = $this->request->getVar('descripcion');
        
        $imagen=$this->request->getFile('imagen');
        $nuevoNombre= $imagen->getRandomName();
        $imagen->move('../public/catalogoH/',$nuevoNombre);
        $idHotel = $data['idHotel'];

        $sql = "INSERT INTO habitaciones(idHoteles, precio, descripcion, tipo, estado, foto) VALUES ('$idHotel','$precio','$descripcion','$tipo','0','$nuevoNombre')";
        $query = $db->query($sql);

        ?>
        <script>
        window.parent.location="<?=Base_url('empleado/habitaciones/1')?>";
       </script> 
   <?php
  
      }

    

    public function formEdit($idPersona){
        
        $menu = new Hoteles();
        $data = $menu->tipoMenu();
        $data['idEmpleado'] = $idPersona;

        return view('registro/empleado/formEdit', $data);
    }

    public function formEditHab($habitacion){
        
        $menu = new Hoteles();
        $data = $menu->tipoMenu();
        $data['idHabitacion'] = $habitacion;

        return view('registro/empleado/formEditHab', $data);
    }


    public function updateTrabajador(){
           
        $db = \Config\Database::connect();

        $menu = new Hoteles();
        $data = $menu->tipoMenu();
      
        $nombre = $this->request->getVar('name');
        $apellido1 = $this->request->getVar('firstName1');
        $apellido2 = $this->request->getVar('firstName2');
        $rol = $this->request->getVar('rol');
        $idEmpleado = $this->request->getVar('idEmpleado');
       
        $sql  = "SELECT idPersona as id FROM empleado WHERE idEmpleado = $idEmpleado";
        $query = $db->query($sql);
        $results = $query->getResultArray();
        foreach ($results as $row){
            $idPersona = $row['id'];
        }
        

        $sql = "UPDATE persona SET primer_nombre='$nombre',primer_apellido='$apellido1',segundo_apellido='$apellido2' WHERE idPersona = $idPersona";
        $query = $db->query($sql);
        

        $sql = "UPDATE empleado SET cargo='$rol' WHERE idEmpleado = $idEmpleado";
        $query = $db->query($sql);
       


        ?>        
        <script>
        window.parent.location="<?=Base_url('trabajadores/list/1')?>";
       </script> 
   <?php
      
    }

    public function editHabitacion(){
           
        $db = \Config\Database::connect();

        $menu = new Hoteles();
        $data = $menu->tipoMenu();
      
        $idHabitacion = $this->request->getVar('idHabitacion');
        $precio = $this->request->getVar('precio');
        $descripcion = $this->request->getVar('descripcion');
        $tipo = $this->request->getVar('tipo');

        $sql = "UPDATE habitaciones SET precio = '$precio', descripcion='$descripcion', tipo='$tipo', estado='' WHERE idHabitaciones = $idHabitacion";
        $query = $db->query($sql);

        ?>        
        <script>
        window.parent.location="<?=Base_url('empleado/habitaciones/1')?>";
       </script> 
   <?php
      
    }

    public function eliminarTrabajador($idPersona){
           
        $db = \Config\Database::connect();
       
        $sql  = "UPDATE persona SET estado='1' WHERE idPersona  = $idPersona";
        $query = $db->query($sql);
      
        ?>        
        <script>
        window.parent.location="<?=Base_url('trabajadores/list/2')?>";
       </script> 
   <?php
      
    }

    public function eliminarHabitacion($idHabitacion){
           
        $db = \Config\Database::connect();
       
        $sql  = "UPDATE habitaciones SET estado='1' WHERE idHabitaciones  = $idHabitacion";
        $query = $db->query($sql);
      
        ?>        
        <script>
        window.parent.location="<?=Base_url('empleado/habitaciones/1')?>";
       </script> 
   <?php
      
    }

    public function habilitarTrabajador($idPersona){
           
        $db = \Config\Database::connect();
       
        $sql  = "UPDATE persona SET estado='0' WHERE idPersona  = $idPersona";
        $query = $db->query($sql);
      
        ?>        
        <script>
        window.parent.location="<?=Base_url('trabajadores/list/2')?>";
       </script> 
   <?php
      
    }
    public function habilitarHabitacion($idHabitacion){
           
        $db = \Config\Database::connect();
       
        $sql  = "UPDATE habitaciones SET estado='0' WHERE idHabitaciones  = $idHabitacion";
        $query = $db->query($sql);
      
        ?>        
        <script>
        window.parent.location="<?=Base_url('empleado/habitaciones/1')?>";
       </script> 
   <?php
      
    }
    

  
}