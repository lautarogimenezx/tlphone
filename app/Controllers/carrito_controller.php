<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Carrito_model;
use App\Controllers\BaseController;
use Config\Services;
use App\Models\Producto_Model;
use App\Models\Usuarios_model;
use App\Models\Ventas_cabecera_model;
use App\Models\Ventas_detalle_model;
use App\Models\categoria_model;




class carrito_controller extends BaseController
{

    
    public function index()
    {
        $data['titulo']='Carrito de compras | tlphone';
        $cart = \Config\Services::Cart(); // Instancia del carrito
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('back/usuario/carrito', ['cart' => $cart]);
        echo view('front/whatsapp_view');
        echo view('front/footer_view');
    }
    
    public function __construct()
    {
        helper(['form', 'url', 'cart']);
        $this->session = \Config\Services::cart();
        $this->cart = \Config\Services::cart();
        $session = session();
    }


// Agrega items al carrito
        public function add()
        {
            $session = session();
            if (!$session->get('logged_in')) {
                return redirect()->to('/iniciosesion')->with('mensaje', 'Debes iniciar sesión para agregar productos al carrito.');
}
            $cart = \Config\Services::Cart();
            $request = \Config\Services::request();

            $cart->insert([
                'id'      => $request->getPost('id'),
                'qty'     => 1,
                'name'    => $request->getPost('nombre_prod'),
                'price'   => $request->getPost('precio_vta'),
                'options' => [
                    'imagen' => base_url('assets/uploads/' . $request->getPost('imagen'))
                ]
            ]);

            return redirect()->back()->withInput();
        }





// Actualiza el carrito que se muestra
public function actualiza_carrito()
{
    $cart = \Config\Services::Cart();
    $request = \Config\Services::request();

    $rowid = $request->getPost('rowid');
    $accion = $request->getPost('accion');

    // Obtener el ítem actual del carrito
    $item = $cart->getItem($rowid);
    if (!$item) {
        return redirect()->back()->with('mensaje', 'Ítem no encontrado en el carrito.');
    }

    $cantidadActual = $item['qty'];

    if ($accion === 'sumar') {
        $nuevaCantidad = $cantidadActual + 1;
    } elseif ($accion === 'restar') {
        $nuevaCantidad = max(1, $cantidadActual - 1); // nunca menos que 1
    } else {
        return redirect()->back()->with('mensaje', 'Acción inválida.');
    }

    // Actualizar
    $cart->update([
        'rowid' => $rowid,
        'qty'   => $nuevaCantidad,
    ]);

    return redirect()->back()->with('mensaje', 'Cantidad actualizada.');
}




// Elimina un item del carrito
public function eliminar_item()
{
    $cart = \Config\Services::Cart();
    $request = \Config\Services::request();

    $rowid = $request->getPost('rowid');
    $cart->remove($rowid);

    return redirect()->back()->with('mensaje', 'Ítem eliminado del carrito.');
}


// Vacía el carrito
public function vaciar_carrito()
{
    $cart = \Config\Services::Cart();
    $cart->destroy();

    return redirect()->back()->with('mensaje', 'Carrito vaciado con éxito.');
}

// Devuelve el contenido actual del carrito
public function devolver_carrito()
{
    $cart = \Config\Services::Cart();
    return $cart->contents();
}

public function finalizarCompra()
{
    $data['titulo'] = 'Confirmar Compra';
    $cart = \Config\Services::Cart();

    if (empty($cart->contents())) {
        return redirect()->to(base_url('carrito'))->with('mensaje', 'Tu carrito está vacío.');
    }

    echo view('front/head_view', $data);
    echo view('front/nav_view');
    echo view('back/compras/finalizar_compra', ['cart' => $cart]);
    echo view('front/footer_view');
}

public function borrar_carrito()
{
    $cart = \Config\Services::Cart();
    $cart->destroy();
}

}

