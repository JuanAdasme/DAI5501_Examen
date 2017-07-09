<?php

include_once __DIR__.'/../domain/Atencion.php';
include_once __DIR__.'/../domain/Paciente.php';
include_once __DIR__.'/../domain/Medico.php';
include_once __DIR__.'/GenericDao.php';

class EstadisticaAtencionDao implements GenericDao {

    /*@var $conexion PDO */
    private $conexion;

    function __construct($conexion) {
        $this->conexion = $conexion;
    }


    public function estadisticaAtencion(){

        $query = "SELECT month(at.atencion_fecha_hora),at.atencion_estado, med.medico_especialidad, med.medico_nombre ,
        med.medico_apellido_paterno, med.medico_apellido_materno
        from atencion at
        join medico med on (med.medico_rut = at.atencion_medico_rut) order by month(atencion_fecha_hora)";

        $sentencia = $this->conexion->prepare($query);
        $sentencia->execute();
        $lista = [];

        foreach ($sentencia as $fila) {
          $estAtencion = array(
              'mes' => $fila[0],
              'estado'=> $fila[1],
              'especialidad' => $fila[2],
              'medicoNombre'=> $fila[3].' '.$fila[4].' '.$fila[5]
          );

          array_push($lista, $estAtencion);
        }

        return $lista;

    }


    public function estadisticaPaciente(){

          $query = "SELECT TIMESTAMPDIFF(YEAR,paciente_fecha_nacimiento,CURDATE()) AS 'edad', paciente_sexo,
          count(at.atencion_id) AS 'cantidad'

          FROM paciente pac
          JOIN atencion at ON(pac.paciente_rut = at.atencion_paciente_rut)
          WHERE atencion_estado = 'Realizada'
          GROUP BY edad, paciente_sexo";

          $sentencia = $this->conexion->prepare($query);
          $sentencia->execute();
          $lista = [];

          foreach ($sentencia as $fila) {
            $estPaciente = array(
                'edad' => $fila[0],
                'sexo' => $fila[1],
                'atenciones' => $fila[2]
            );

            array_push($lista, $estPaciente);
          }

          return $lista;


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
