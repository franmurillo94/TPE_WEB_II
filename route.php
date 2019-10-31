<?php

require_once "controller/productos_controller.php";
require_once "controller/usuario_controller.php";

$action = $_GET["action"];
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

<<<<<<< HEAD
$controller;

if($action == ''){
    $controller = new ProductosController();
    $controller->GetProductos();
=======
$productos_controller = new ProductosController();
//$categorias_controller = new CategoriasController();

if($action == ''){
    $productos_controller->GetProductos();
>>>>>>> 18554b84ceeb984c8c6c0b897cac1722c589546d
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);
        if($partesURL[0] == "productos"){
<<<<<<< HEAD
            
            $controller = new ProductosController();
            $controller->GetProductos();
=======
            $productos_controller->GetProductos();
>>>>>>> 18554b84ceeb984c8c6c0b897cac1722c589546d
        }elseif($partesURL[0] == "insertar") {
            $productos_controller->InsertarProducto();
        }elseif($partesURL[0] == "borrar") {
<<<<<<< HEAD
            $controller->BorrarProducto($partesURL[1]);
        }elseif($partesURL[0] == "editar") {
            $controller->EditarProducto($partesURL[1]);
        }elseif($partesURL[0] == "editar") {
            $controller->EditarProducto($partesURL[1]);
        }elseif($partesURL[0] == "registrarse") {
            $controller = new UsuarioController();
            $controller->registro();
        }elseif($partesURL[0] == "InsertUsuario") {
            $controller = new UsuarioController();
            $controller->InsertUsuario();
=======
            $productos_controller->BorrarProducto($partesURL[1]);
>>>>>>> 18554b84ceeb984c8c6c0b897cac1722c589546d
        }
        /*elseif($partesURL[0] == "editar") {
            $productos_controller->EditarProducto($partesURL[1]);
        }*/
    }
}

?>