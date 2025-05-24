<?php

namespace App\Models;

use CodeIgniter\Model;

class categoria_model extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id';
    protected $allowedFields = ['descripcion', 'activo'];

    public function getCategorias()
    {
        return $this->where('activo', 1)->findAll();
    }

    public function getProductoAll()
    {
        // Devuelve solo productos NO eliminados
        return $this->where('eliminado', 0)->findAll();
    }
}
