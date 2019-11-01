<?php

// LINKEAMOS MODEL Y VIEW
require_once "./model/productos_model.php";
require_once "./view/productos_view.php";
require_once "./model/categorias_model.php";

class ProductosController {

    private $model;
    private $view;

	function __construct(){
        // INICIALIZAMOS LAS CLASES MODEL Y VIEW
        $this->model = new ProductosModel();
        $this->view = new ProductosView();
        $this->categorias_model = new CategoriasModel();
    }

    public function checkLogIn(){
        session_start();
        
        if(!isset($_SESSION['userId'])){
            header("Location: " . LOGIN);
            die();
        }

        if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) { 
            header("Location: " . LOGOUT);
            die(); // destruye la sesión, y vuelve al login
        } 
        $_SESSION['LAST_ACTIVITY'] = time();
    }

    // TRAE EL ARREGLO DE PRODUCTOS DEL MODEL Y LOS MUESTRA EN EL VIEW
    public function GetProductos(){
        $productos = $this->model->GetProductos();
        $this->view->DisplayProducto($productos);
    }
    // TRAE EL ARREGLO DE PRODUCTOS DEL MODEL Y LOS MUESTRA EN EL VIEW
    public function GetProductosAdm(){
        $this->checkLogIn();
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
        $this->checkLogIn();
        $this->model->InsertarProducto($_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$_POST['categoria']);
        header("Location: " . BASE_URL);
    }
    // BORRAR UN PRODUCTO DE LA TABLA
    public function BorrarProducto($id){
        $this->checkLogIn();
        $this->model->BorrarProducto($id);
        header("Location: " . BASE_URL);
    }
    // EDITAR UN PRODUCTO DE LA TABLA
    public function EditarProducto($id){
        $this->model->EditarProducto($_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$id);
        header("Location: " . BASE_URL);
    }
}


?>
