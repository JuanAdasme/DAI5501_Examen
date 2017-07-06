<?php
include_once __DIR__ . '/../backend/controller/PacienteController.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($_GET['nombrePaciente']) && isset($_GET['apellidoPPaciente']) && isset($_GET['apellidoMPaciente']) &&
            isset($_GET['rutPaciente']) && isset($_GET['fechaNacimiento']) && isset($_GET['sexoPaciente']) &&
            isset($_GET['direccionPaciente']) && isset($_GET['telefonoPaciente'])) {

        $opt = $_GET['telefonoOpcional'];
        if($_GET['telefonoOpcional'] == '') {
            $opt = NULL;
        }

        $exito = PacienteController::agregarPaciente($_GET['rutPaciente'],$_GET['nombrePaciente'], $_GET['apellidoPPaciente'], $_GET['apellidoMPaciente'], $_GET['fechaNacimiento'], $_GET['sexoPaciente'], $_GET['direccionPaciente'], $_GET['telefonoPaciente'], $opt);
        if (!$exito) {
            ?><script type="text/javascript" >alert('No Funciona!'); console.log('No Funciona!')</script><?php
        } else {
            ?><script type="text/javascript" >alert("It's working! It's working!!");</script><?php
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agregar Paciente</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"  media="all">
        <script src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>

    </head>
    <body>
        <div id="contenido">
            <head>
                <meta charset="UTF-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Agregar Paciente</title>
                <link rel="stylesheet" type="text/css" href="css/estilo.css"  media="all">
                <script src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>
            </head>
            <body>
                <div id="contenido">

                    <!--<header>
                      <div id="titulo">
                        <h1>Hospital Comunal Tetengo</h1>
                      </div>
                      <div id="logo-empresa">
                        <img alt="logo empresa" src="../dr.png"/>
              
                      </div>
                    </header>-->
                    <div id="vista">


                        <a href="">Volver</a>



                        <form id="formAgendarPaciente" action="#" method="GET">

                            <fieldset>
                                <legend>Datos del Paciente</legend>
                                <div class="tabla">

                                    <div class="campoFormulario">
                                        <label for="nombrePaciente">Nombre:</label>
                                        <input type="text" name="nombrePaciente" required >
                                    </div>
                                    <div class="campoFormulario">
                                        <label for="apellidoPPaciente">Apellido Paterno:</label>
                                        <input type="text" name="apellidoPPaciente" required >
                                    </div>
                                    <div class="campoFormulario">
                                        <label for="apellidoMPaciente">Apellido Materno:</label>
                                        <input type="text" name="apellidoMPaciente" >
                                    </div>
                                    <div class="campoFormulario">
                                        <label for="rutPaciente">RUT Paciente:</label>
                                        <input type="text" name="rutPaciente" required >
                                    </div>
                                    <div class="campoFormulario">
                                        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                                        <input type="date" name="fechaNacimiento" required  style="height: 10px; width: 200px;">
                                    </div>
                                    <div class="campoFormulario">
                                        <label for="sexoPaciente">Género:</label>
                                        <input type="text" name="sexoPaciente" required >
                                    </div>
                                    <div class="campoFormulario">
                                        <label for="direccionPaciente">Dirección:</label>
                                        <input type="text" name="direccionPaciente" required >
                                    </div>
                                    <div class="campoFormulario">
                                        <label for="telefonoPaciente">Teléfono:</label>
                                        <input type="text" name="telefonoPaciente" required >
                                    </div>
                                    <div class="campoFormulario">
                                        <label for="telefonoOpcional">Teléfono opcional:</label>
                                        <input type="text" name="telefonoOpcional" >
                                    </div>
                                </div><br>
                            </fieldset>


                            <div id="botonera">
                                <input type="submit" name="btnAgendar" value="Agendar" >
                                <input type="reset" name="btnReset" >
                            </div>

                        </form>
                    </div>
                </div>

                <!--<footer>
                  <p>Comuna de Tetengo</p>
                </footer>-->
            </body>
</html>
