<?php
// dar nombre al modelo
class ProductosModel {

    private $db;
// linkear nuestra base de datos
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_productos;charset=utf8', 'root', '');
    }
    // DEVUELVE UN PRODUCTO(ID) DE LA BD
    public function GetProducto($id){
        $sentencia = $this->db->prepare( "SELECT * FROM producto WHERE id_producto=?");
        $sentencia->execute(array($id[0]));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    // DEVUELVE TODOS LOS PRODUCTOS DE LA BD
    public function GetProductos(){
        $sentencia = $this->db->prepare( "SELECT * from producto");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    
    // INSERTA UN PRODUCTO NUEVO EN LA BD
    public function InsertarProducto($nombre,$descripcion,$precio,$categoria){
        $sentencia = $this->db->prepare("INSERT INTO producto(nombre,descripcion,precio,id_categoria) VALUES(?,?,?,?)");
        $ok = $sentencia->execute(array($nombre,$descripcion,$precio,$categoria));
        if(!$ok)
        {
            var_dump($sentencia->errorInfo());
            die;
        }
    }
    // BORRA UN PRODUCTO(ID) DE LA BD
    public function BorrarProducto($id){
        $sentencia = $this->db->prepare("DELETE FROM producto WHERE id_producto=?");
        $sentencia->execute(array($id));
    }
    
    public function EditarProducto($nombre,$descripcion,$precio,$id){
        $sentencia = $this->db->prepare("UPDATE producto SET nombre = $nombre, descripcion = $descripcion, precio = $precio WHERE id_producto=$id");
        $ok = $sentencia->execute(array($nombre,$descripcion,$precio,$id));
        if(!$ok)
        {
            var_dump($sentencia->errorInfo());
            die;
        }
    }
    

}

?>
    
