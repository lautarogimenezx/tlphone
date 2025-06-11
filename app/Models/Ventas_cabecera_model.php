<?php

namespace App\Models;

use CodeIgniter\Model;

class Ventas_cabecera_model extends Model
{
    protected $table = 'ventas_cabecera';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario_id', 'fecha', 'total_venta'];

    /**
     * Devuelve todas las ventas del usuario dado, o todas si no se pasa ID.
     */
    public function getVentas($usuario_id = null)
    {
        if ($usuario_id !== null) {
            return $this->where('usuario_id', $usuario_id)->findAll();
        }

        return $this->findAll(); // usado por el admin
    }

    /**
     * Devuelve todas las ventas con info del usuario.
     */
    public function getTodasLasVentasConUsuarios()
    {
        return $this->select('ventas_cabecera.*, usuarios.id_usuarios, usuarios.nombre')
                    ->join('usuarios', 'usuarios.id_usuarios = ventas_cabecera.usuario_id')
                    ->orderBy('ventas_cabecera.fecha', 'DESC')
                    ->findAll();
    }

    public function getCabeceraConUsuario($venta_id)
    {
        return $this->select('ventas_cabecera.*, usuarios.nombre AS nombre_usuario')
            ->join('usuarios', 'usuarios.id_usuarios = ventas_cabecera.usuario_id')
            ->where('ventas_cabecera.id', $venta_id)
            ->first();
    }

}
