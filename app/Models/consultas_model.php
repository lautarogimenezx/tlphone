<?php

namespace App\Models;

use CodeIgniter\Model;

class Consultas_model extends Model
{
    

    protected $table = 'consultas'; // tu tabla real
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'email', 'mensaje', 'fecha', 'respondido'];

    protected $useTimestamps = false;

    // Método opcional para guardar con validación extra si necesitás
    public function guardar_consulta($data)
    {
        return $this->insert($data);
    }

    public function cambiarEstado($id, $nuevoEstado)
    {
    return $this->update($id, ['respondido' => $nuevoEstado]);
    }

}
