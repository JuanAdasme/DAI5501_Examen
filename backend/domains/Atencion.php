<?php


class Atencion implements JsonSerializable{

 private $id;
 private $fecha_hora;
 private $paciente_rut;
 private $medico_rut;
 private $estado;

 function getId(){
   return $this->id;
 }

 function getFecha_hora(){
   return $this->fecha_hora;
 }

 function getPaciente_rut(){
   return $this->paciente_rut;
 }

 function getMedico_rut(){
   return $this->medico_rut;
 }

 function getEstado(){
   return $this->estado;
 }

 function setId($id){
   $this->id = $id;
 }

 function setFecha_hora($fecha_hora){
   $this->fecha_hora = $fecha_hora;
 }

 function setPaciente_rut($paciente_rut){
   $this->paciente_rut = $apciente_rut;
 }

 function setMedico_rut($medico_rut){
   $this->medico_rut = $medico_rut;
 }

 function setEstado($estado){
   $this->estado = $estado;
 }
}
