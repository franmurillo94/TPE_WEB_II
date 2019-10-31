<?php

// LINKEAMOS MODEL Y VIEW
require_once "./model/productos_model.php";
require_once "./view/productos_view.php";

class ProductosController {

    private $model;
    private $view;

	function __construct(){
        // INICIALIZAMOS LAS CLASES MODEL Y VIEW
        $this->model = new ProductosModel();
        $this->view = new ProductosView();
    }

    // TRAE EL ARREGLO DE PRODUCTOS DEL MODEL Y LOS MUESTRA EN EL VIEW
    public function GetProductos(){
        $productos = $this->model->GetProductos();
        $this->view->DisplayProducto($productos);
    }
    // TRAE UN PRODUCTO DEL MODEL Y LO MUESTRA EN EL VIEW
    public function GetProducto($id){
        $productos = $this->model->GetProducto();
        $this->view->DisplayProducto($productos);
    }
    // INSERTAR UN PRODUCTO EN LA TABLA
    public function InsertarProducto(){

        $this->model->InsertarProducto($_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$_POST['categoria']);
        header("Location: " . BASE_URL);
    }
    // BORRAR UN PRODUCTO DE LA TABLA
    public function BorrarProducto($id){
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
