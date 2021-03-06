<?php

include_once __DIR__.'/../domain/Paciente.php';
include_once __DIR__.'/../domain/Atencion.php';
include_once __DIR__.'/GenericDao.php';

class PacienteDao implements GenericDao {
    
    /* @var $conexion PDO */
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
        $query = "INSERT INTO paciente VALUES (:rut, :nombre, :apellidoP, :apellidoM, :fechaNacimiento, :genero, :direccion, :telefono1, :telefono2);";
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
        
        $sentencia->bindParam(':rut', $rut);
        $sentencia->bindParam(':nombre', $nom);
        $sentencia->bindParam(':apellidoP', $apePat);
        $sentencia->bindParam(':apellidoM', $apeMat);
        $sentencia->bindParam(':fechaNacimiento', $fecha);
        $sentencia->bindParam(':genero', $gen);
        $sentencia->bindParam(':direccion', $direc);
        $sentencia->bindParam(':telefono1', $tel1);
        if($tel2 == null) {
            $tel2 = 0;
        }
        $sentencia->bindParam(':telefono2', $tel2);
        
        return $sentencia->execute();
    }
    
    public function listarTodos() {
        $pacientes = array();
        $filas = $this->conexion->query("SELECT * FROM paciente;");
        
        if($filas->rowCount() > 0) {
            foreach($filas as $fila) {
                $paciente = new Paciente();
                $paciente->setRut($fila["paciente_rut"]);
                $paciente->setNombre($fila["paciente_nombre"]);
                $paciente->setApellido_paterno($fila["paciente_apellido_paterno"]);
                $paciente->setApellido_materno($fila["paciente_apellido_materno"]);
                $paciente->setFecha_nacimiento($fila["paciente_fecha_nacimiento"]);
                $paciente->setSexo($fila["paciente_sexo"]);
                $paciente->setDireccion($fila["paciente_direccion"]);
                $paciente->setTelefono($fila["paciente_telefono"]);
                $paciente->setTelefono_opcional($fila["paciente_telefono_2"]);
                
                array_push($pacientes, $paciente);
            }
        }
        
        return $pacientes;
    }
    
    public function buscarPorId($id) {
        $query = "SELECT * FROM paciente WHERE paciente_rut = $id";
        $sentencia = $this->conexion->prepare($query);
        $sentencia->execute();
        
        if($sentencia->rowCount() > 0) {
            $fila = $sentencia->fetch();
            $paciente = new Paciente();
            $paciente->setRut($fila[0]);
            $paciente->setNombre($fila[1]);
            $paciente->setApellido_paterno($fila[2]);
            $paciente->setApellido_materno($fila[3]);
            $paciente->setFecha_nacimiento($fila[4]);
            $paciente->setSexo($fila[5]);
            $direccion = base64_decode($fila[6]);
            $paciente->setDireccion($direccion);
            $paciente->setTelefono($fila[7]);
            $paciente->setTelefono_opcional($fila[8]);
            
            return $paciente;
        }
        
        return false;
    }
    
    public function eliminarRegistro($id) {
        $query = "DELETE FROM paciente WHERE paciente_rut = $id";
        return $this->conexion->query($query);
    }
    
    public function resumenPacientes() {
        $sentencia = $this->conexion->prepare("SELECT * FROM paciente");
        $sentencia->execute();
        $lista = [];
        
        foreach($sentencia as $fila) {
            $paciente = array(
                'id' => $fila[0],
                'nombre' => $fila[1].' '.$fila[2].' '.$fila[3],
                'fechaNacimiento' => $fila[4],
                'sexo' => $fila[5],
                'direccion' => base64_decode($fila[6]),
                'telefono' => $fila[7]
            );
            array_push($lista, $paciente);
        }
        return $lista;
    }
}