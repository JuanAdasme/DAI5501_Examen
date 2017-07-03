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
        $hash = password_hash($direccion, PASSWORD_BCRYPT);
        $paciente->setDireccion($hash);
        $paciente->setTelefono($tel1);
        $paciente->setTelefono_opcional($tel2);
        
        return $dao->agregarRegistro($paciente);
    }

}
