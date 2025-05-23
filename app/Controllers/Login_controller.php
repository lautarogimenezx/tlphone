<?php
namespace App\Controllers;

use App\Models\Usuarios_model;
use CodeIgniter\Controller;

class Login_controller extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function index()
    {
        $data['titulo']='Iniciar sesión | tlphone';
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('back/usuario/iniciosesion');
        echo view('front/whatsapp_view');
        echo view('front/footer_view');
    }

    public function auth()
    {
        $session = session();
        $model = new Usuarios_model();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('pass');

        $data = $model->where('email', $email)->first();

        if ($data) {
            if ($data['baja'] === 'SI') {
                $session->setFlashdata('msg', 'Usuario dado de baja');
                return redirect()->to('/iniciosesion');
            }

            if (password_verify($password, $data['pass'])) {
                $ses_data = [
                    'id_usuario' => $data['id_usuarios'],
                    'nombre'     => $data['nombre'],
                    'apellido'   => $data['apellido'],
                    'email'      => $data['email'],
                    'usuario'    => $data['usuario'],
                    'perfil_id'  => $data['perfil_id'],
                    'logged_in'  => true
                ];
                $session->set($ses_data);
                $session->setFlashdata('msg', '¡Bienvenido!');
                return redirect()->to('/'); 
            } else {
                $session->setFlashdata('msg', 'Contraseña incorrecta');
                return redirect()->to('/iniciosesion');
            }
        } else {
            $session->setFlashdata('msg', 'El correo no está registrado');
            return redirect()->to('/iniciosesion');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
