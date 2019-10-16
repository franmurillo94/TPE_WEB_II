<?php

require_once('libs/Smarty.class.php');

// dar nombre al view
class view {

    function __construct(){

    }
    // dar nombre a los metodos y variables
    public function DisplayTareas($tareas){

        $smarty = new Smarty();
        $smarty->assign('titulo',"Mostrar Tareas");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('lista_tareas',$tareas);
        $smarty->display('templates/ver_tareas.tpl');
    }
}
