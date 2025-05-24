<?php
namespace App\Controllers;
Use App\Models\Producto_Model;
Use App\Models\Usuario_Model;
Use App\Models\Ventas_cabecera_model;
Use App\Models\Ventas_detalle_model;
Use App\Models\categoria_model;
Use CodeIgniter\Controller;

class Producto_controller extends Controller
{
    public function __construct()
    {
        helper(['url', 'form']);
        $session = session();
    }

    public function index()
    {
        $productoModel = new Producto_Model();
        $data['productos'] = $productoModel->getProductoAll();

        $dato['titulo'] = 'Crud productos';
        echo view('front/head_view',$dato);
        echo view('front/nav_view');
        echo view('back/administradores/productos_activos', $data);
        echo view('front/footer_view');
    }

    public function creaproducto()
    {
        $categoriasmodel = new categoria_model();
        $data['categorias'] = $categoriasmodel->getCategorias();

        $productoModel = new Producto_Model();
        $data['producto'] = $productoModel->getProductoAll();

        $dato['titulo'] = 'Alta productos';
        echo view('front/head_view',$dato);
        echo view('front/nav_view');
        echo view('back/administradores/alta_producto_view', $data);
        echo view('front/footer_view');
    }

    public function store()
    {
        $input = $this->validate([
            'nombre_prod' => 'required|min_length[3]',
            'categoria' => 'is_not_unique[categorias.id]',
            'precio' => 'required|numeric',
            'precio_vta' => 'required|numeric',
            'stock' => 'required',
            "stock_min" => 'required',
            'imagen' => 'uploaded[imagen]'
        ]);

        $productoModel = new Producto_Model();

        if(!$input)
        {
            $categoria_model = new categoria_model();
            $data['categorias'] = $categoria_model->getCategorias();
            $data['validation'] = $this->validator;
            
            $dato['titulo'] = 'Alta productos';
            echo view('front/head_view',$dato);
            echo view('front/nav_view');
            echo view('back/administradores/alta_producto_view', $data);
            echo view('front/footer_view');
        }else{
            $img = $this->request->getFile('imagen');
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH.'assets/uploads', $nombre_aleatorio);

            $data = [
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                'imagen' => $nombre_aleatorio,
                'categoria_id' => $this->request->getVar('categoria'),
                'precio' => $this->request->getVar('precio'),
                'precio_vta' => $this->request->getVar('precio_vta'),
                'stock' => $this->request->getVar('stock'),
                'stock_min' => $this->request->getVar('stock_min'),
            ];

            $producto = new Producto_Model();
            $producto->insert($data);
            session()->setFlashdata('success', 'Alta Exitosa...');
            return $this->response->redirect(site_url('crear'));
        }
    }
}