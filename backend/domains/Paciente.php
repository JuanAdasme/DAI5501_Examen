<?php

class Paciente implements JsonSerializable{

  private $rut;
  private $nombre_completo;
  private $fecha_nacimiento;
  private $sexo;
  private $direccion;
  private $telefono;


  function getRut(){
    return $this->rut;
  }

  function getNombre_Completo(){
    return $this->nombre_completo;
  }

  function getFecha_Nacimiento(){
    return $this->fecha_nacimiento;
  }

  function getSexo(){
    return $this->sexo;
  }

  function getDireccion(){
    return $this->direccion;
  }

  function getTelefono(){
    return $this->telefono;
  }

  function setId($id){
    $this->id = $id;
  }

  function setNombre_Completo($nombre_completo){
    $this->nombre_completo = $nombre_completo;
  }

  function setFecha_Nacimiento($fecha_nacimiento){
    $this->fecha_nacimiento = $fecha_nacimiento;
  }

  function setSexo($sexo){
    $this->sexo = $sexo;
  }

  function setDireccion($direccion){
    $this->direccion = $direccion;
  }

 function setTelefon($telefono){
   $this->telefono = $telefono;
 }


}
