<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['titulo']='tlphone | venta online';
        $data['msg'] = session()->getFlashdata('msg');

        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/home_view',$data);
        echo view('front/whatsapp_view');
        echo view('front/footer_view');
    }

    public function nosotros()
    {
        $data['titulo']='Nosotros | tlphone';
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/nosotros');
        echo view('front/whatsapp_view');
        echo view('front/footer_view');
    }

    public function contacto()
    {
        $data['titulo']='Contacto | tlphone';
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/contacto');
        echo view('front/whatsapp_view');
        echo view('front/footer_view');
    }
    
    public function terminos()
    {
        $data['titulo']='Términos y Condiciones | tlphone';
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/terminos');
        echo view('front/whatsapp_view');
        echo view('front/footer_view');
    }

    public function comercializacion()
    {
        $data['titulo']='Comercialización | tlphone';
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/comercializacion');
        echo view('front/whatsapp_view');
        echo view('front/footer_view');
    }

    public function registrarse()
    {
        $data['titulo']='Registrarse | tlphone';
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('back/usuario/registrarse');
        echo view('front/whatsapp_view');
        echo view('front/footer_view');
    }

    public function carrito()
    {
        $data['titulo']='Carrito de compras | tlphone';
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('back/usuario/carrito');
        echo view('front/whatsapp_view');
        echo view('front/footer_view');
    }

    public function favoritos()
    {
        $data['titulo']='Favoritos | tlphone';
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/favoritos');
        echo view('front/whatsapp_view');
        echo view('front/footer_view');
    }
}
