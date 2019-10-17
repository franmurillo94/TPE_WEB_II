<?php
// dar nombre al modelo
class ProductosModel {

    private $db;
// linkear nuestra base de datos
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_productos;charset=utf8', 'root', '');
    }

    public function GetProductos(){
        $sentencia = $this->db->prepare( "select * from producto");
        $sentencia->execute();
        $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $productos;
    }
    public function InsertarProducto($nombre,$descripcion,$precio){

        $sentencia = $this->db->prepare("INSERT INTO producto(nombre, descripcion,precio) VALUES(?,?,?)");
        $sentencia->execute(array($nombre,$descripcion,$precio));
    }

    public function BorrarProducto($id){
        $sentencia = $this->db->prepare("DELETE FROM producto WHERE id=?");
        $sentencia->execute(array($id));
    }
}

?>
    
