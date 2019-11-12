<?php
require_once "./model/categorias_model.php";
require_once "./view/categorias_view.php";
require_once "Seguridad.php";

class CategoriasController  extends Seguridad  {

    private $model;
    private $view;

	function __construct(){
        
        $this->model = new CategoriasModel();
        $this->view = new CategoriasView();  
    }
    // TRAE EL ARREGLO DE categoria DEL MODEL Y LOS MUESTRA EN EL VIEW
    public function GetCategorias(){
        session_start();
        if (isset($_SESSION['admin']) && $_SESSION['admin'] == 0) {
            session_abort();
            $this->GetCategoriasAdm();
        }else{
            $categoria = $this->model->Getcategorias();
            $this->view->DisplayCategoria($categoria);
        }

    }
    // TRAE UN PRODUCTO DEL MODEL Y LO MUESTRA EN EL VIEW
    public function GetCategoria($params){
        $categoria = $this->model->GetCategoria($params);
        $this->view->DisplayCategoria($categoria);
    }
    // TRAE EL ARREGLO DE categoria DEL MODEL Y LOS MUESTRA EN EL VIEW
    public function GetCategoriasAdm(){
        session_start();
        if ($_SESSION['admin'] == 0) {
            $categoria = $this->model->GetCategorias();
            $this->view->DisplayCategoriaAdm($categoria);
        }else{
            header(CATEGORIAS);
        }
    }
    // INSERTAR UN PRODUCTO EN LA TABLA
    public function InsertarCategoria(){
        if ($_SESSION['admin'] == 0) {
            $this->model->InsertarCategoria($_POST['nombre'],$_POST['descripcion']);
            header(CATEGORIAS_ADM);
        }else{
            $this->GetCategorias();
        }
    }
    // BORRAR UN PRODUCTO DE LA TABLA
    public function BorrarCategoria($params){
        if ($_SESSION['admin'] == 0) {
            $this->model->BorrarCategoria($params[0]);
            header(CATEGORIAS_ADM);
        }else{
            $this->GetCategorias();
        }
        
    }
}
?>