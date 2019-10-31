<?php


class UsuarioModel{

  private $db;

  function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;'.'dbname=db_productos;charset=utf8', 'root', '');
  }

  // INSERTAR
  function InsertarUsuario($nombre,$clave){
    $sentencia = $this->db->prepare("INSERT INTO usuario(nombre,clave) VALUES(?,?)");
    $sentencia->execute(array($nombre,$clave));
  }
  // GET PASSWOERD
  public function GetUsuario($nombre){
    $sentencia = $this->db->prepare( "SELECT * FROM usuario WHERE nombre = ?");
    $sentencia->execute(array($nombre));
    $clave = $sentencia->fetch(PDO::FETCH_OBJ);   
    return $clave;
  }
}
