<?php

require_once "./view/usuario_view.php";
require_once "./model/usuario_model.php";

class UsuarioController extends Seguridad{
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
    $this->model->InsertarUsuario($nombre, $hash, 1);
    $this->view->DisplayMensaje();
  }
  public function GetUsuarios(){
    session_start();
    if (isset($_SESSION['id_usuario'])){
      session_abort();
      $usuario = $this->model->GetUsuarioID($_SESSION['id_usuario']);
    }else{
        $usuario = null;
    }
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 0) {
      session_abort();
        $usuarios = $this->model->GetUsuarios();
        $this->view->DisplayUsuarios($usuarios, '', $usuario);
    }else{
        header(LOGIN);
        
    }
   
  }
  public function TogglePermiso($id){
    session_start();
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 0) {
      session_abort();
      if ($id[1] == 0){
        $this->model->TogglePermiso(1,$id[0]);
      }
      else{
        $this->model->TogglePermiso(0,$id[0]);
      }
      header(USUARIOS);
    }else{
      header(PRODUCTOS);
    }
  }
  public function BorrarUsuario($id){
    session_start();
    if ($_SESSION['admin'] == 0) {
        session_abort();
        $this->model->BorrarUsuario($id[0]);
        header(USUARIOS);
    }
}


}
