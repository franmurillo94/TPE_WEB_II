<?php

require_once "./view/usuario_view.php";
require_once "./model/usuario_model.php";
require_once "./view/login_view.php";

class UsuarioController{
  private $view;
  private $model;
  private $login;

  function __construct(){
    $this->view = new UsuarioView();
    $this->model = new UsuarioModel();
    $this->login = new LoginView();
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
    $this->login->DisplayLogin();
  }

                                                    // FUNCIONES DE LOGIN

  // INSERTA UN NUEVO USUARIO EN LA BD
  function InsertarUsuario(){
    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];
    $hash = password_hash($clave, PASSWORD_DEFAULT);
    $this->model->InsertarUsuario($nombre, $hash);
    $this->login->DisplayLogin();
  }

}
