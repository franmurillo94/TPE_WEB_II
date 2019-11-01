<?php

require_once "./view/usuario_view.php";
require_once "./model/usuario_model.php";

class UsuarioController{
  private $view;
  private $model;

  function __construct(){
    $this->view = new UsuarioView();
    $this->model = new UsuarioModel();
  }
  
                                                    // FUNCIONES DE REGISTRO
  
  // MUESTRA EL REGISTRO
  function DisplayRegistro(){
    $this->view->DisplayRegistro();
  }
  // REGISTRARSE 
  public function Registro(){
    $nombre= $_POST['nombre'];
    $clave= $_POST['clave'];
    $hash = password_hash($calve, PASSWORD_DEFAULT);
    $this->model->InsertarUsuario($nomnbre,$hash);
    $this->view->DisplayLogin();
  }

                                                    // FUNCIONES DE LOGIN

  
  // MUESTRA EL LOGIN
  public function DisplayLogin(){
    $this->view->DisplayLogin();
  }
  // INSERTA UN NUEVO USUARIO EN LA BD
  function InsertarUsuario(){
    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];
    $hash = password_hash($clave, PASSWORD_DEFAULT);
    $this->model->InsertarUsuario($nombre, $hash);
    $this->view->DisplayLogin();
  }
  // INICIA SESION
  public function Login(){
    $clave = $_POST['clave'];
    $usuario = $this->model->GetUsuario($_POST['usuario']);
    if (isset($usuario) && password_verify($clave, $usuario->clave)){
      var_dump(password_verify($clave, $usuario->clave));
        session_start();
        $_SESSION['usuario'] = $usuario->nombre;
        $_SESSION['id_usuario'] = $usuario->id_usuario;
        header("Location: " . PRODUCTOS_ADM);
      }else{
        header("Location: " . BASE_URL);
      }
  }
  // LOGOUT
  public function Logout(){
    session_start();
    session_destroy();
    header("Location: " . LOGIN);
  }
}
