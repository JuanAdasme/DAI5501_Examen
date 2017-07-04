<?php
include_once __DIR__.'/../dao/DBConnection.php';
include_once __DIR__.'/../dao/AtencionDao.php';
include_once __DIR__.'/../domain/Atencion.php';

class AtencionController {
    
    function __construct() {
    }
    
    public static function agregarAtencion($fecha, $idPaciente, $idMedico) {
        $atencion = new Atencion();
        $atencion->setFecha_hora($fecha);
        $atencion->setPaciente_rut($idPaciente);
        $atencion->setMedico_rut($idMedico);
        $atencion->setEstado("Agendada");
        
        $conexion = DBConnection::getConexion();
        $atencionDao = new AtencionDao($conexion);
        
        return $atencionDao->agregarAtencion($atencion);
    }
    
    public static function listarAtenciones() {
        $conexion = DBConnection::getConexion();
        $dao = new AtencionDao($conexion);

        return $dao->resumenAtenciones();
    }
}
