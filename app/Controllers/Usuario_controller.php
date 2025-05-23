<?php
namespace App/Controllers;
use App/Models/Usuarios_model;
use <CodeIgniter/Controllers;

class Usuarios_controller extends Controllers{
    public function _construct(){
        helper(['form', 'url']);
    }

    public function create()
    {
        $data['titulo']='Registrarse | tlphone';
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/registro');
        echo view('back/usuario/registro')
        echo view('front/whatsapp_view');
        echo view('front/footer_view');
    }

    public function formValidation(){

        $input = $this->validate([
            'nombre' => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'usuario' => 'required|min_length[3]',
            'email' => 'required|min_length[3]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'pass' => 'required|min_length[3]|max_length[10]',

        ]);
    }

    $formModel +new Usuarios_model();
    
    if (!$input) {
        $data['titulo']='Registrarse | tlphone';
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/registro', ['validation' => $this -> validation]);
        echo view('front/whatsapp_view');
        echo view('front/footer_view');
    }
    else{
        $formModel->save([
            'nombre' => $this->request->getVar('nombre'),
            'apellido' =>$this->request->getVar('apellido'),
            'usuario' => $this->request->getVar('usuario'),
            'email' => $this->request->getVar('email'),
            'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT)

        ]);

        session()->setFlashdata('success', 'Usuario registrado con exito');
        return $this->response->redirect(to_url('/registro'));

    }

}
