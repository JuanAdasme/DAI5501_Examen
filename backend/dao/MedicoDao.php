<?php

include_once __DIR__.'/../domain/Medico.php';
include_once __DIR__.'/GenericDao.php';

class MedicoDao implements GenericDao {
    /*@var $conexion PDO */
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
        
        $sentencia->bindParam(':rut', $rut);
        $sentencia->bindParam(':nombre', $nom);
        $sentencia->bindParam(':apellidoP', $apePat);
        $sentencia->bindParam(':apellidoM', $apeMat);
        $sentencia->bindParam(':fechaContrato', $fecha);
        $sentencia->bindParam(':especialidad', $espec);
        $sentencia->bindParam(':valor', $valor);
        
        return $sentencia->execute();
    }
    
    public function listarTodos() {
        $medicos = array();
        $filas = $this->conexion->query("SELECT * FROM medico;");
        
        if($filas->rowCount() > 0) {
            foreach($filas as $fila) {
                $medico = new Medico();
                $medico->setRut($fila["medico_rut"]);
                $medico->setNombre($fila["medico_nombre"]);
                $medico->setApellido_paterno($fila["medico_apellido_paterno"]);
                $medico->setApellido_materno($fila["medico_apellido_materno"]);
                $medico->setFecha_contratacion($fila["medico_fecha_contratacion"]);
                $medico->setEspecialidad($fila["medico_especialidad"]);
                $medico->setValor_consulta($fila["medico_valor_consulta"]);
                
                array_push($medicos, $medico);
            }
        }
        
        return $medicos;
    }
    
    public function buscarPorId($id) {
        $query = "SELECT * FROM medico WHERE medico_rut = $id";
        $sentencia = $this->conexion->prepare($query);
        $sentencia->execute();
        
        if($sentencia->rowCount() > 0) {
            $fila = $sentencia->fetch();
            $medico = new Medico();
            $medico->setRut($fila["medico_rut"]);
            $medico->setNombre($fila["medico_nombre"]);
            $medico->setApellido_paterno($fila["medico_apellido_paterno"]);
            $medico->setApellido_materno($fila["medico_apellido_materno"]);
            $medico->setFecha_contratacion($fila["medico_fecha_contratacion"]);
            $medico->setEspecialidad($fila["medico_especialidad"]);
            $medico->setValor_consulta($fila["medico_valor_consulta"]);
            
            return $medico;
        }
        
        return false;
    }
    
    public function eliminarRegistro($id) {
        $query = "DELETE FROM medico WHERE medico_rut = $id";
        return $this->conexion->query($query);
    }
    
    public function resumenMedicos() {
        $sentencia = $this->conexion->prepare("SELECT * FROM medico");
        $sentencia->execute();
        $lista = [];
        
        while($fila = $sentencia->fetch()) {
            $medico = array(
                'id' => $fila[0],
                'nombre' => $fila[1].' '.$fila[2].' '.$fila[3],
                'fechaContrato' => $fila[4],
                'especialidad' => $fila[5],
                'valor' => $fila[6]
            );
            array_push($lista, $medico);
        }
        return $lista;
    }
}
