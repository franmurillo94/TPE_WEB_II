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
        
        //$this->view->DisplayProducto(); -------> PROBAMOS EL VIEW SIN TRAER INFO
    }
    
    public function InsertarProducto(){

        $this->model->InsertarProducto($_POST['nombre'],$_POST['descripcion'],$_POST['precio']);
        header("Location: " . BASE_URL);
    }
    
    public function BorrarProducto($id){
        $this->model->BorrarProducto($id);
        header("Location: " . BASE_URL);
    }
    public function EditarProducto($id){
        $this->model->EditarProducto($_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$id);
        header("Location: " . BASE_URL);
    }
}


?>
