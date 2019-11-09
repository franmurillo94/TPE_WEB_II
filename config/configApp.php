<?php

/* 
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]));
define("REGISTRO", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/registro');
define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("PRODUCTOS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/productos');
define("PRODUCTOS_ADM", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/productosAdm');
define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');
define("CATEGORIAS_ADM", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/categoriaAdm');
 */
class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      //productos
      ''=> 'ProductosController#GetProductos',
      'productos' =>  'ProductosController#GetProductos',
      'insertar'=>'ProductosController#InsertarProducto',
      'detalle'=>'ProductosController#Detalle',
      'borrar'=>'ProductosController#BorrarProducto',
      'productosAdm'=>'ProductosController#GetProductosAdm',
      'editar'=>'ProductosController#EditarProducto',
      //categorias
      'borrarCategoria'=>'CategoriasController#BorrarCategoria',
      'categorias'=>'CategoriasController#GetCategorias',
      'categoriaAdm'=>'CategoriasController#GetCategoriasAdm',
      'insertarCategoria'=>'CategoriasController#InsertarCategoria',
      'registro'=>'UsuarioController#DisplayRegistro',
      'MostrarEditar'=>'ProductosController#DisplayEditar',
      //login
      'login'=>'LoginController#DisplayLogin',
      'iniciarSesion'=>'LoginController#Login',
      'logOut'=>'LoginController#Logout',
      //usuario
      'registro'=>'UsuarioController#DisplayRegistro',
      'insertarUsuario'=>'UsuarioController#InsertarUsuario',

     
      


       


    ];

}

 ?>
