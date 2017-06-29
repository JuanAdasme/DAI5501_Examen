<?php

class Medico implements JsonSerializable {

    private $rut;
    private $nombre;
    private $apellido_paterno;
    private $apellido_materno;
    private $fecha_contratacion;
    private $especialidad;
    private $valor_consulta;

    function getRut() {
        return $this->rut;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getFecha_contratacion() {
        return $this->fecha_contratacion;
    }

    function getEspecialidad() {
        return $this->especialidad;
    }

    function getValor_consulta() {
        return $this->valor_consulta;
    }

    function setRut($rut) {
        $this->rut = $rut;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function getApellido_paterno() {
        return $this->apellido_paterno;
    }

    function getApellido_materno() {
        return $this->apellido_materno;
    }

    function setApellido_paterno($apellido_paterno) {
        $this->apellido_paterno = $apellido_paterno;
    }

    function setApellido_materno($apellido_materno) {
        $this->apellido_materno = $apellido_materno;
    }

    function setFecha_contratacion($fecha_contratacion) {
        $this->fecha_contratacion = $fecha_contratacion;
    }

    function setEspecialidad($especialidad) {
        $this->especialidad = $especialidad;
    }

    function setValor_consulta($valor_consulta) {
        $this->valor_consulta = $valor_consulta;
    }

    public function jsonSerialize() {
        $arr = array('rut' => $this->getRut(),
            'nombre' => $this->getNombre(),
            'apellido_paterno' => $this->getApellido_paterno(),
            'apellido_materno' => $this->getApellido_materno(),
            'fecha_contratacion' => $this->getFecha_contratacion(),
            'especialidad' => $this->getEspecialidad(),
            'valor_consulta' => $this->getValor_consulta());
        return $arr;
    }

}
