<?php
require_once('libs/Smarty.class.php');
class UsuarioView{

        function __construct(){
        }

        public function DisplayLogin(){

            $smarty = new Smarty();
            $smarty->assign('titulo',"Login");
            $smarty->assign('BASE_URL',BASE_URL);
            $smarty->display('templates/login.tpl');
        }
        function DisplayRegistro(){
            $smarty = new Smarty();
            $smarty->assign('titulo',"Mostrar Producto");
            $smarty->assign('BASE_URL',BASE_URL);                    
            $smarty->display('templates/registro.tpl');  
        }
}
