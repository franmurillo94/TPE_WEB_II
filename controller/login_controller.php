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
    $nombre = $_POST['nombre'];
    $clave = $_POST['clave'];
    $dbUser = $this->model->GetUsuario($nombre);
    if (!empty($dbUser)){
      if (password_verify($clave, $dbUser->clave)){
          session_start();
          $_SESSION['user'] =  $dbUser->nombre;
          $_SESSION['userId'] =  $dbUser->id_usuario;
          $_SESSION['admin'] = $dbUser->admin;
          header(PRODUCTOS_ADM);
        }else{
          $this->view->DisplayLogin("Clave incorrecta");
        }
    }else{
      $this->view->DisplayLogin("No existe el usuario");
    }
  }
  
  // LOGOUT
  public function Logout(){
    session_start();
    session_destroy();
    header(LOGIN);
  }
}
