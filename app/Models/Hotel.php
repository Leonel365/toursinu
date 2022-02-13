<?php 
namespace App\Models;

use CodeIgniter\Model;

class Hotel extends Model{
    protected $table      = 'hoteles';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'idHoteles';
     protected $allowedFields = ['descripcion','nombre','direccion', 'usuario', 'contrasena'];
}