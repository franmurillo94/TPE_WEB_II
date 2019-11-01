<?php

require_once "controller/productos_controller.php";
require_once "controller/usuario_controller.php";
require_once "controller/login_controller.php";


$action = $_GET["action"];
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("REGISTRO", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/registro');
define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("PRODUCTOS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/productos');
define("PRODUCTOS_ADM", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/productosAdm');
define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');


$productos_controller = new ProductosController();
$usuario_controller = new UsuarioController();
$login_controller = new LoginController();
//$categorias_controller = new CategoriasController();

if($action == ''){
    $productos_controller->GetProductos();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);

        if($partesURL[0] == "productos"){
            $productos_controller->GetProductos();
        }elseif($partesURL[0] == "productosAdm") {
            $productos_controller->GetProductosAdm();
        }elseif($partesURL[0] == "insertar") {
            $productos_controller->InsertarProducto();
        }elseif($partesURL[0] == "borrar") {
            $productos_controller->BorrarProducto($partesURL[1]);
        }elseif($partesURL[0] == "registro") {
            $usuario_controller->DisplayRegistro();
        }elseif($partesURL[0] == "login") {
            $login_controller->DisplayLogin();
        }elseif($partesURL[0] == "insertarUsuario") {
            $usuario_controller->InsertarUsuario();
        }elseif($partesURL[0] == "iniciarSesion") {
            $login_controller->Login();
        }elseif($partesURL[0] == "logout") {
            echo "jajaj";
        }
        /*elseif($partesURL[0] == "editar") {
            $productos_controller->EditarProducto($partesURL[1]);
        }*/
    }
}

?>