<?php

// LINKEAMOS MODEL Y VIEW
require_once "./model/productos_model.php";
require_once "./view/productos_view.php";
require_once "./model/categorias_model.php";
require_once "./model/img_model.php";
require_once "./model/usuario_model.php";
require_once "Seguridad.php";

class ProductosController extends Seguridad {

    private $model;
    private $view;
    private $ImgModel;
    private $usrModel;
	function __construct(){
        $this->model = new ProductosModel();
        $this->view = new ProductosView();
        $this->categorias_model = new CategoriasModel();
        $this->ImgModel = new ImgModel();
        $this->usrModel = new UsuarioModel();
    }

  

    // TRAE EL ARREGLO DE PRODUCTOS DEL MODEL Y LOS MUESTRA EN EL VIEW
    public function GetProductos(){
        session_start();
        $img = $this->ImgModel->GetImagenes();
        $productos = $this->model->GetProductos();
        if (isset($_SESSION['admin']) && $_SESSION['admin'] == 0) {
            session_abort();
            $categorias = $this->categorias_model->GetCategorias();
            $this->view->DisplayProductoAdm($productos,$categorias, $img);
        }else{
            $this->view->DisplayProducto($productos, $img);
            
        }
    }

   

    // TRAE UN PRODUCTO DEL MODEL Y LO MUESTRA EN EL VIEW
    public function Detalle($id){
        session_start();
        $img = $this->ImgModel->GetImagenProducto($id[0]);
        $productos = $this->model->GetProducto($id[0]);
        if ($_SESSION['admin'] == 1){
            $usr = $this->usrModel->GetUsuarioID($_SESSION['id_usuario']);
            $this->view->DisplayDetalle($productos, $img, $usr);
        }else{
            $this->view->DisplayDetalle($productos, $img);
        }
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
     // BORRAR UN PRODUCTO DE LA TABLA
     public function BorrarImagen($id){
        session_start();
        if ($_SESSION['admin'] == 0) {
            session_abort();
            $this->ImgModel->BorrarImagen($id[0]);
            header(PRODUCTOS);
        }
    }
    // EDITAR UN PRODUCTO DE LA TABLA
    public function EditarProducto($id){
        session_start();
        if ($_SESSION['admin'] == 0) {
            session_abort();
            if (($_POST['nombre'] != '') && ($_POST['descripcion']!= '') && ($_POST['precio']!= '') && ($_POST['categoria']!= '')) {
                $this->model->EditarProducto($_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$_POST['categoria'],$id[0]);
            }
            if ($_FILES['imagenes']['name'] != ''){
                $origen = $_FILES['imagenes']['tmp_name'];
                $destino = $this->DestinoImagen($_FILES['imagenes']['name']);
                copy($origen, $destino);
                $this->ImgModel->AgregarImagen($destino, $id[0]);
            }
        }
        header(PRODUCTOS);
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
