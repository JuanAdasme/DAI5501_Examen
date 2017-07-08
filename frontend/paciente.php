<?php
session_start();

include_once __DIR__ . '/../backend/controller/AtencionController.php';

if($_SESSION['perfil'] != 'Paciente' || !isset($_SESSION['id'])) {
    header('location: login.php');
}
if ($_SESSION['perfil'] === 'Paciente') {

    $atenciones = AtencionController::listarPorId($_SESSION['id']);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Paciente</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"  media="all">
        <script src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>
        <script type="text/javascript" src="js/jquery.Rut.js"></script>
        <script type="text/javascript" src="js/buscador.js"></script>
    </head>
    <body>
        <div id="contenido">

<?php include_once __DIR__ . '/header.php' ?>

            <div id="vista">
                <fieldset>
                    <legend>MIS ATENCIONES</legend>
                    Filtro<input type="text" class="buscador"><br><br>
                    <div class="tabla">
                        <table border="3px" class="tablaRegistros">

                            <thead>
                                <tr>
                                    <th>Numero Atencion</th>
                                    <th>Fecha y Hora </th>
                                    <th>Medico Tratante</th>
                                    <th>Estado Atencion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($atenciones as $ate) {
                                ?>
                                <tr>
                                    <td><?= $ate[0] ?></td>
                                    <td><?= $ate[1] ?></td>
                                    <td><?= $ate[2] ?></td>
                                    <td><?= $ate[3] ?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div><br>

                </fieldset>
            </div>

<?php include_once __DIR__ . '/footer.php'; ?>
        </div>
    </body>
</html>
