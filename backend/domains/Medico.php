<?php

class Medico implements JsonSerializable{

 private $rut;
 private $nombre_completo;
 private $fecha_contratacion;
 private $especialidad;
 private $valor_consulta;

 function getRut(){
   return $this->rut;
 }

 function getNombre_Completo(){
   return $this->nombre_completo;
 }

 function getFecha_Contratacion(){
   return $this->fecha_contratacion;
 }

 function getEspecialidad(){
   return $this->especialidad;
 }

 function getValor_Consulta(){
   return $this->valor_consulta;
 }

 function setRut($rut){
   $this->rut = $rut;
 }

 function setNombre_Completo($nombre_completo){
   $this->nombre_completo = $nombre_completo;
 }

 function setFecha_Contratacion($fecha_contratacion){
   $this->fecha_contratacion = $fecha_contratacion;
 }

  function setEspecialidad($especialidad){
    $this->especialidad = $especialidad;
  }

  function setValor_Consulta($valor_consulta){
    $this->valor_consulta = $valor_consulta;
  }

}
