<?php
require_once("controllerApi.php");
require_once("./model/comentarios_model.php");
class ComentariosApiController extends ApiController {
    private $model;

    public function __construct() {
        parent::__construct();
        $this->model = new ComentariosModel();
    }

    public function getComentarios($params = []) {
        $comentarios = $this->model->GetComentarios();
        $this->view->response($comentarios, 200);
    }
    public function AgregarComentario($params = []){
        $comentarios = $this->getData();
        $rta = $this->model->AgregarComentario($comentarios->puntaje, $comentarios->comentario, $comentarios->id_producto, $comentarios->id_usuario);
        
        if ($rta){
            $this->view->response($rta, 200);
        }        
        else{
            $this->view->response("Error al insertar", 500);
        }
    }

    /**
     * Obtiene una producto dado un ID
     * 
     * $params arreglo asociativo con los parámetros del recurso
     */
    public function getProducto($params = []) {
        // obtiene el parametro de la ruta
        $id = $params[':ID'];
        
        $producto = $this->model->GetProducto($id);
        
        if ($producto) {
            $this->view->response($producto, 200);   
        } else {
            $this->view->response("No existe la producto con el id={$id}", 404);
        }
    }
   
}
