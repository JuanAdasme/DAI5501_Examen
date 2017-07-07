<?php

include_once __DIR__.'/controller/PacienteController.php';

    if($_SERVER["REQUEST_METHOD"]==="GET") {
        if(isset($_GET['id'])) {
            $json = PacienteController::getJSONPaciente($_GET['id']);
            if(!$json) {
                $json = array('id' => null);
                echo json_encode($json);
            }
            echo json_encode($json);
        } else {
            echo "{\"error\": \"solictud incorrecta, no se ha enviado el rut de la persona\"";
            exit;
        }        
    } else {
        echo "{\"error\": \"el método de la solicitud no está permitido\"";
        exit;
    }