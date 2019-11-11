<?php
require_once "./model/categorias_model.php";
require_once "./view/categorias_view.php";
//require_once "ProductsController.php";
//require_once "UserController.php";

class CategoriasController  extends Seguridad  {

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
    public function checkLogIn(){
        session_start();
        
        if(!isset($_SESSION['userId'])){
            header(LOGIN);
            die();
        }

        if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) { 
            header(LOGOUT);
            die(); // destruye la sesión, y vuelve al login
        } 
        $_SESSION['LAST_ACTIVITY'] = time();
    }
    // TRAE EL ARREGLO DE categoria DEL MODEL Y LOS MUESTRA EN EL VIEW
    public function GetCategorias(){
        $categoria = $this->model->Getcategorias();
        $this->view->DisplayCategoria($categoria);
    }
    // TRAE UN PRODUCTO DEL MODEL Y LO MUESTRA EN EL VIEW
    public function GetCategoria($params){
        $categoria = $this->model->GetCategoria($params);
        $this->view->DisplayCategoria($categoria);
    }
    // TRAE EL ARREGLO DE categoria DEL MODEL Y LOS MUESTRA EN EL VIEW
    public function GetCategoriasAdm(){
       // $this->checkLogIn();
        $categoria = $this->model->GetCategorias();
        $this->view->DisplayCategoriaAdm($categoria);
    }
    // INSERTAR UN PRODUCTO EN LA TABLA
    public function InsertarCategoria(){
       // $this->checkLogIn();
        $this->model->InsertarCategoria($_POST['nombre'],$_POST['descripcion']);
        header(CATEGORIAS_ADM);
    }
    // BORRAR UN PRODUCTO DE LA TABLA
    public function BorrarCategoria($params){
       // $this->checkLogIn();
        $this->model->BorrarCategoria($params[0]);
        header(CATEGORIAS_ADM);
    }
}
?>