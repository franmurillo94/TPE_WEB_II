<?php
require_once "Api.php";
class ComentariosApiController extends Api
{
   private $model;
    function __construct()
    {
        parent::__construct();
        $this->model = new TareasModel();
    }
    function GetComentarios(){
        $data = $this->model->GetComentarios();
        //completar
    }







}







?>