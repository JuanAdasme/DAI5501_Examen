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
}