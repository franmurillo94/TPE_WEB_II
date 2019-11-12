<?php


define("REGISTRO", 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]).'/registro');
define("LOGIN", 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]).'/login');
define("PRODUCTOS", 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]).'/productos');
define("PRODUCTOS_ADM", 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]).'/productosAdm');
define("LOGOUT", 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]).'/logout');
define("CATEGORIAS_ADM", 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]).'/categoriaAdm');
define("CATEGORIAS", 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]).'/categorias');
 
class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      #productos
      ''=> 'ProductosController#GetProductos',
      'productos' =>  'ProductosController#GetProductos',
      'categorias'=>'CategoriasController#GetCategorias',
      'productosAdm'=>'ProductosController#GetProductosAdm',
      'insertar'=>'ProductosController#InsertarProducto',
      'detalle'=>'ProductosController#Detalle',
      'borrar'=>'ProductosController#BorrarProducto',
      'editar'=>'ProductosController#EditarProducto',
      #categorias
      'MostrarEditar'=>'ProductosController#DisplayEditar',
      #login
      'logOut'=>'LoginController#Logout',
      #usuario
      /*  
      */
      'borrarCategoria'=>'CategoriasController#BorrarCategoria',
      'insertarCategoria'=>'CategoriasController#InsertarCategoria',
      'categoriaAdm'=>'CategoriasController#GetCategoriasAdm',
      'iniciarSesion'=>'LoginController#Login',
      'insertarUsuario'=>'UsuarioController#InsertarUsuario', 
      'login'=>'LoginController#DisplayLogin',
      
      'registro'=>'UsuarioController#DisplayRegistro',
     
      


       


    ];

}

 ?>
