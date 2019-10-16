<?php
//actualizar los nombres cuando esten
require_once "./models/model.php";
require_once "./views/view.php";
// dar nombre al controler
class controler {

    private $model;
    private $view;

	function __construct(){
        // actualizar los nombres cuando esten
        $this->model = new model();
        $this->view = new view();
    }
