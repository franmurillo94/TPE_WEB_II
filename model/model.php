<?php
// dar nombre al modelo
class model {

    private $db;
// linkear nuestra base de datos
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tareas;charset=utf8', 'root', '');
    }

    
