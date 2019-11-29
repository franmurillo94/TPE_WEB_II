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
        $comentarios = $this->model->GetComentarioProducto($params[':ID']);
        $this->view->response($comentarios, 200);
    }

    public function AgregarComentario($params = []){
        $comentarios = $this->getData();
        $this->model->AgregarComentario($comentarios->puntaje, $comentarios->comentario, $comentarios->idProducto, $comentarios->idUsr);
    }


    public function BorrarComentario($params = []){
        $id_comentario = $params[':ID'];
        $comentario = $this->model->getComentario($id_comentario);
        if ($comentario) {
                $this->model->BorrarComentario($id_comentario);
                $this->view->response("Comentario eliminado", 200);
            }
        
        else 
            $this->view->response("Comentario not found", 404);
    }

   
}
