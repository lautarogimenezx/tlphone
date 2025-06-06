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
        $builder->select('*');
        $builder->join('categorias', 'categorias_id = productos.categoria_id');

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
        $builder = $this->getBuilderProductos();
        $builder->where('productos.id', $id);
        $builder->set('productos.stock', $stock_actual);
        $builder->update();
    }

    public function getProductoAll()
    {
        return $this->where('eliminado', 'NO')->findAll(); // Solo productos activos
    }
}
