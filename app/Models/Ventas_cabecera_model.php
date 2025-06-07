<?php

namespace App\Models;

use CodeIgniter\Model;

class Ventas_cabecera_model extends Model
{
    protected $table = 'ventas_cabecera';
    protected $primaryKey = 'id'; // ajusta si tu clave primaria es distinta
    protected $allowedFields = ['usuario_id', 'fecha', 'total']; // ajusta según tus columnas

    public function getVentas()
    {
        return $this->findAll(); // devuelve todas las filas de la tabla
    }
}

