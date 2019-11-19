<?php
class comentariosModel
{
  private $db;
  function __construct(){
    $this->db = new  PDO('mysql:host=localhost;'.'dbname=db_productos;charset=utf8', 'root', '');
  }
  function AgregarComentario($puntaje, $comentario, $id_producto, $id_usuario){
    $sentencia = $this->db->prepare("INSERT INTO comentario(puntaje, comentario, id_producto, id_usuario) VALUES(?,?,?,?)");
    $sentencia->execute(array($puntaje, $comentario, $id_producto, $id_usuario));
  }
 
  function GetComentarioProducto($id_producto){
    $sentencia = $this->db->prepare("SELECT * FROM comentario WHERE id_producto = ?");
    $sentencia->execute($id_producto);
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
  }
  function GetComentarios(){
    $sentencia = $this->db->prepare("SELECT * FROM comentario");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
  }
  function BorrarComentario($id_comentario){
    $sentencia = $this->db->prepare("DELETE FROM comentario WHERE id_comentario = ?");
    $sentencia->execute(array($id_comentario));
  }
}
 ?>