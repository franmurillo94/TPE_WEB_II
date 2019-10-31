<?php


class UsuarioModel
{
  private $db;

  function __construct()
  {
    $this->db = $this->Connect();
  }

  function Connect(){
    return new PDO('mysql:host=localhost;'.'dbname=db_productos;charset=utf8', 'root', '');
  }

  function GetAll(){
      $sentencia = $this->db->prepare("select * from usuario");
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function InsertarUsuario($nombre,$clave){
    $sentencia = $this->db->prepare("INSERT INTO usuario(nombre,clave) VALUES(?,?)");
    $sentencia->execute(array($nombre,$clave));
  }

  function GetUsuario($nombre){
      $sentencia = $this->db->prepare( "SELECT * from usuario where nombre=? limit 1");
      $sentencia->execute(array($nombre));
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
}
