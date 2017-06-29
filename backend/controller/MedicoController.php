<?php

include_once __DIR__.'/../dao/DBConnection.php';
include_once __DIR__.'/../dao/MedicoDao.php';
include_once __DIR__.'/../domain/Medico.php';

class MedicoController {
    
    public function __construct() {
        
    }
    
    public static function getMedicos($especialidad) {
        $conexion = DBConnection::getConexion();
        $medicoDao= new MedicoDao($conexion);
        
        $medicos = $medicoDao->getMedicos($especialidad);
        
        if($medicos != null) {
            return json_encode($medicos, JSON_FORCE_OBJECT);
        }
        return null;
    }
}