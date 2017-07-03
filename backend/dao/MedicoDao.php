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
    
    public function agregarRegistro($registro) {
        /* @var $registro Medico */
        
        $query = "INSERT INTO medico VALUES (:rut, :nombre, :apellidoP, :apellidoM, :fechaContrato, :especialidad, :valor);";
        
        $sentencia = $this->conexion->prepare($query);
        
        $rut = $registro->getRut();
        $nom = $registro->getNombre();
        $apePat = $registro->getApellido_paterno();
        $apeMat = $registro->getApellido_materno();
        $fecha = $registro->getFecha_contratacion();
        $espec = $registro->getEspecialidad();
        $valor = $registro->getValor_consulta();
        
        $sentencia->bind_param(':rut', $rut);
        $sentencia->bind_param(':nombre', $nom);
        $sentencia->bind_param(':apellidoP', $apePat);
        $sentencia->bind_param(':apellidoM', $apeMat);
        $sentencia->bind_param(':fechaContrato', $fecha);
        $sentencia->bind_param(':especialidad', $espec);
        $sentencia->bind_param(':valor', $valor);
        
        return $sentencia->execute();
    }
}
