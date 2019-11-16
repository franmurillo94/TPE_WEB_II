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
        $img = $this->ImgModel->GetImagenes();
        if (isset($_SESSION['admin']) && $_SESSION['admin'] == 0) {
            session_abort();
            $categorias = $this->categorias_model->GetCategorias();
            $productos = $this->model->GetProductos();
            $this->view->DisplayProductoAdm($productos,$categorias);
        }else{
            $productos = $this->model->GetProductos();
            $this->view->DisplayProducto($productos);
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
            if (($_POST['nombre'] != '') && ($_POST['descripcion']!= '') && ($_POST['precio']!= '') && ($_POST['categoria']!= '')){
                $this->model->InsertarProducto($_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$_POST['categoria']);
                if ($_FILES['imagenes']['name'] != ''){
                    $origen = $_FILES['imagenes']['tmp_name'];
                    $nProd = $this->model->lastInsertId();
                    $destino = $this->DestinoImagen($_FILES['imagenes']['name']);
                    copy($origen, $destino);
                    $this->ImgModel->AgregarImagen($destino, $nProd->id_producto);
                }
            }
            header(PRODUCTOS);
        }
        
    }
    function DestinoImagen($imagen){
        $destino_final = 'images/' . uniqid() . '.jpg';
        move_uploaded_file($imagen, $destino_final);
        return $destino_final;
    }
    // BORRAR UN PRODUCTO DE LA TABLA
    public function BorrarProducto($id){
        session_start();
        if ($_SESSION['admin'] == 0) {
            session_abort();
            $this->model->BorrarProducto($id[0]);
            $id_imagen = $this->ImgModel-> GetImagenProducto($id[0]);
            $this->ImgModel->BorrarImagen($id_imagen->id_img);
            header(PRODUCTOS);
        }
    }
    // EDITAR UN PRODUCTO DE LA TABLA
    public function EditarProducto($id){
        session_start();
        if ($_SESSION['admin'] == 0) {
            session_abort();
        $this->model->EditarProducto($_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$_POST['categoria'],$id[0]);
        header(PRODUCTOS);
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

?>
