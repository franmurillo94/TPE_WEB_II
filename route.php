<?php

require_once "config/ConfigApp.php";
require_once "controller/productos_controller.php";
require_once "controller/usuario_controller.php";
require_once "controller/login_controller.php";
require_once "controller/categorias_controller.php";

$action = $_GET["action"];
/* 


$productos_controller = new ProductosController();
$usuario_controller = new UsuarioController();
$login_controller = new LoginController();
$categorias_controller = new CategoriasController();

if($action == ''){
    $productos_controller->GetProductos();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);

        if($partesURL[0] == "productos"){
            $productos_controller->GetProductos();
        }elseif($partesURL[0] == "insertar") {
            $productos_controller->InsertarProducto();
        }elseif($partesURL[0] == "detalle") {
            $productos_controller->Detalle($partesURL[1]);
        }elseif($partesURL[0] == "borrar") {
            $productos_controller->BorrarProducto($partesURL[1]);
        }elseif($partesURL[0] == "borrarCategoria") {
            $categorias_controller->BorrarCategoria($partesURL[1]);
        }elseif($partesURL[0] == "registro") {
            $usuario_controller->DisplayRegistro();
        }elseif($partesURL[0] == "login") {
            $login_controller->DisplayLogin();
        }elseif($partesURL[0] == "insertarUsuario") {
            $usuario_controller->InsertarUsuario();
        }elseif($partesURL[0] == "iniciarSesion") {
            $login_controller->Login();
        }elseif($partesURL[0] == "categorias") {
            $categorias_controller->GetCategorias();
        }
        elseif($partesURL[0] == "categoriaAdm") {
            $categorias_controller->GetCategoriasAdm();
        }
        elseif($partesURL[0] == "productosAdm") {
            $productos_controller->GetProductosAdm();
        }
        elseif($partesURL[0] == "logOut") {
            $login_controller->Logout();
        }
        elseif($partesURL[0] == "insertarCategoria") {
           $categorias_controller->InsertarCategoria();
        }
        
        elseif($partesURL[0] == "editar") {
            $productos_controller->EditarProducto($partesURL[1]);
        }
        elseif($partesURL[0] == "MostrarEditar") {
            $productos_controller->DisplayEditar($partesURL[1]);
        }
        
    }
} */

define('ACTION', 0);
define('PARAMS', 1);
function parseURL($url)
{
  $urlExploded = explode('/', $url);
  $arrayReturn[ConfigApp::$ACTION] = $urlExploded[0];
  $arrayReturn[ConfigApp::$PARAMS] = isset($urlExploded[1]) ? array_slice($urlExploded,1) : null;
  //retortna un arreglo de 2 posiciones [accion][parametros]
  return $arrayReturn;  
}

if(isset($_GET['action'])){
    //parseurl analiza la url seteada
     $urlData = parseURL($_GET['action']);
     $action = $urlData[ConfigApp::$ACTION]; //home
     if(array_key_exists($action,ConfigApp::$ACTIONS)){
         $params = $urlData[ConfigApp::$PARAMS];
         $action = explode('#',ConfigApp::$ACTIONS[$action]); 
         $controller = new $action[0]();
         $metodo = $action[1];
         if(isset($params) &&  $params != null){
             echo $controller->$metodo($params);
         }
         else{
             echo $controller->$metodo();
         }
     }else{
         echo "error 404 pagina no encontrada";
     }
 }

?>