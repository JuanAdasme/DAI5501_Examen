<?php

include_once __DIR__.'/../dao/UsuarioDao.php';
include_once __DIR__.'/../dao/DBConnection.php';
include_once __DIR__.'/../domain/Usuario.php';

class UsuarioController {
    
    public static function agregarUsuario($id, $clave, $perfil,$nombre) {
        
        $usuario = new Usuario();
        $hash = password_hash($clave, 1);
        
        $usuario->setId($id);
        $usuario->setClave($hash);
        $usuario->setPerfil($perfil);
        $usuario->setNombre($nombre);
        $usuario->setFechaRegistro(date('d/m/y'));
        
        $conexion = ConexionDB::getConexion();
        
        $dao = new UsuarioDao($conexion);
        return $dao->agregarRegistro($usuario);
    }
    
    
        public static function validarUsuario($id, $clave) {
        
        $conexion = ConexionDB::getConexion();
        $daoUsuario= new UsuarioDao($conexion);
        
        $usuario = $daoUsuario->buscarPorId($id);
        
        if($usuario == null)  {
            return false;
        }
        
        if(password_verify($clave, $usuario->getClave())) {
            $_SESSION["rut"] = $usuario->getId();
            return true;
        }
        
        return false;
    }
}