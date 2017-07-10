<?php
include_once __DIR__.'/../dao/DBConnection.php';
include_once __DIR__.'/../dao/AtencionDao.php';
include_once __DIR__.'/../domain/Atencion.php';

class AtencionController {
    
    function __construct() {
    }
    
    public static function agregarAtencion($fecha, $hora, $idPaciente, $idMedico, $estado) {
        $atencion = new Atencion();

        $atencion->setFecha_hora($fecha);
        $rutPa = substr($idPaciente, 0,($idPaciente.length-3));
        $rutP = str_replace('.', '',$rutPa);
        $atencion->setPaciente_rut($rutP);
        $rutM = substr($idMedico, 0,($idMedico.length-3));
        $atencion->setMedico_rut($rutM);
        $atencion->setEstado($estado);
        $conexion = DBConnection::getConexion();
        $atencionDao = new AtencionDao($conexion);
        return $atencionDao->agregarAtencion($atencion);
    }
    
    public static function listarAtenciones() {
        $conexion = DBConnection::getConexion();
        $dao = new AtencionDao($conexion);

        return $dao->resumenAtenciones();
    }
    
    public static function listarPorId($id) {
        $conexion = DBConnection::getConexion();
        $dao = new AtencionDao($conexion);
        
        return $dao->listarPorId($id);
    }
}
