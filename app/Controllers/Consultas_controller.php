<?php

namespace App\Controllers;

use App\Models\Consultas_model;

class Consultas_controller extends BaseController
{
    protected $consultasModel;

    public function __construct()
    {
        $this->consultasModel = new Consultas_model();
    }

    public function index()
    {
        $data['titulo'] = 'Contacto | tlphone';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/contacto');
        echo view('front/whatsapp_view');
        echo view('front/footer_view');
    }

    public function enviar()
    {
        $data = [
            'nombre'  => $this->request->getPost('nombre'),
            'email'   => $this->request->getPost('email'),
            'mensaje' => $this->request->getPost('mensaje'),
        ];

        $this->consultasModel->guardar_consulta($data);

        return redirect()->to('/contacto')->with('mensaje_exito', '¡Mensaje enviado con éxito!');
    }
    public function cambiarRespondido($id)
    {
        $consulta = $this->consultasModel->find($id);

        if (!$consulta) {
            return redirect()->back()->with('mensaje_error', 'Consulta no encontrada.');
        }

        $nuevoEstado = ($consulta['respondido'] === 'SI') ? 'NO' : 'SI';
        $this->consultasModel->cambiarEstado($id, $nuevoEstado);

        return redirect()->back()->with('mensaje_exito', 'Estado actualizado.');
    }
    public function eliminar($id)
    {
        $consulta = $this->consultasModel->find($id);

        if (!$consulta) {
            return redirect()->back()->with('mensaje_error', 'Consulta no encontrada.');
        }

        $this->consultasModel->delete($id);

        return redirect()->back()->with('mensaje_exito', 'Consulta eliminada correctamente.');
    }



    public function verConsultas()
    {
        $model = new \App\Models\Consultas_model();
        $data['consultas'] = $model->orderBy('fecha', 'DESC')->findAll();

        $data['titulo'] = 'Consultas | tlphone';

        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/administradores/consultas', $data);
        echo view('front/whatsapp_view');
        echo view('front/footer_view');
    }
}


