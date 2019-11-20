<?php
require_once("./Models/comentariosModel.php");
require_once("./api/JSONView.php");
require_once("./controllerApi.php");
class ComentariosApiController extends ApiController {
    private $model;
    private $view;

    public function __construct() {
        parent::__construct();
        $this->model = new ComentariosModel();
        $this->view = new JSONView();
    }

    public function getComentarios($params = null) {
        $comentarios = $this->model->GetComentarios();
        $this->view->response($comentarios, 200);
    }

    /**
     * Obtiene una producto dado un ID
     * 
     * $params arreglo asociativo con los parámetros del recurso
     */
    public function getProducto($params = null) {
        // obtiene el parametro de la ruta
        $id = $params[':ID'];
        
        $producto = $this->model->GetProducto($id);
        
        if ($producto) {
            $this->view->response($producto, 200);   
        } else {
            $this->view->response("No existe la producto con el id={$id}", 404);
        }
    }
    public function addComentario($params = null){
        $rta = $this->model->AgregarComentario($params['puntaje'], $params['comentario'], $params['id_producto'], $params['id_usuario']);
        $this->view->response($rta, 200);
    }
}
