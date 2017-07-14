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
    
    public static function agregarMedico($rut, $nombre, $apellidoP, $apellidoM,
                                            $fechaContrato, $especialidad, $valorConsulta) {
        $medico = new Medico();
        
        $medico->setRut($rut);
        $medico->setNombre($nombre);
        $medico->setApellido_paterno($apellidoP);
        $medico->setApellido_materno($apellidoM);
        $medico->setFecha_contratacion($fechaContrato);
        $medico->setEspecialidad($especialidad);
        $medico->setValor_consulta($valorConsulta);
        
        $conexion = DBConnection::getConexion();
        $medicoDao = new MedicoDao($conexion);
        
        return $medicoDao->agregarRegistro($medico);
    }
    
    public static function listarMedicos() {
        $conexion = DBConnection::getConexion();
        $dao = new MedicoDao($conexion);
        
        return $dao->resumenMedicos();
    }
    
    public static function eliminarMedico($id) {
        $conexion = DBConnection::getConexion();
        $dao = new MedicoDao($conexion);
        
        return $dao->eliminarRegistro($id);
    }
}