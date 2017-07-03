<?php

include_once __DIR__.'/../domain/Atencion.php';

class AtencionDao  {
    
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
    
    public function listarTodos() {
        $atenciones = array();
        $filas = $this->conexion->query("SELECT * FROM atencion;");
        
        if($filas->rowCount() > 0) {
            foreach($filas as $fila) {
                $atencion = new Atencion();
                $atencion->setId($fila["atencion_id"]);
                $atencion->setFecha_hora($fila["atencion_fecha_hora"]);
                $atencion->setPaciente_rut($fila["atencion_paciente_rut"]);
                $atencion->setMedico_rut($fila["atencion_paciente_rut"]);
                $atencion->setEstado($fila["atencion_estado"]);
                
                array_push($atenciones, $atencion);
            }
        }
        
        return $atenciones;
    }
    
    public function agregarRegistro($registro) {
        /* @var $registro Atencion */
        $query = "INSERT INTO atencion (atencion_fecha_hora, atencion_paciente_rut, atencion_medico_rut, atencion_estado)"
                . "                 VALUES (:fecha, :rutP, :rutM, :estado);";
        
        $sentencia = $this->conexion->prepare($query);
        
        $fecha = $registro->getFecha_hora();
        $rutP = $registro->getPaciente_rut();
        $rutM = $registro->getMedico_rut();
        $estado = $registro->getEstado();
        
        $sentencia->bind_param(':fecha', $fecha);
        $sentencia->bind_param(':rutP', $rutP);
        $sentencia->bind_param(':rutM', $rutM);
        $sentencia->bind_param(':estado', $estado);
        
        return $sentencia->execute();
    }
    
    public function buscarPorId($id) {
    }
    
    public function eliminarRegistro($id) {
    }
}

/*
 *             `ATENCION_ID` int(6) NOT NULL AUTO_INCREMENT,
               `ATENCION_FECHA_HORA` DateTime DEFAULT NULL,
               `ATENCION_PACIENTE_RUT`INT(8) NOT NULL,
               `ATENCION_MEDICO_RUT` INT(8) NOT NULL,
               `ATENCION_ESTADO` varchar(15) DEFAULT 'Agendada',
 */