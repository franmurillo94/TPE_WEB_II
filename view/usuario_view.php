<?php
require_once('libs/Smarty.class.php');
class UsuarioView{
    private $smarty;
        function __construct(){
            $this->smarty = new Smarty();
        }

        function DisplayRegistro(){
            $this->smarty->assign('titulo',"Mostrar Producto");           
            $this->smarty->assign('mensaje', '');
            $this->smarty->display('templates/registro.tpl');  
        }
        function DisplayMensaje(){
            $this->smarty->assign('titulo',"Mostrar Producto"); 
            $this->smarty->assign('mensaje', 'usuario registrado');     
            $this->smarty->display('templates/registro.tpl');  
        }
}
