<?php
class LoginView
{
  private $Smarty;

  function __construct()
  {
    $this->Smarty = new Smarty();
  }

  public function DisplayLogin(){
    $smarty->assign('titulo',"Login");
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->display('templates/login.tpl');
}
}

 ?>