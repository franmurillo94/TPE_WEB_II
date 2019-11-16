<?php
class LoginView{
  private $smarty;
  function __construct(){
    $this->smarty = new Smarty();
  }
  
  public function DisplayLogin( $estado = ""){
    $this->smarty->assign('titulo',"Login");
    $this->smarty->assign('estado',$estado);
    $this->smarty->display('templates/login.tpl');
  }
  public function DisplayCambioClave( $estado = ""){
    $this->smarty->assign('titulo',"CambioClave");
    $this->smarty->assign('estado',$estado);
    $this->smarty->display('templates/cambio_clave.tpl');
  }
}

 ?>