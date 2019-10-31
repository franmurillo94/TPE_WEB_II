<?php

require_once "controller/productos_controller.php";
require_once "controller/usuario_controller.php";

$action = $_GET["action"];
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

$controller;

if($action == ''){
    $controller = new ProductosController();
    $controller->GetProductos();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);
        if($partesURL[0] == "productos"){
            
            $controller = new ProductosController();
            $controller->GetProductos();
        }elseif($partesURL[0] == "insertar") {
            $controller->InsertarProducto();
        }elseif($partesURL[0] == "borrar") {
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
        }
    }
}

?>