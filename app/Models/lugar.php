<?php 
namespace App\Models;

use CodeIgniter\Model;

class Lugar extends Model{
    protected $table      = 'lugares';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'idLugares';
     protected $allowedFields = ['Descripcion','Direccion','Nombre'];
}