<?php
require_once("./Models/comentariosModel.php");
require_once("./api/JSONView.php");

class ComentariosApiController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new ComentariosModel();
        $this->view = new JSONView();
    }

    public function getComentarios($params = null) {
        $comentarios = $this->model->getComentarios();
        $this->view->response($comentarios, 200);
    }

    /**
     * Obtiene una tarea dado un ID
     * 
     * $params arreglo asociativo con los parámetros del recurso
     */
    public function getTarea($params = null) {
        // obtiene el parametro de la ruta
        $id = $params[':ID'];
        
        $tarea = $this->model->GetTarea($id);
        
        if ($tarea) {
            $this->view->response($tarea, 200);   
        } else {
            $this->view->response("No existe la tarea con el id={$id}", 404);
        }
    }
}
