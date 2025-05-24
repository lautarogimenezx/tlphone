<?php
namespace App\Models;

use CodeIgniter\Model;

class Producto_model extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre_prod', 'imagen', 'categoria_id', 'precio', 'precio_vta', 'stock', 'stock_min', 'detalles', 'eliminado'];

    public function getProductoAll()
    {
        return $this->where('eliminado', 'NO')->findAll(); // Solo productos activos
    }

}
