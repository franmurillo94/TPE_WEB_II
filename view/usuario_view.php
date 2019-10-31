<?php
require_once('libs/Smarty.class.php');
class UsuarioView{
    
    private $smarty;

        function __construct()
        {
             $this->smarty = new Smarty();

        }

        function Mostrar($Usuarios){
            $this->smarty->assign('Usuarios',$Usuarios);
            $this->smarty->debugging = true;
            $this->smarty->display('./templates/mostrarUsuarios.tpl');
        }
        function registro(){
            $this->smarty->assign('titulo',"Mostrar Producto");
            $this->smarty->assign('BASE_URL',BASE_URL);                    
            $this->smarty->display('templates/registro.tpl');  
        }
}
