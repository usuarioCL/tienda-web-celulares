<?php

namespace App\Models;

use CodeIgniter\Model;

class CelularModel extends Model
{
    protected $table = 'celulares';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $primaryKey = 'id';
    protected $allowedFields = ['modelo', 'marca', 'precio', 'almacenamiento', 'ram', 'descripcion', 'imagen'];
}
