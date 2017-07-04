<?php

include_once __DIR__.'/../domain/Usuario.php';
include_once __DIR__.'/GenericDao.php';

class UsuarioDao implements GenericDao {

   /* @var $conexion PDO */
    private $conexion;
    
    function __construct($conexion) {
        $this->conexion = $conexion;
    }
    
    public function agregarRegistro($usuario) {
        /* @var $usuario Usuario */
        
        $query = "INSERT INTO usuario VALUES (:id, :clave, :perfil, :nombre, :fechaRegistro)";
        $sentencia = $this->conexion->prepare($query);
        
        $id = $usuario->getId();
        $clave = $usuario->getClave();
        $perfil = $usuario->getPerfil();
        $nombre = $usuario->getNombre();
        $fecha = $usuario->getFechaRegistro();
        
        $sentencia->bindParam(':id', $id);
        $sentencia->bindParam(':clave', $clave);
        $sentencia->bindParam(':perfil', $perfil);
        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':fechaRegistro', $fecha);
        
        return $sentencia->execute();
    }
    
    public function buscarPorId($id) {
        $query = "SELECT * FROM usuario WHERE usuario_id = $id";
        $sentencia = $this->conexion->prepare($query);
        $sentencia->execute();
        /* @var $sentencia PDOStatement */
        
        if($sentencia->rowCount() > 0) {
            $usuario = new Usuario();
            $resultado = $sentencia->fetch();
            /* @var $resultado Usuario */
            
            $usuario->setId($id);
            $usuario->setClave($resultado->getClave());
            $usuario->setPerfil($resultado->getPerfil());
            $usuario->setNombre($resultado->getNombre());
            $usuario->setFechaRegistro($resultado->getFechaRegistro());
            
            return $usuario;
        }
        
        return false;
    }
    
    public function listarTodos() {
    }
    
    public function eliminarRegistro($id) {
        $query = "DELETE FROM usuario WHERE usuario_id = $id";
        return $this->conexion->query($query);
    }
}
