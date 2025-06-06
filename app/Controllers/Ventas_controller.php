<?php

namespace App\Controllers;


use App\Models\ventas_cabecera_model;
use CodeIgniter\Controller;
use App\Models\ventas_detalle_model;
use App\Models\producto_model;
use Dompdf\Dompdf;

class ventas_controller extends Controller
{

    public function __construct()
    {
        helper(['form', 'url', 'cart']);

        $session = session();
        $cart = \Config\Services::cart();
        $cart->contents();
    }