<?php

include_once __DIR__.'/../domain/Paciente.php';
include_once __DIR__.'/../domain/Atencion.php';

class PacienteDao {
    
    private $conexion;
    
      public function __construct($conexion) {
        $this->conexion = $conexion;
    }  

    public function getDatosPaciente($rut) {
        
        $query = "SELECT pa.paciente_rut,at.atencion_fecha_hora, at.estado FROM paciente pa JOIN atencion at on (paciente_rut = atencion_paciente_rut)  WHERE paciente_rut = $rut";
        $sentencia = $this->conexion->prepare($query);
        $exito = $sentencia->execute();
        
        if($exito) {
            while($registro = $sentencia->fetch()) { 
            $paciente = new Paciente();
            $paciente->setRut($registro[0]);
            $paciente->setFecha_hora($registro[1]);
            $paciente->setEstado($registro[2]);
            }
            return $paciente;
        }
        
        return $exito;
    }
    
    public function agregarRegistro($registro) {
        /* @var $registro Paciente */
        
        $query = "INSERT INTO paciente VALUES (:rut, :nombre, :apellidoP, :apellidoM, :fechaNacimiento, :genero, :direccion :telefono1, :telefono2);";
        
        $sentencia = $this->conexion->prepare($query);
        
        $rut = $registro->getRut();
        $nom = $registro->getNombre();
        $apePat = $registro->getApellido_paterno();
        $apeMat = $registro->getApellido_materno();
        $fecha = $registro->getFecha_nacimiento();
        $gen = $registro->getSexo();
        $direc = $registro->getDireccion();
        $tel1 = $registro->getTelefono();
        $tel2 = $registro->getTelefono_opcional();
        
        $hashDireccion = password_hash($direc, PASSWORD_BCRYPT);
        
        $sentencia->bind_param(':rut', $rut);
        $sentencia->bind_param(':nombre', $nom);
        $sentencia->bind_param(':apellidoP', $apePat);
        $sentencia->bind_param(':apellidoM', $apeMat);
        $sentencia->bind_param(':fechaNacimiento', $fecha);
        $sentencia->bind_param(':genero', $gen);
        $sentencia->bind_param(':direccion', $hashDireccion);
        $sentencia->bind_param(':telefono1', $tel1);
        $sentencia->bind_param(':telefono2', $tel2);
        
        return $sentencia->execute();
    }
}