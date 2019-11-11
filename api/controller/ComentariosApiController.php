<?php
require_once "Api.php";
require_once "./../../model/ComentariosModel.php";
class ComentariosApiController extends Api
{
   private $model;
    function __construct()
    {
        parent::__construct();
        $this->model = new ComentariosModel();
    }

    function GetComentarios($param = null){

        if(isset($param)){
            $id_comentario = $param[0];
            $data = $this->model->GetComentarios($id_comentario);
        }else{
            $data = $this->model->GetComentarios();
        }
        if (isset($data)){
            $this->json_response($data, 200);
        }else{
            $this->json_response(null, 404);
        }

        //completar
    }







}







?>