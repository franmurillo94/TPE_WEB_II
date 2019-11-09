<?php

require_once('libs/Smarty.class.php');

// CLASE PARA LA VIEW DE LA TABLA PRODUCTOS
class CategoriasView {
    private $smarty;
    function __construct(){
        $this->smarty = new Smarty();
    }
    // FUNCION QUE MUESTRA LAS CATEGORIAS 
    public function DisplayCategoria($categoria){ 
        $this->smarty->assign('titulo',"Mostrar Categoria");
        $this->smarty->assign('lista_categoria',$categoria);
        $this->smarty->display('templates/categoria_simple.tpl');
    }

    // FUNCIOIN QUE MUESTRA LAS CATEGORIAS PARA USUARIOS
    public function DisplayCategoriaAdm($categoria){ 
        $this->smarty->assign('titulo',"Mostrar Categoria");
        $this->smarty->assign('lista_categoria',$categoria);
        $this->smarty->display('templates/categoria_adm.tpl');
    }
}