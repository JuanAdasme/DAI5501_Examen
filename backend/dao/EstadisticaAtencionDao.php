<?php

include_once __DIR__.'/../domain/Atencion.php';
include_once __DIR__.'/GenericDao.php';

class EstadisticaAtencionDao implements GenericDao {

    /*@var $conexion PDO */
    private $conexion;

    function __construct($conexion) {
        $this->conexion = $conexion;
    }


    public function estadisticaAtencion(){
        $estadisticaAt = array();
        $query = "SELECT at.atencion_estado, med.MEDICO_ESPECIALIDAD, med.MEDICO_NOMBRE,
         med.medico_apellido_materno, med.MEDICO_APELLIDO_PATERNO
        FROM atencion at
        JOIN medico med ON (med.medico_rut = at.atencion_medico_rut)";

        $sentencia = $this->conexion->prepare($query);
        $sentencia->execute();

    }


    public function estadisticaPaciente(){
          $estadisicaPac = array();
          $query = "SELECT TIMESTAMPDIFF(YEAR,paciente_fecha_nacimiento,CURDATE()) AS edad,PACIENTE_SEXO,
          count(at.atencion_id)

          FROM paciente pac
          JOIN atencion at ON(pac.paciente_rut = at.atencion_paciente_rut)
          where atencion_estado = 'Realizada' ";

          $sentencia = $this->conexion->prepare($query);
          $sentencia->execute();

    }

    public function agregarRegistro($registro) {

   }

    public function buscarPorId($id) {

    }

    public function eliminarRegistro($id) {

    }

    public function listarTodos() {

    }

}
