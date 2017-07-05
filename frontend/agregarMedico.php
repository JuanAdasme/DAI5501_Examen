<?php


include_once __DIR__.'/../backend/controller/MedicoController.php';

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    if(isset($_GET['nombreMedico']) && isset($_GET['apellidoPMedico']) && isset($_GET['apellidoMMedico']) && 
            isset($_GET['rutMedico']) && isset($_GET['especialidad']) && isset($_GET['valorConsulta']) &&
            isset($_GET['fechaContratacion'])) {
        
        

        $exito = MedicoController::agregarMedico($_GET['rutMedico'], $_GET['nombreMedico'], $_GET['apellidoPMedico'],
                $_GET['apellidoMMedico'],$_GET['fechaContratacion'], $_GET['especialidad'], $_GET['valorConsulta']);
        if(!$exito) {
            ?><script type="text/javascript" >alert('No Funciona!'); console.log('No FUnciona!')</script><?php
        }
        else {
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
        <title>Agregar Medico</title>
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
                <img alt="logo empresa" src="dr.png"  />
      
              </div>
            </header>-->
            <div id="vista">

                <a href="">Volver</a>


                <form id="formRegistrarMedico" action="#" method="GET">

                    <fieldset>
                        <legend>Datos del Medico</legend>
                        <div id="tabla">
                            
                            <div class="campoFormulario">
                                <label for="nombreMedico">Nombre:</label>
                                <input type="text" name="nombreMedico" required >
                            </div>
                            <div class="campoFormulario">
                                <label for="apellidoPMedico">Apellido Paterno:</label>
                                <input type="text" name="apellidoPMedico" required >
                            </div>
                            <div class="campoFormulario">
                                <label for="apellidoMMedico">Apellido Materno:</label>
                                <input type="text" name="apellidoMMedico" >
                            </div>
                            <div class="campoFormulario">
                                <label for="rutMedico">RUT Médico:</label>
                                <input type="text" name="rutMedico" required >
                            </div>
                            <div class="campoFormulario">
                                <label for="especialidadMedico">Especialidad Médico:</label>
                                <select name="especialidad" style="height: 35px; width: 220px;">
                                    <optgroup id="optEspecialidad" label="-- Especialidad --" required >
                                        <option value="">Seleccione Especialidad</option>
                                        <option value="Medicina General">Medicina General</option>
                                        <option value="Fonoaudiologia">Fonoaudiología</option>
                                        <option value="Kinesiologia">Kinesiología</option>
                                        <option value="Traumatologia">Traumatología</option>
                                        <option value="Nutricionista">Nutricionista</option>
                                </select>
                            </div>
                            <div class="campoFormulario">
                                <label for="valorConsulta">Valor Consulta:</label>
                                <input type="text" name="valorConsulta" required >
                            </div>
                            <div class="campoFormulario">
                                <label for="fechaContratacion">Fecha de Contratacion:</label>
                                <input type="date" name="fechaContratacion" required  style="height: 10px; width: 200px;">
                            </div>
                        </div><br>
                    </fieldset>

                        <div id="botonera">
                            <input type="submit" name="btnRegistrarMedico" value="Agendar" >
                            <input type="reset" name="btnReset" >
                        </div>

                </form>
            </div>

            <!--<footer>
              <p>Comuna de Tetengo</p>
            </footer>-->
        </div>
    </body>
</html>
