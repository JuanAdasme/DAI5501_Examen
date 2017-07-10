<?php

include_once __DIR__.'/../domain/Atencion.php';
include_once __DIR__.'/GenericDao.php';

class AtencionDao implements GenericDao {
    
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
                $atencion->setId($fila[0]);
                $atencion->setFecha_hora($fila[1]);
                $atencion->setPaciente_rut($fila[2]);
                $atencion->setMedico_rut($fila[3]);
                $atencion->setEstado($fila[4]);
                
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
    
    public function resumenAtenciones() {
        $atenciones = array();
        $query = "SELECT ate.atencion_id, ate.atencion_fecha_hora,
                         pa.paciente_nombre, pa.paciente_apellido_paterno, pa.paciente_apellido_materno,
                         me.medico_nombre, me.medico_apellido_paterno, me.medico_apellido_materno,
                         ate.atencion_estado
                    FROM atencion ate
                        JOIN paciente pa ON (pa.paciente_rut = ate.atencion_paciente_rut)
                        JOIN medico me ON (me.medico_rut = ate.atencion_medico_rut)";
        
        $sentencia = $this->conexion->prepare($query);
        $sentencia->execute();
        
        foreach($sentencia as $fila) {
            $atencion = array(
                    'id' => $fila[0],
                    'fechaHora' => $fila[1],
                    'paciente'=> $fila[2].' '.$fila[3].' '.$fila[4],
                    'medico' => $fila[5].' '.$fila[6].' '.$fila[7],
                    'estado' => $fila[8]
                    );
                    array_push($atenciones, $atencion);
        }
        return $atenciones;
    }
    
    public function listarPorId($id) {
        //$query = "SELECT * FROM atencion WHERE atencion_paciente_rut = $id";
        $query = "  SELECT ate.atencion_id, ate.atencion_fecha_hora,
                            med.medico_nombre, med.medico_apellido_paterno, med.medico_apellido_materno,
                            ate.atencion_estado
                    FROM atencion ate
                        JOIN medico med ON (med.medico_rut = ate.atencion_medico_rut)
                    WHERE ate.atencion_paciente_rut = $id";
        $sent = $this->conexion->prepare($query);
        $atenciones = [];
        
        $sent->execute();
        
        //if($sent->rowCount() > 0) {
            while ($reg = $sent->fetch()) {
                $ate = array();
                $ate[0] = $reg[0];
                $ate[1] = $reg[1];
                $ate[2] = $reg[2].' '.$reg[3].' '.$reg[4];
                $ate[3] = $reg[5];
                
                array_push($atenciones, $ate);
            }
        //}
        //else {
        //    return false;
        //}
        return $atenciones;
    }
}