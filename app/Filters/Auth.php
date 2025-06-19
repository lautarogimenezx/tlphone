<?php
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Si no está logueado, redirige al login
        if (!session()->get('logged_in')) {
            return redirect()->to('/iniciosesion');
        }

        // Si se necesita rol de admin, verifica perfil_id
        if ($arguments && in_array('admin', $arguments)) {
            if (session()->get('perfil_id') != 1) {
                return redirect()->to('/iniciosesion');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}