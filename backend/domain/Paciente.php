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

  function getNombre_completo() {
      return $this->nombre_completo;
  }

    function getFecha_nacimiento(){
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

  function setNombre_completo($nombre_completo){
    $this->nombre_completo = $nombre_completo;
  }

  function setFecha_nacimiento($fecha_nacimiento){
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

    public function jsonSerialize() {
        $arra = array ($id => $this-> getId(),
                       'nombre_completo' => $this->getNombre_completo(),
                        'fecha_nacimiento' => $this->getFecha_nacimiento(),
                         'sexo' => $this->getSexo(),
                         'direccion' => $this->getDireccion(),
                         'telefono' => $this->getTelefono());
        return $arra;
    }

}