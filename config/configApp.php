<?php


define("REGISTRO", 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]).'/registro');
define("LOGIN", 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]).'/login');
define("PRODUCTOS", 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]).'/productos');
define("LOGOUT", 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]).'/logout');
define("CATEGORIAS", 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]).'/categorias');
define("USUARIOS", 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]).'/usuarios');
 
class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      #productos
      ''=> 'ProductosController#GetProductos',
      'productos' =>  'ProductosController#GetProductos',
      'insertar'=>'ProductosController#InsertarProducto',
      'detalle'=>'ProductosController#Detalle',
      'borrar'=>'ProductosController#BorrarProducto',
      'MostrarEditar'=>'ProductosController#DisplayEditar',
      'editar'=>'ProductosController#EditarProducto',
      'borrarimagen'=>'ProductosController#BorrarImagen',
      #categorias
      'categorias'=>'CategoriasController#GetCategorias',
      'insertarCategoria'=>'CategoriasController#InsertarCategoria',
      'borrarCategoria'=>'CategoriasController#BorrarCategoria',
      #login
      'logOut'=>'LoginController#Logout',
      'iniciarSesion'=>'LoginController#Login',
      'cambiarcontraseña'=>'LoginController#DisplayCambioClave',
      'cambiarclave'=>'LoginController#CambiarClave',
      'login'=>'LoginController#DisplayLogin',
      #usuario
      'insertarUsuario'=>'UsuarioController#InsertarUsuario', 
      'usuarios'=>'UsuarioController#GetUsuarios', 
      'tugglepermiso'=>'UsuarioController#TogglePermiso', 
      'registro'=>'UsuarioController#DisplayRegistro',
      'borrarusuario'=>'UsuarioController#BorrarUsuario',
     
      


       


    ];

}

 ?>
