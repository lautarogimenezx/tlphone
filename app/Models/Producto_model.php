<?php
namespace App\Models;

use CodeIgniter\Model;

class Producto_model extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre_prod', 'imagen', 'categoria_id', 'precio', 'precio_vta', 'stock', 'stock_min', 'detalles', 'eliminado'];

    public function getBuilderProductos()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('productos');
        $builder->select('productos.*, categorias.descripcion as categoria_desc');
        $builder->join('categorias', 'categorias.id = productos.categoria_id');

        return $builder;
    }

    public function getProducto($id = null)
    {
        $builder = $this->getBuilderProductos();
        $builder->where('productos.id', $id);
        $query = $builder->get();

        return $query->getRowArray();
    }
    
    public function updateStock($id = null, $stock_actual = null)
    {
        return $this->update($id, ['stock' => $stock_actual]);
    }

    public function getProductoAll()
    {
        $builder = $this->getBuilderProductos();
        $builder->where('productos.eliminado', 'NO');
        $query = $builder->get();

        return $query->getResultArray();
    }
}
