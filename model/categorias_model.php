<?php

class CategoriasModel {

    private $db;
// linkear nuestra base de datos
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_productos;charset=utf8', 'root', '');
    }

    public function GetCategoria($id){
        $sentencia = $this->db->prepare( "SELECT * FROM categoria WHERE id_categoria=?");
        $sentencia->execute(array($id));
        $categoria = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $categoria;
    }
    public function GetCategorias(){
        $sentencia = $this->db->prepare( "SELECT * FROM categoria");
        $sentencia->execute();
        $categoria = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $categoria;
    }
    public function InsertarCategoria($nombre,$descripcion){
        $sentencia = $this->db->prepare("INSERT INTO categoria(nombre, descripcion) VALUES(?,?)");
        $sentencia->execute(array($nombre,$descripcion));
    }

    public function BorrarCategoria($id){
        $sentencia = $this->db->prepare("DELETE FROM categoria WHERE id_categoria=?");
        $sentencia->execute(array($id));
    }
    /*
    public function EditarProducto($nombre,$descripcion,$precio,$id){
        $sentencia = $this->db->prepare("UPDATE producto SET nombre = $nombre, descripcion = $descripcion, precio = $precio WHERE id_producto=?");
        $sentencia->execute(array($nombre,$descripcion,$precio,$id));
    }
    */

}

?>