<?php

include_once __DIR__.'/controller/MedicoController.php';

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['especialidad'])) {
        $json = MedicoController::getMedicos($_GET['especialidad']);
        echo $json;
    } else {
        echo "{'error': 'Falta rellenar alguno de los campos'}";
        exit;
    }
} else {
    echo "{'error': 'El método de la solicitud es incorrecto'}";
    exit();
}