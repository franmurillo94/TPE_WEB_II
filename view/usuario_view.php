<?php
require_once('libs/Smarty.class.php');
class UsuarioView{

        function __construct(){
        }

        function DisplayRegistro(){
            $smarty = new Smarty();
            $smarty->assign('titulo',"Mostrar Producto");
            $smarty->assign('BASE_URL',BASE_URL);                    
            $smarty->display('templates/registro.tpl');  
        }
}
