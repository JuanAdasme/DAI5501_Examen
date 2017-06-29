<?php

include_once __DIR__.'/../domain/Medico.php';

class MedicoDao {
    /*@var $conexion mysqli */
    private $conexion;
    
    function __construct($conexion) {
        $this->conexion = $conexion;
    }
    
    public function getMedicos($especialidad) {
        $medicos = [];
        $query = "SELECT * FROM medico WHERE medico_especialidad = '$especialidad'";
        $registros = $this->conexion->query($query);
        
        if($registros != null) {
            foreach ($registros as $med) {
                $medico = new Medico();
                $medico->setRut($med[0]);
                $medico->setNombre($med[1]);
                $medico->setApellido_paterno($med[2]);
                $medico->setApellido_materno($med[3]);
                $medico->setEspecialidad($especialidad);
                $medico->setValor_consulta($med[6]);
                
                array_push($medicos, $medico);
            }
        }
        
        return $medicos;
    }
}
