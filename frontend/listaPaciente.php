<?php
include_once __DIR__ . '/../backend/controller/PacienteController.php';
$lista = PacienteController::listarPacientes();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Pacientes</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"  media="all">
        <script src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>
        <script src="js/jquery.Rut.js"></script>
        <script type="text/javascript" src="js/listaPaciente.js"></script>
        <script type="text/javascript" src="js/buscador.js"></script>
    </head>
    <body>
        <div id="contenido">
            <div id="vista">
                <fieldset>
                    <legend><strong>PACIENTES</strong></legend>
                    Filtro<input type="text" class="buscador" placeholder="Ingrese paciente a buscar"><br><br>
                    <div class="tabla">
                        <table border="3px" class="tablaRegistros">
                            <thead>
                                <tr>
                                    <th>Rut</th>
                                    <th>Nombre Completo</th>
                                    <th>Fecha de Naci miento</th>
                                    <th>Sexo</th>
                                    <th>Dirección</th>
                                    <th>Telefono</th>
                                    <?php if($_SESSION['perfil'] === 'Administrador') { ?>
                                    <th>Eliminar</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($lista as $pac) {
                                    ?>
                                <script>var rut = "" + formatear(<?= $pac['id'] ?>);</script>
                                <?php ?>
                                <tr>
                                    <td><script>document.write(rut)</script></td>
                                    <td><?= $pac['nombre'] ?></td>
                                    <td><?= $pac['fechaNacimiento'] ?></td>
                                    <td><?= $pac['sexo'] ?></td>
                                    <td><?= $pac['direccion'] ?></td>
                                    <td><?= $pac['telefono'] ?></td>
                                
                                <?php
                                    if($_SESSION['perfil'] === 'Administrador') {
                                        ?>
                                    <td> <a href="" class="eliminar">[Eliminar]</a></td>
                                        <?php
                                    }
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div><br>
                </fieldset>
            </div>
            <div id="preFooter"></div>
        </div>
    </body>
</html>
