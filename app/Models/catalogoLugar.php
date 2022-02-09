<?php 
namespace App\Models;

use CodeIgniter\Model;

class catalogoLugar extends Model{
    protected $table      = 'catalogo_lugar';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'idLidCatalogougares';
     protected $allowedFields = ['idLugares','foto'];
}