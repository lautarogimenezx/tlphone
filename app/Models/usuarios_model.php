<?php
namespace App\Models;
use CodeIgniter\Model;
class Usuarios_model extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuarios';
    protected $allowedFields = ['nombre', 'apellido','usuario', 'email', 'pass', 'perfil_id', 'baja'];

}


