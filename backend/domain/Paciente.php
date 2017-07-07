<?php

class Paciente implements JsonSerializable{

  private $rut;
  private $nombre;
  private $apellido_paterno;
  private $apellido_materno;
  private $fecha_nacimiento;
  private $sexo;
  private $direccion;
  private $telefono;
  private $telefono_opcional;


  function getRut(){
    return $this->rut;
  }

  function getNombre() {
      return $this->nombre;
  }

  function getApellido_paterno() {
      return $this->apellido_paterno;
  }

  function getApellido_materno() {
      return $this->apellido_materno;
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
  
  function getTelefono_opcional() {
      return $this->telefono_opcional;
  }
  
  function setRut($rut) {
      $this->rut = $rut;
  }

  function setNombre($nombre) {
      $this->nombre = $nombre;
  }

  function setApellido_paterno($apellido_paterno) {
      $this->apellido_paterno = $apellido_paterno;
  }

  function setApellido_materno($apellido_materno) {
      $this->apellido_materno = $apellido_materno;
  }

  function setFecha_nacimiento($fecha_nacimiento) {
      $this->fecha_nacimiento = $fecha_nacimiento;
  }

  function setSexo($sexo) {
      $this->sexo = $sexo;
  }

  function setDireccion($direccion) {
      $this->direccion = $direccion;
  }

  function setTelefono($telefono) {
      $this->telefono = $telefono;
  }

  function setTelefono_opcional($telefono_opcional) {
      $this->telefono_opcional = $telefono_opcional;
  }

  
    public function jsonSerialize() {
        if($this->telefono_opcional == null) {
            $telOpcional = '';
        }
        else {
            $telOpcional = $this->getTelefono_opcional();
        }
        $arra = array ('id' => $this->getRut(),
                        'nombre' => $this->getNombre(),
                        'apellido_paterno' => $this->getApellido_paterno(),
                        'apellido_materno' => $this->getApellido_materno(),
                        'fecha_nacimiento' => $this->getFecha_nacimiento(),
                        'sexo' => $this->getSexo(),
                        'direccion' => $this->getDireccion(),
                        'telefono' => $this->getTelefono(),
                        'telOpcional' => $telOpcional);
        return $arra;
    }

}