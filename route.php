<?php


require_once "controller/productos_controler.php";

$action = $_GET["action"];
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

$controller = new ProductosController();

if($action == ''){
    $controller->GetProductos();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);

        if($partesURL[0] == "productos"){
            $controller->GetProductos();
        }elseif($partesURL[0] == "insertar") {
            $controller->InsertarProducto();
        }elseif($partesURL[0] == "borrar") {
            $controller->BorrarProducto($partesURL[1]);
        }
    }
}

?>