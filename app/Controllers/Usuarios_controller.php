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

    public function baja($id)
    {
        $usuarioModel = new Usuarios_model();
        $usuarioModel->update($id, ['baja' => 'SI']);
        session()->setFlashdata('success', 'Usuario dado de baja');
        return redirect()->to(site_url('usuarios'));
    }

    public function alta($id)
    {
        $usuarioModel = new Usuarios_model();
        $usuarioModel->update($id, ['baja' => 'NO']);
        session()->setFlashdata('success', 'Usuario reactivado');
        return redirect()->to(site_url('usuarios'));
    }

public function perfil()
{
    $session = session();
    $id = $session->get('id_usuario');

    $usuarioModel = new \App\Models\Usuarios_model();
    $data['usuario'] = $usuarioModel->getUsuarioPorId($id);
    $data['titulo'] = "Mi Perfil";

    echo view('front/head_view', $data);
    echo view('front/nav_view');
    echo view('back/usuario/mi_perfil', $data);
    echo view('front/footer_view');
}

public function actualizar_perfil()
{
    $session = session();
    $id = $session->get('id_usuario');

    $usuarioModel = new \App\Models\Usuarios_model();

    $data = [
        'nombre'   => $this->request->getPost('nombre'),
        'apellido' => $this->request->getPost('apellido'),
        'email'    => $this->request->getPost('email'),
        'usuario'  => $this->request->getPost('usuario'),
    ];

    if (!$this->validate([
        'email'   => 'required|valid_email',
        'nombre'  => 'required',
        'usuario' => 'required'
    ])) {
        return redirect()->back()->withInput()->with('mensaje', 'Datos inválidos');
    }

    $usuarioModel->actualizarPerfil($id, $data);
    $session->setFlashdata('mensaje', 'Perfil actualizado correctamente');
    return redirect()->to(base_url('usuario/perfil'));
}

    public function cambiarRol($id)
    {
        $usuarioModel = new \App\Models\Usuarios_model();
        $usuario = $usuarioModel->find($id);

        if ($usuario) {
            $nuevoRol = ($usuario['perfil_id'] == 1) ? 2 : 1;

            $usuarioModel->update($id, ['perfil_id' => $nuevoRol]);

            session()->setFlashdata('success', 'Rol del usuario actualizado');
        }

        return redirect()->to(site_url('usuarios'));
    }

}
