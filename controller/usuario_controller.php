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
  
  // MUESTRA LA PAGINA DE REGISTRO
  function DisplayRegistro(){
    $this->view->DisplayRegistro();
  }

  // INSERTA UN NUEVO USUARIO EN LA BD
  function InsertarUsuario(){
    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];
    $hash = password_hash($clave, PASSWORD_DEFAULT);
    $this->model->InsertarUsuario($nombre, $hash);
    $this->view->DisplayMensaje();
  }

}
