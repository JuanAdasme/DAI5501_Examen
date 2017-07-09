<?php
include_once __DIR__.'/../dao/EstadisticaAtencionDao.php';
include_once __DIR__.'/../dao/DBConnection.php';
include_once __DIR__.'/../domain/Paciente.php';
include_once __DIR__.'/../domain/Atencion.php';


class EstadisticaController {

  public static function listarEstadisticaPaciente() {
      $conexion = DBConnection::getConexion();
      $dao = new EstadisticaAtencionDao($conexion);

      $lista = $dao->estadisticaPaciente();
    
      return $lista;
  }

  public static function listarEstadisticaAtencion() {
      $conexion = DBConnection::getConexion();
      $dao = new EstadisticaAtencionDao($conexion);

      $lista = $dao->estadisticaAtencion();

      return $lista;
  }




}
