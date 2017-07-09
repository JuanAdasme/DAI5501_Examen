<?php
/* session_start();

  if(!isset($_SESSION['id'])) {
  header('location: index.php');
  }

  if($_SESSION['perfil'] === 'paciente') {
  alert('Usuario no autorizado');
  header('location: index.php');
  } */

include_once __DIR__ . '/../backend/controller/AtencionController.php';
$atenciones = AtencionController::listarAtenciones();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Atenciones</title>
        <!--<link rel="stylesheet" type="text/css" href="css/boton.css"  media="all">-->
        <link rel="stylesheet" type="text/css" href="css/estilo.css"  media="all">
        <script src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>
        <script type="text/javascript" src="js/buscador.js"></script>
    </head>
    <body>
        <div id="contenido">
            <div id="vista">
                    <fieldset>
                        <legend>ATENCIONES</legend>
                        Filtro<input type="text" class="buscador" placeholder="Ingrese atencion a buscar"><br><br>
                        <div class="tabla" >
                            <table border="3px" class="tablaRegistros" >

                                <thead>
                                    <tr>
                                        <th>Numero Atencion</th>
                                        <th>Fecha y Hora </th>
                                        <th>Nombre Paciente</th>
                                        <th>Medico Tratante</th>
                                        <th>Estado Atencion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($atenciones as $atencion) {
                                        /* @var $atencion Atencion */
                                        ?>
                                        <tr>
                                            <td><?= $atencion['id'] ?></td>
                                            <td><?= $atencion['fechaHora'] ?></td>
                                            <td><?= $atencion['paciente'] ?></td>
                                            <td><?= $atencion['medico'] ?></td>
                                            <td><?= $atencion['estado'] ?></td>
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
