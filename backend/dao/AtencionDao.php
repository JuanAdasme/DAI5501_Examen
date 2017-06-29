<?php

include_once __DIR__.'/../domain/Atencion.php';

class AtencionDao {
    
    /*@var $conexion PDO */
    private $conexion;
    
    function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function getDatosAtencion($idPaciente) {
        $query = "SELECT * FROM atencion WHERE atencion_paciente_rut = $idPaciente";
        $result = $this->conexion->query($query);
        
        while($registro = $result->fetch()) {
            $atencion = new Atencion();
            $atencion->setId($registro[0]);
            $atencion->setFecha_hora($registro[1]);
            $atencion->setPaciente_rut($registro[2]);
            $atencion->setMedico_rut($registro[3]);
            $atencion->setEstado($registro[4]);
        }
        
        return $atencion;
    }
    
    public function agregarAtencion($atencion) {
        /*@var $atencion Atencion*/
        
        $query = "INSERT INTO atencion (atencion_fecha_hora,atencion_paciente_rut,"
                                        . "atencion_medico_rut)"
                                        . "VALUES(:fecha, :paciente, :medico)";
        
        $sent = $this->conexion->prepare($query);
        
        $fecha = $atencion->getFecha_hora();
        $paciente = $atencion->getPaciente_rut();
        $medico = $atencion->getMedico_rut();
        
        $sent->bindParam(':fecha', $fecha);
        $sent->bindParam(':paciente', $paciente);
        $sent->bindParam(':medico', $medico);
        
        return $sent->execute();
    }
}