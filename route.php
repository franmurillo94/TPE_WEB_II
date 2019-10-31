<?php

require_once "controller/productos_controller.php";

$action = $_GET["action"];
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

$productos_controller = new ProductosController();
//$categorias_controller = new CategoriasController();

if($action == ''){
    $productos_controller->GetProductos();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);

        if($partesURL[0] == "productos"){
            $productos_controller->GetProductos();
        }elseif($partesURL[0] == "insertar") {
            $productos_controller->InsertarProducto();
        }elseif($partesURL[0] == "borrar") {
            $productos_controller->BorrarProducto($partesURL[1]);
        }
        /*elseif($partesURL[0] == "editar") {
            $productos_controller->EditarProducto($partesURL[1]);
        }*/
    }
}

?>