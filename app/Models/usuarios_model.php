<?php
namespace App\Models;
use CodeIgniter\Model;
class Usuarios_model extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuarios';
    protected $allowedFields = ['nombre', 'apellido','usuario', 'email', 'pass', 'perfil_id', 'baja'];

    public function getUsuarioPorId($id)
    {
        return $this->where('id_usuarios', $id)->first();
    }

    public function actualizarPerfil($id, $data)
    {
        return $this->update($id, $data);
    }

}


