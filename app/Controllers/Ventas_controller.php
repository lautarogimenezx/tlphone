<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Producto_model;
use App\Models\Ventas_cabecera_model;
use App\Models\Ventas_detalle_model;
require_once(APPPATH . 'ThirdParty/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

class Ventas_controller extends Controller
{
    public function registrar_venta()
    {
        $session = session();
        require(APPPATH . 'Controllers/carrito_controller.php');
        $cartController = new \App\Controllers\carrito_controller();
        $carrito_contents = $cartController->devolver_carrito();

        $productoModel = new Producto_model();
        $ventasModel = new Ventas_cabecera_model();
        $detalleModel = new Ventas_detalle_model();

        $productos_validos = [];
        $productos_sin_stock = [];
        $total = 0;

        foreach ($carrito_contents as $item) {
            $producto = $productoModel->getProducto($item['id']);

            if ($producto && $producto['stock'] >= $item['qty']) {
                $productos_validos[] = $item;
                $total += $item['subtotal'];

            } else {
                $productos_sin_stock[] = $item['name'];
                $cartController->eliminar_item($item['rowid']);
            }
        }

        if (!empty($productos_sin_stock)) {
            $mensaje = 'Los siguientes productos no tienen stock suficiente y fueron eliminados del carrito: <br>' . implode(', ', $productos_sin_stock);
            $session->setFlashdata('mensaje', $mensaje);
            return redirect()->to(base_url('carrito'));
        }

        if (empty($productos_validos)) {
            $session->setFlashdata('mensaje', 'No hay productos válidos para registrar la venta.');
            return redirect()->to(base_url('carrito'));
        }

        $nueva_venta = [
            'usuario_id'   => $session->get('id_usuario'),
            'total_venta'  => $total
        ];
        $venta_id = $ventasModel->insert($nueva_venta);

        foreach ($productos_validos as $item) {
            $detalleModel->insert([
                'venta_id'    => $venta_id,
                'producto_id' => $item['id'],
                'cantidad'    => $item['qty'],
                'precio' => $item['price']

            ]);

            $producto = $productoModel->getProducto($item['id']);
            $productoModel->updateStock($item['id'], $producto['stock'] - $item['qty']);
        }

        $cartController->borrar_carrito();
        $session->setFlashdata('mensaje', '¡Venta registrada con éxito!');
        return redirect()->to(base_url('ventas/mis_compras'));
    }

    public function mis_compras()
    {
        $session = session();
        $id_usuario = $session->get('id_usuario');

        $ventasModel = new Ventas_cabecera_model();
        
        // Obtener solo las compras del usuario logueado
        $data['compras'] = $ventasModel->getVentas($id_usuario);
        $data['titulo'] = "Mis Compras";

        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/compras/vista_compras', $data); // ← vista correcta
        echo view('front/footer_view');
    }


public function ver_factura($venta_id)
{
    $session = session();
    $usuario_id = $session->get('id_usuario');
    $is_admin = $session->get('perfil_id') === '1'; 

    $ventasModel = new Ventas_cabecera_model();
    $detalleModel = new Ventas_detalle_model();

    if ($is_admin) {
        $cabecera = $ventasModel->getCabeceraConUsuario($venta_id);
    } else {
        $cabecera = $ventasModel
            ->select('ventas_cabecera.*, usuarios.nombre AS nombre_usuario')
            ->join('usuarios', 'usuarios.id_usuarios = ventas_cabecera.usuario_id')
            ->where('ventas_cabecera.id', $venta_id)
            ->where('ventas_cabecera.usuario_id', $usuario_id)
            ->first();
    }


    if (!$cabecera) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Factura no encontrada o acceso no autorizado');
    }

    $detalle = $detalleModel->getDetalles($venta_id);

    $data = [
        'cabecera' => $cabecera,
        'detalle' => $detalle,
        'titulo'   => "Factura de compra"
    ];

    echo view('front/head_view', $data);
    echo view('front/nav_view');
    echo view('back/compras/ver_factura_usuario', $data); // ← podés cambiar esta vista por otra para admin si querés
    echo view('front/footer_view');
}

public function ver_factura_admin($venta_id)
{
    $session = session();
    $usuario_id = $session->get('id_usuario');
    $is_admin = $session->get('perfil_id') === '1'; 

    $ventasModel = new Ventas_cabecera_model();
    $detalleModel = new Ventas_detalle_model();

    if ($is_admin) {
        $cabecera = $ventasModel->getCabeceraConUsuario($venta_id);
    } else {
        $cabecera = $ventasModel
            ->select('ventas_cabecera.*, usuarios.nombre AS nombre_usuario')
            ->join('usuarios', 'usuarios.id_usuarios = ventas_cabecera.usuario_id')
            ->where('ventas_cabecera.id', $venta_id)
            ->where('ventas_cabecera.usuario_id', $usuario_id)
            ->first();
    }


    if (!$cabecera) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Factura no encontrada o acceso no autorizado');
    }

    $detalle = $detalleModel->getDetalles($venta_id);

    $data = [
        'cabecera' => $cabecera,
        'detalle' => $detalle,
        'titulo'   => "Factura de compra"
    ];

    echo view('front/head_view', $data);
    echo view('front/nav_view');
    echo view('back/compras/ver_factura_admin', $data); // ← podés cambiar esta vista por otra para admin si querés
    echo view('front/footer_view');
}


    public function todas_las_ventas()
{
    $ventasModel = new \App\Models\Ventas_cabecera_model();
    $data['ventas'] = $ventasModel->getTodasLasVentasConUsuarios();
    $data['titulo'] = "Ventas Administrador";

    echo view('front/head_view', $data);
    echo view('front/nav_view');
    echo view('back/compras/todas_las_ventas', $data);
    echo view('front/footer_view');
}

    public function descargar_factura($venta_id)
    {
        $session = session();
        $usuario_id = $session->get('id_usuario');
        $is_admin = $session->get('perfil_id') === '1';

        $ventasModel = new \App\Models\Ventas_cabecera_model();
        $detalleModel = new \App\Models\Ventas_detalle_model();

        // Obtener cabecera con datos del usuario (JOIN en ambos casos)
        if ($is_admin) {
            $cabecera = $ventasModel->getCabeceraConUsuario($venta_id);
        } else {
            $cabecera = $ventasModel
            ->select('ventas_cabecera.*, usuarios.nombre AS nombre_usuario')
            ->join('usuarios', 'usuarios.id_usuarios = ventas_cabecera.usuario_id')
            ->where('ventas_cabecera.id', $venta_id)
            ->where('ventas_cabecera.usuario_id', $usuario_id)
            ->first();
        }

        if (!$cabecera) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Factura no encontrada o acceso no autorizado');
        }

        $detalle = $detalleModel->getDetalles($venta_id);

        $data = [
            'cabecera' => $cabecera,
            'detalle'  => $detalle
        ];

        // Renderizar HTML
        $html = view('back/compras/factura_pdf', $data, ['saveData' => true]);

        // Generar PDF
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Descargar
        $dompdf->stream("Factura_{$venta_id}.pdf", ['Attachment' => true]);
    }

}