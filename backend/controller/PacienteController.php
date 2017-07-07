<?php

include_once __DIR__.'/../dao/PacienteDao.php';
include_once __DIR__.'/../dao/DBConnection.php';
include_once __DIR__.'/../domain/Paciente.php';

class PacienteController{
    
    public static function agregarPaciente($rut,$nombre,$apellidoP,$apellidoM,$fechaNac,$genero,$direccion,$tel1,$tel2) {
        
        $conexion = DBConnection::getConexion();
        $dao = new PacienteDao($conexion);
        
        $paciente = new Paciente();
        $paciente->setRut($rut);
        $paciente->setNombre($nombre);
        $paciente->setApellido_paterno($apellidoP);
        $paciente->setApellido_materno($apellidoM);
        $paciente->setFecha_nacimiento($fechaNac);
        $paciente->setSexo($genero);
        $enc = base64_encode($direccion);
        $paciente->setDireccion($enc);
        $paciente->setTelefono($tel1);
        $paciente->setTelefono_opcional($tel2);
        
        return $dao->agregarRegistro($paciente);
    }
    
    public static function listarPacientes() {
        $conexion = DBConnection::getConexion();
        $dao = new PacienteDao($conexion);
        
        $lista = $dao->resumenPacientes();
        /*
        foreach($lista as $reg) {
            $reg['direccion'] = base64_decode($reg['direccion']);
        }*/
        return $lista;
    }
    
    public static function getJSONPaciente($id) {
        $conexion = DBConnection::getConexion();
        $dao = new PacienteDao($conexion);
        
        $paciente = $dao->buscarPorId($id);
        if(!$paciente) {
            return false;
        }
        return $paciente->jsonSerialize();
    }
}
