<?php

require_once('libs/Smarty.class.php');

// CLASE PARA LA VIEW DE LA TABLA PRODUCTOS
class ProductosView {
    
    function __construct(){

    }
    // FUNCION QUE MUESTRA LOS PRODUCTOS
    public function DisplayProducto($producto){ 
        $smarty = new Smarty();
        $smarty->assign('titulo',"Mostrar Producto");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('lista_productos',$producto);
        $smarty->display('templates/tabla_simple.tpl');
        
    }
    
}

?>
