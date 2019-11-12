<?php

// LINKEAMOS MODEL Y VIEW
require_once "./model/productos_model.php";
require_once "./view/productos_view.php";
require_once "./model/categorias_model.php";
require_once "Seguridad.php";

class ProductosController extends Seguridad {

    private $model;
    private $view;

	function __construct(){
        // INICIALIZAMOS LAS CLASES MODEL Y VIEW
        $this->model = new ProductosModel();
        $this->view = new ProductosView();
        $this->categorias_model = new CategoriasModel();
    }

  

    // TRAE EL ARREGLO DE PRODUCTOS DEL MODEL Y LOS MUESTRA EN EL VIEW
    public function GetProductos(){
        $productos = $this->model->GetProductos();
        $this->view->DisplayProducto($productos);
    }
    // TRAE EL ARREGLO DE PRODUCTOS DEL MODEL Y LOS MUESTRA EN EL VIEW
    public function GetProductosAdm(){
        //$this->checkLogIn();
        $categorias = $this->categorias_model->GetCategorias();
        $productos = $this->model->GetProductos();
        $this->view->DisplayProductoAdm($productos,$categorias);
    }
    // TRAE UN PRODUCTO DEL MODEL Y LO MUESTRA EN EL VIEW
    public function Detalle($id){
        $productos = $this->model->GetProducto($id);
        $this->view->DisplayDetalle($productos);
    }
    // INSERTAR UN PRODUCTO EN LA TABLA
    public function InsertarProducto(){
        //$this->checkLogIn();
        $this->model->InsertarProducto($_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$_POST['categoria']);
        header(PRODUCTOS_ADM);
    }
    // BORRAR UN PRODUCTO DE LA TABLA
    public function BorrarProducto($id){
        //$this->checkLogIn();
        $this->model->BorrarProducto($id);
        header(PRODUCTOS_ADM);
    }
    // EDITAR UN PRODUCTO DE LA TABLA
    public function EditarProducto($id){
        $this->model->EditarProducto($_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$_POST['categoria']);
        header(PRODUCTOS_ADM);
    }
    // EDITAR UN PRODUCTO DE LA TABLA
    public function DisplayEditar($id){
        $categorias = $this->categorias_model->GetCategorias();
        $productos = $this->model->GetProducto($id);
        $this->view->DisplayEditar($productos,$categorias);
    }
}


?>
