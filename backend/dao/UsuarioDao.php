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
            
            foreach($sentencia as $resultado) {
            /* @var $resultado Usuario */
            
                $usuario->setId($id);
                $usuario->setClave($resultado[1]);
                $usuario->setPerfil($resultado[2]);
                $usuario->setNombre($resultado[3]);
                $usuario->setFechaRegistro($resultado[4]);
            }
            return $usuario;
        }
        
        return false;
    }
    
    public function listarTodos() {
        $query = "SELECT usuario_id, usuario_perfil, usuario_nombre, usuario_fecha_registro FROM usuario";
        $sentencia = $this->conexion->prepare($query);
        $sentencia->execute();
        $users = [];
        
        if($sentencia->rowCount() > 0) {
            while($fila = $sentencia->fetch()) {
                $us = array(
                    'id' => $fila[0],
                    'perfil' => $fila[1],
                    'nombre' => $fila[2],
                    'fechaRegistro' => $fila[3]
                );
                
                array_push($users,$us);
            }
        }
        
        return $users;
    }
    
    public function eliminarRegistro($id) {
        $query = "DELETE FROM usuario WHERE usuario_id = $id";
        return $this->conexion->query($query);
    }
    
}
