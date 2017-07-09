<?php
include_once __DIR__ . '/../backend/controller/EstadisticaController.php';
$lista = EstadisticaController::listarEstadisticaAtencion();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Estadísticas Atenciones</title>
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
                                    <th>Meses</th>
                                    <th>Especialidad</th>
                                    <th>Medico</th>
                                    <th>Estado Atencion</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($lista as $eaten) {
                                    ?>
                                    <tr>
                                        <td><?= $eaten['mes'] ?></td>
                                        <td><?= $eaten['estado'] ?></td>
                                        <td><?= $eaten['especialidad'] ?></td>
                                        <td><?= $eaten['medicoNombre'] ?></td>
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
