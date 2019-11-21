<?php
require_once("controllerApi.php");
require_once("./model/comentarios_model.php");
require_once("JSONView.php");
class ComentariosApiController extends ApiController {
    private $model;
    private $view;

    public function __construct() {
        parent::__construct();
        $this->model = new ComentariosModel();
        $this->view = new JSONView();
    }

    public function getComentarios($params = []) {
        $comentarios = $this->model->GetComentarios();
        $this->view->response($comentarios, 200);
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
    public function addComentario($params = []){
        $datos = $this->getData();
        echo $datos->puntaje    ;
        $rta = $this->model->AgregarComentario($datos->puntaje, $datos->comentario, $datos->id_producto, $datos->id_usuario);
        $this->view->response($rta, 200);
        if ($rta)
            $this->view->response($rta, 200);
        else
            $this->view->response("Error al insertar", 500);

    }
}
