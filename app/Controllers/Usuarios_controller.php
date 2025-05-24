<?php
namespace App\Controllers;

use App\Models\Usuarios_model;
use CodeIgniter\Controller;

class Usuarios_controller extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function index()
    {
    $usuarioModel = new \App\Models\Usuarios_model();
    $data['usuarios'] = $usuarioModel->findAll();

    $dato['titulo'] = 'Usuarios Registrados';

    echo view('front/head_view', $dato);
    echo view('front/nav_view');
    echo view('back/administradores/usuarios_lista', $data); 
    echo view('front/footer_view');
    }


    public function create()
    {
        $data['titulo'] = 'Registrarse | tlphone';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/usuario/registrarse');
        echo view('front/whatsapp_view');
        echo view('front/footer_view');
    }

    public function formValidation()
    {
        $rules = [
            'nombre'    => 'required|min_length[3]',
            'apellido'  => 'required|min_length[3]|max_length[25]',
            'usuario'   => 'required|min_length[3]',
            'email'     => 'required|min_length[3]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'pass'      => 'required|min_length[3]|max_length[10]',
            'password2' => 'required|matches[pass]'
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $data['titulo'] = 'Registrarse | tlphone';

            // Renderizamos la vista con errores y datos ingresados
            echo view('front/head_view', $data);
            echo view('front/nav_view');
            echo view('back/usuario/registrarse', $data);
            echo view('front/whatsapp_view');
            echo view('front/footer_view');
            return;
        }

        $formModel = new Usuarios_model();
        $formModel->save([
            'nombre'    => $this->request->getVar('nombre'),
            'apellido'  => $this->request->getVar('apellido'),
            'usuario'   => $this->request->getVar('usuario'),
            'email'     => $this->request->getVar('email'),
            'pass'      => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT)
        ]);

        session()->setFlashdata('success', 'Usuario registrado con éxito');
        return redirect()->to('/registrarse');
    }
}
