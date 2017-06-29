<?php
include_once __DIR__.'../backend/controller/AtencionController.php';

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['fechaAtencion']) && isset($_GET['horaAtencion'])
            && isset($_GET['rutPaciente']) && isset($_GET['rutMedico'])) {
        
        /*@var $fecha Datetime*/
        $fecha = $_GET['fechaAtencion'].$_GET['horaAtencion'];
        $idPaciente = $_GET['rutPaciente'];
        $idMedico = $_GET['rutMedico'];
        
        $json = AtencionController::agregarAtencion($fecha, $idPaciente, $idMedico);
        echo $json;
        
    } else {
        echo "{'error': 'Falta rellenar alguno de los campos'}";
        exit;
    }
} else {
    echo "{'error': 'El método de la solicitud es incorrecto'}";
    exit();
}