<?php

namespace App\Controllers;
use App\Models\lugar;
use App\Models\catalogoLugar;

class Lugares extends BaseController
{

    public function index()
    {
       
       $tipo = "index";     
       $user['tipo'] = $tipo;
       $data['cabecera'] = view('templates/cabecera', $user);
      $data['pie'] = view('templates/footer');

       
        return view('lugares', $data);
    }

    public function lugaresUser()
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
       
        return view('lugares', $data);
    }

    public function Lugares()
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
       $data['cabecera'] = view('templates/cabecera', $user);
      $data['pie'] = view('templates/footer');
       
        return view('lugares', $data);
    }

    public function login()
    {
        $user['tipo'] = 'index';
        $data['cabecera'] = view('templates/cabecera', $user);
        $data['pie'] = view('templates/footer');

       return view('login/login', $data);
    }

    public function validar_Login()
    {
        $user['tipo'] = 'index';
        $data['cabecera'] = view('templates/cabecera', $user);
        $data['pie'] = view('templates/footer');

       return view('login/validar_login', $data);
    }

    public function validar_User()
    {
        $db = \Config\Database::connect();
        $id_persona = -1;
        $idHotel = -1;
        $idUser = -1;
        
        $conexion = new  BaseController();
        $usario = $this->request->getVar('user');
		$password1= $this->request->getVar('password');
		$password = sha1($password1);

        $sql = "SELECT idPersona FROM persona WHERE usuario like '$usario' and contrasena like '$password'";
        $query = $db->query($sql);
        $results = $query->getResultArray();
        
        foreach ($results as $row){
            $id_persona = $row['idPersona'];
        }
         if($id_persona>0){
           
            $sql = "SELECT idTurista FROM turista WHERE idPersona = $id_persona";
            $query = $db->query($sql);
            $results = $query->getResultArray();
    
            foreach ($results as $row){
                $idUser = 1;
            }

            $sql = "SELECT idEmpleado FROM empleado WHERE idPersona = $id_persona";
            $query = $db->query($sql);
            $results = $query->getResultArray();
    
            foreach ($results as $row){
                $idUser = 2;
            }

            }

            $sql = "SELECT idHoteles FROM hoteles WHERE usuario like '$usario' and contrasena like '$password'";
            $query = $db->query($sql);
            $results = $query->getResultArray();
            
            foreach ($results as $row){
                $idHotel = $row['idHoteles'];
            }
      
        if($idHotel>0){
            session_start();
            $_SESSION['usuarioHotel']=$usario;
            $_SESSION['tipo_user']="hotel";
            
                ?>
                <script>
                window.parent.location="<?=Base_url('home')?>";
                </script>
        <?php
        }
        if($idUser>0){
            if($idUser===1){
                session_start();
				$_SESSION['usuario']=$usario;
				$_SESSION['tipo_user']="turista";
				
				}else{
                session_start();
				$_SESSION['usuario']=$usario;
				$_SESSION['tipo_user']="empleado";
			    }

            ?>  <script>
                window.parent.location="<?=Base_url('home')?>";
                </script>  <?php

        }else{
            $session = session();
            $session->setFlashdata('mensaje','ERROR');
            return redirect()->back()->withInput();
        }
            


    }

    public function validarLugar(){

        $lugar = new Lugar();
        $db = \Config\Database::connect();
        $nombreLugar = $this->request->getVar('placeName');
        $direccionLugar = $this->request->getVar('address');
        $descripcionLugar = $this->request->getVar('descripcion');

        $validation = $this->validate([
          'placeName' =>   'required|min_length[3]',
          'address' =>   'required|min_length[2]',
          'descripcion' =>   'required|min_length[5]',
        ]);

        $img = $this->validate([
            'imagen' =>[
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,2048]',
            ]
            ]);

            if(!$validation || !$img){
             return $this->response->redirect(site_url('publicar/1'));  

            }else{
                $fecha = date('Y-m-d-H-i-s');
                $imagen=$this->request->getFile('imagen');
                $nuevoNombre= $imagen->getRandomName();
                $imagen->move('../public/catalogo/',$nuevoNombre);
              
                    $sql = "INSERT INTO lugares(Descripcion, Direccion, Nombre, fecha) VALUES ('$descripcionLugar','$direccionLugar','$nombreLugar', '$fecha')";
                    $query = $db->query($sql);

                    $sql = "SELECT MAX(idLugares) as id FROM lugares";
                    $query = $db->query($sql);
                    $results = $query->getResultArray();
                    
                    foreach ($results as $row){
                        $idLugar = $row['id'];
                    }
              $sql="INSERT INTO catalogo_lugar(idLugares, foto) VALUES ('$idLugar','$nuevoNombre')";
              $query = $db->query($sql);
                    ?>  <script>
                    window.parent.location="<?=Base_url('home')?>";
                    </script>  <?php
                   }

        }
}