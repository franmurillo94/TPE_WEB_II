<?php
class LoginView{
  private $smarty;
  function __construct(){
    $this->smarty = new Smarty();
  }
  
  public function DisplayLogin(){
    $this->smarty->assign('titulo',"Login");
    $this->smarty->assign('BASE_URL', BASE_URL);
    $this->smarty->display('templates/login.tpl');
}
}

 ?>