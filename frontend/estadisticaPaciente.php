<?php
include_once __DIR__ . '/../backend/controller/EstadisticaController.php';
$lista = EstadisticaController::listarEstadisticaPaciente();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Estadísticas Pacientes</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"  media="all">
        <script src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>
    </head>
    <body>
        <div id="contenido">

            <div id="vista">
                <fieldset>
                    <legend>Estadisticas Atenciones</legend>
                    Filtro<input type="text" class="buscador"><br><br>
                    <div class="tabla">
                        <table border="3px" class="tablaRegistros">
                            <thead>
                                <tr>
                                    <th>Edad</th>
                                    <th>Sexo</th>
                                    <th>Cantidad de Atenciones Recibidas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($lista as $epac) {
                                    ?>
                                    <tr>
                                        <td><?= $epac['edad'] ?></td>
                                        <td><?= $epac['sexo'] ?></td>
                                        <td><?= $epac['atenciones'] ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div><br>
                </fieldset>
            </div>
            <div id="preFooter"></div>
        </div>
    </body>
</html>
