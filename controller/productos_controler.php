<?php
//actualizar los nombres cuando esten
require_once "./models/productos_model.php";
require_once "./views/productos_view.php";
// dar nombre al controler
class ProductosController {

    private $model;
    private $view;

	function __construct(){
        // actualizar los nombres cuando esten
        $this->model = new ProductosModel();
        $this->view = new ProductosView();
    }

    public function GetProductos(){
        $productos = $this->model->GetProductos();
        $this->view->DisplayProducto($productos);
    }

    public function InsertarProducto(){
        $finalizada = 0;
        if($_POST['finalizada'] == 'on'){
            $finalizada = 1;
        }
        $this->model->InsertarProducto($_POST['titulo'],$_POST['descripcion'],$_POST['prioridad'],$finalziada );
        header("Location: " . BASE_URL);
    }

    public function BorrarProducto($id){
        $this->model->BorrarProducto($id);
        header("Location: " . BASE_URL);
    }
}


?>
