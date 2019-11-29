<?php
class ComentariosModel
{
  private $db;
  function __construct(){
    $this->db = new  PDO('mysql:host=localhost;'.'dbname=db_productos;charset=utf8', 'root', '');
  }
  function AgregarComentario($puntaje, $comentario, $id_producto, $id_usuario){
    $sentencia = $this->db->prepare("INSERT INTO comentarios(puntaje, comentario, id_producto, id_usuario) VALUES(?,?,?,?)");
    $sentencia->execute(array($puntaje, $comentario, $id_producto, $id_usuario));
  }
 
  function GetComentarioProducto($id_producto){
    $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE id_producto = ?");
    $sentencia->execute(array($id_producto));
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
  }
  
  function BorrarComentario($id_comentario){
    $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE id_comentario = ?");
    $sentencia->execute(array($id_comentario));
  }
  public function getComentario($id_comentario)
    {
        $query = $this->db->prepare("SELECT * FROM comentarios WHERE id_comentario = ?");
        $query->execute(array($id_comentario));
        $comentario = $query->fetch(PDO::FETCH_OBJ);
        return $comentario;
    }
}
 ?>