<?php
/*session_start();

if(!isset($_SESSION['id'])) {
    header('location: index.php');
}

if($_SESSION['perfil'] === 'paciente') {
    alert('Usuario no autorizado');
    header('location: index.php');
}*/

include_once __DIR__.'/../backend/controller/AtencionController.php';
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
        <!--<script src="javascript/redireccionar.js"></script>-->
    </head>
    <body>
        <div id="contenido">

            <header>
                <form action="Login.html" method="post">
                    <div id="titulo">
                        <h1>Hospital Comunal Tetengo</h1>
                    </div>
                    <div id="logo-empresa">
                        <img alt="logo empresa" src="img/dr.png"/>

                    </div>
            </header>
            <div id="vista">
                <fieldset>
                    <legend>ATENCIONES</legend>
                    Filtro<input type="text" name="buscador"><br><br>
                    <div class="tabla">
                        <table border="3px">

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

                    <div id="tabla">
                        <a href=""> <input type="submit" name="entrar" value="Agregar" /></a>
                        <input type="button" name="salir" value="Eliminar" />
                    </div>

                </fieldset>       

            </div>
        </form>
        <footer>
            <p>Comuna de Tetengo</p>
        </footer>
    </div>
</body>
</html>