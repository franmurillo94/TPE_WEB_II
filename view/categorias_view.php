<?php

require_once('libs/Smarty.class.php');

// CLASE PARA LA VIEW DE LA TABLA PRODUCTOS
class CategoriasView {
    
    function __construct(){

    }
    // FUNCION QUE MUESTRA LAS CATEGORIAS 
    public function DisplayCategoria($categoria){ 
        $smarty = new Smarty();
        $smarty->assign('titulo',"Mostrar Categoria");
        $smarty->assign('BASE_URL',BASE_URL);
<<<<<<< HEAD
        $smarty->assign('lista_productos',$categoria);
        $smarty->display('templates/categoria_simple.tpl');
        
=======
        $smarty->assign('lista_productos',$producto);
        $smarty->display('templates/categoria_admin.tpl');
>>>>>>> f448890482007915b9ac2f9b38d056c8191259da
    }
    // FUNCIOIN QUE MUESTRA LAS CATEGORIAS PARA USUARIOS
    public function DisplayCategoriaAdm($categoria){ 
        $smarty = new Smarty();
        $smarty->assign('titulo',"Mostrar Categoria");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('lista_productos',$categoria);
        $smarty->display('templates/categoria_adm.tpl');
        
    
}

?>
