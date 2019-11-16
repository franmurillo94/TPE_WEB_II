<?php

require_once('libs/Smarty.class.php');

// CLASE PARA LA VIEW DE LA TABLA PRODUCTOS
class ProductosView {
    private $smarty;
    function __construct(){
        $this->smarty = new Smarty();
    }
    // FUNCION QUE MUESTRA LOS PRODUCTOS
    public function DisplayProducto($producto, $img = []){ 
        $this->smarty->assign('titulo',"Mostrar Producto");
        $this->smarty->assign('lista_productos',$producto);
        $this->smarty->assign('img',$img);
        $this->smarty->display('templates/producto/producto_simple.tpl');
    }
    
    
    // FUNCION QUE MUESTRA LOS PRODUCTOS PARA USUARIOS
    public function DisplayProductoAdm($producto,$categoria, $img= []){
        $this->smarty->assign('titulo',"Mostrar Producto");
        $this->smarty->assign('lista_productos',$producto);
        $this->smarty->assign('lista_categorias',$categoria);
        $this->smarty->assign('lista_img',$img);
        $this->smarty->display('templates/producto/producto_adm.tpl');
        
    }
    // FUNCION QUE MUESTRA LOS PRODUCTOS
    public function DisplayDetalle($producto, $img){ 
        $this->smarty->assign('titulo',"Mostrar Producto");
        $this->smarty->assign('producto',$producto);
        $this->smarty->assign('img', $img);
        $this->smarty->display('templates/producto/detalle.tpl');
        
    }
    // FUNCION QUE MUESTRA LOS PRODUCTOS
    public function DisplayEditar($producto,$categoria){ 
        $this->smarty->assign('titulo',"Mostrar Producto");
        $this->smarty->assign('producto',$producto);
        $this->smarty->assign('lista_categorias',$categoria);
        $this->smarty->display('templates/producto/editar.tpl');
        
    }

    
}

?>
