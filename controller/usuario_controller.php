<?php

require_once "./view/usuario_view.php";
require_once "./model/usuario_model.php";

class UsuarioController 
{
  private $view;
  private $model;

  function __construct(){
    $this->view = new UsuarioView();
    $this->model = new UsuarioModel();
  }

  function MostrarUsuario(){
    $Usuarios = $this->model->GetUsuario();
    $this->view->Mostrar($this->$Usuarios);
  }

  function InsertUsuario(){
    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];
    $hash = password_hash($clave, PASSWORD_DEFAULT);
    $this->model->InsertarUsuario($nombre, $hash);
    session_start();
    $_SESSION['nombre'] = $nombre;
    $_SESSION['admin'] = 0;
    header("registrarse");
  }
  function registro(){
    $this->view->registro();
  }

}

?>
