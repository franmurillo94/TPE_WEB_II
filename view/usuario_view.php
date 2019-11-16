<?php
require_once('libs/Smarty.class.php');
class UsuarioView{
    private $smarty;
        public function __construct(){
            $this->smarty = new Smarty();
        }

        public function DisplayRegistro(){
            $this->smarty->assign('titulo',"Registrarse");           
            $this->smarty->assign('mensaje', '');
            $this->smarty->display('templates/registro.tpl');  
        }
        public function DisplayMensaje(){
            $this->smarty->assign('titulo',"Mostrar Producto"); 
            $this->smarty->assign('mensaje', 'usuario registrado');     
            $this->smarty->display('templates/registro.tpl');  
        }
        public function DisplayUsuarios($usuario, $error = ''){
            $this->smarty->assign('titulo',"Mostrar Usuarios");
            $this->smarty->assign('lista_usuario',$usuario);
            $this->smarty->assign('error',$error);
            $this->smarty->display('templates/lista_usuarios.tpl');
            
        }
}
