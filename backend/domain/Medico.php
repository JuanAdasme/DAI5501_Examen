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

 function getNombre_completo(){
   return $this->nombre_completo;
 }

 function getFecha_contratacion(){
   return $this->fecha_contratacion;
 }

 function getEspecialidad(){
   return $this->especialidad;
 }

 function getValor_consulta(){
   return $this->valor_consulta;
 }

 function setRut($rut){
   $this->rut = $rut;
 }

 function setNombre_completo($nombre_completo){
   $this->nombre_completo = $nombre_completo;
 }

 function setFecha_contratacion($fecha_contratacion){
   $this->fecha_contratacion = $fecha_contratacion;
 }

  function setEspecialidad($especialidad){
    $this->especialidad = $especialidad;
  }

  function setValor_consulta($valor_consulta){
    $this->valor_consulta = $valor_consulta;
  }

    public function jsonSerialize() {
           $arr = array ($rut => $this->getRut(),
                       'nombre_completo' => $this->getNombre_completo(),
                        'fecha_contratacion' => $this->getFecha_contratacion(),
                         'especialidad' => $this->getEspecialidad(),
                         'valor_consulta' => $this->getValor_consulta());
        return $arr;
    }
    

}
