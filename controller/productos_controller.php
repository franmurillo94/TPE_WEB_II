<?php

// LINKEAMOS MODEL Y VIEW
require_once "./model/productos_model.php";
require_once "./view/productos_view.php";
require_once "./model/categorias_model.php";
require_once "./model/img_model.php";
require_once "Seguridad.php";

class ProductosController extends Seguridad {

    private $model;
    private $view;

	function __construct(){
        $this->model = new ProductosModel();
        $this->view = new ProductosView();
        $this->categorias_model = new CategoriasModel();
        $this->ImgModel = new ImgModel();
    }

  

    // TRAE EL ARREGLO DE PRODUCTOS DEL MODEL Y LOS MUESTRA EN EL VIEW
    public function GetProductos(){
        session_start();
        if (isset($_SESSION['admin']) && $_SESSION['admin'] == 0) {
            session_abort();
            $this->GetProductosAdm();
        }else{
            $productos = $this->model->GetProductos();
            $this->view->DisplayProducto($productos);
        }
    }

    // TRAE EL ARREGLO DE PRODUCTOS DEL MODEL Y LOS MUESTRA EN EL VIEW
    public function GetProductosAdm(){
        session_start();
        if (isset($_SESSION['admin']) && $_SESSION['admin'] == 0) {
            session_abort();
            $categorias = $this->categorias_model->GetCategorias();
            $productos = $this->model->GetProductos();
            $this->view->DisplayProductoAdm($productos,$categorias);
        }else{
            header(LOGIN);
        }
    }

    // TRAE UN PRODUCTO DEL MODEL Y LO MUESTRA EN EL VIEW
    public function Detalle($id){
        $productos = $this->model->GetProducto($id);
        $this->view->DisplayDetalle($productos);
    }
    // INSERTAR UN PRODUCTO EN LA TABLA
    public function InsertarProducto(){
        session_start();
        if ($_SESSION['admin'] == 0) {
            session_abort();
            $this->model->InsertarProducto($_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$_POST['categoria']);
            header(PRODUCTOS_ADM);
        }
        $arrayImagenes = array();
        if (isset($_FILES['imagenes'])){
          $cantidad= count($_FILES["imagenes"]["tmp_name"]);
          for ($i=0; $i<$cantidad; $i++){
             //Comprobamos si el fichero es una imagen
            if ($_FILES['imagenes']['type'][$i]=='image/png' || $_FILES['imagenes']['type'][$i]=='image/jpeg'){
              array_push($arrayImagenes, $this->ImagenModel->subirImagen($_FILES["imagenes"]["tmp_name"][$i]));
             }
          }
          $numeroCerveza = $this->model->lastInsertId();
          $cantidad = count($arrayImagenes);
          for ($i=0; $i < $cantidad ; $i++) {
            $this->ImgModel->AgregarImagen($arrayImagenes[$i], $numeroCerveza['id_cerveza']);
          }
        }else{
            echo "la put";
        }
    
    }
    // BORRAR UN PRODUCTO DE LA TABLA
    public function BorrarProducto($id){
        session_start();
        if ($_SESSION['admin'] == 0) {
            session_abort();
            $this->model->BorrarProducto($id[0]);
            header(PRODUCTOS_ADM);
        }
    }
    // EDITAR UN PRODUCTO DE LA TABLA
    public function EditarProducto($id){
        session_start();
        if ($_SESSION['admin'] == 0) {
            session_abort();
        $this->model->EditarProducto($_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$_POST['categoria'],$id[0]);
        header(PRODUCTOS_ADM);
        }
    }
    // MUESTRA EL FORM PARA EDITAR EL PRODUCTO
    public function DisplayEditar($id){
        session_start();                    
        if ($_SESSION['admin'] == 0) {
            session_abort();
        $categorias = $this->categorias_model->GetCategorias();
        $producto = $this->model->GetProducto($id[0]);
        $this->view->DisplayEditar($producto,$categorias);
        }
    }
}

// PARA DEBUGEAR
// print_r($id);                      imprime la variable
//die;                                corta
?>
