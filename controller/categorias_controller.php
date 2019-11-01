<?php
require_once "./model/categorias_model.php";
require_once "./view/categorias_view.php";
//require_once "ProductsController.php";
//require_once "UserController.php";

class CategoriasController {

    private $model;
    private $view;
    //private $controller;
    //private $controlleruser;

	function __construct(){
        
        $this->model = new CategoriasModel();
        $this->view = new CategoriasView();
        //$this->controller = new ProductsController();
        //$this->controlleruser = new UserController();   
    }
    // TRAE EL ARREGLO DE categoria DEL MODEL Y LOS MUESTRA EN EL VIEW
    public function GetCategorias(){
        $categoria = $this->model->Getcategorias();
        $this->view->DisplayCategoria($categoria);
    }
    // TRAE UN PRODUCTO DEL MODEL Y LO MUESTRA EN EL VIEW
    public function GetCategoria($id){
        $categoria = $this->model->GetCategoria($id);
        $this->view->DisplayCategoria($categoria);
    }
    // TRAE EL ARREGLO DE categoria DEL MODEL Y LOS MUESTRA EN EL VIEW
    public function GetCategoriasAdm(){
        $categoria = $this->model->Getcategorias();
        $this->view->DisplayCategoriaAdm($categoria);
    }
    // INSERTAR UN PRODUCTO EN LA TABLA
    public function InsertarCategoria(){

        $this->model->InsertarProducto($_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$_POST['categoria']);
        header("Location: " . BASE_URL);
    }
    // BORRAR UN PRODUCTO DE LA TABLA
    public function BorrarCategoria($id){
        $this->model->BorrarCategoria($id);
        header("Location: " . BASE_URL);
    }
}
?>