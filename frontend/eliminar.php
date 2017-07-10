<?php

include_once __DIR__.'/../backend/controller/MedicoController.php';
include_once __DIR__.'/../backend/controller/PacienteController.php';
include_once __DIR__.'/../backend/controller/UsuarioController.php';

?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eliminar</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"  media="all">
        <script src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>
        <script src="js/administrador.js"></script>
    </head>
    <body>
        <div id="vista">
            <fieldset>
                <legend>Eliminar Registro</legend>
                <div class="campoFormulario">
                    <label>Confirmar acción</label>
                    <input type="button" name="btnEliminar" value="Eliminar">
                    <input type="button" name="btnCancelar" value="Cancelar">
                </div>
            </fieldset>
        </div>
    </body>
</html>