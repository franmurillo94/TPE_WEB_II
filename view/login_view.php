<?php
class LoginView{

  function __construct(){
  }
  
  public function DisplayLogin(){
    
    $smarty = new Smarty();
    $smarty->assign('titulo',"Login");
    $smarty->assign('BASE_URL', BASE_URL);
    $smarty->display('templates/login.tpl');
}
}

 ?>