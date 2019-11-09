<?php

require_once "./view/login_view.php";
require_once "./model/usuario_model.php";

class LoginController{
  private $view;
  private $model;

  function __construct(){
    $this->view = new LoginView();
    $this->model = new UsuarioModel();
  }
                                                // FUNCIONES DE LOGIN

  
  // MUESTRA EL LOGIN
  public function DisplayLogin(){
    $this->view->DisplayLogin();
  }

  // LOGIN 
  public function Login(){
    $clave = $_POST['clave'];
    $usuario = $this->model->GetUsuario($_POST['nombre']);
    if (password_verify($clave, $usuario->clave)){
        session_start();
        $_SESSION['user'] = $usuario->nombre;
        $_SESSION['userId'] = $usuario->id_usuario;
        header(PRODUCTOS_ADM);
      }else{
        header(PRODUCTOS_ADM);
      }
  }
  
  // LOGOUT
  public function Logout(){
    session_start();
    session_destroy();
    header(PRODUCTOS_ADM);
  }
}
