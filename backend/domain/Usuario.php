<?php

class Usuario {
    
    private $id;
    private $clave;
    private $perfil;
    private $nombre;
    private $fechaRegistro;
    
    function __construct() {
    }
    
    function getId() {
        return $this->id;
    }

    function getClave() {
        return $this->clave;
    }

    function getPerfil() {
        return $this->perfil;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getFechaRegistro() {
        return $this->fechaRegistro;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setFechaRegistro($fechaRegistro) {
        $this->fechaRegistro = $fechaRegistro;
    }
    
}
