<?php

include_once __DIR__.'/controller/MedicoController.php';
include_once __DIR__.'/controller/PacienteController.php';
include_once __DIR__.'/controller/UsuarioController.php';

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['id'])) {
        $exito = MedicoController::eliminarMedico($_GET['id']);
        
        if(!$exito) {
            echo "{'error': 'No se ha eliminado el registro'";
        } else {
            echo "{'exito': 'Se ha eliminado el registro'";
        }
        
    } else {
        echo "{'error': 'No se ha ingresado un id válido'}";
        exit;
    }
} else {
    echo "{'error': 'El método de la solicitud es incorrecto'}";
    exit();
}