<?php
//session_start();
/*
if(!isset($_SESSION['usuario'])) {
    header("location: index.php");
}
 */
include_once __DIR__.'/../backend/controller/AtencionController.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario Atención Médica</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/jquery-3.2.1.min.js" ></script>
        <script src="js/jquery.Rut.js"></script>
        <script src="js/formularioAtencion.js"></script>
    </head>
    
    <body>
        <div id="contenedor">
            <?php
            include_once __DIR__.'/header.php';
            ?>
            
            <div id="cargando">
                <img src="img/cargando.gif">
            </div>
            
            <div id="contenido">
                <div id="migas">
                    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li>Formulario de atención</li>
                    </ul>
                </div>
                
                <form id="formAgendar" action="#" method="GET">
                    <fieldset>
                        
                        <legend>Datos del Paciente</legend>
                        <div class="campoFormulario">
                            <label for="rutPaciente">RUT:</label>
                            <input type="text" name="rutPaciente" placeholder="RUT" required autofocus >
                        </div>
                        <div class="campoFormulario">
                            <label for="nombrePaciente">Nombre:</label>
                            <input type="text" name="nombrePaciente" placeholder="Nombre" required >
                        </div>
                        <div class="campoFormulario">
                            <label for="apellidoPaternoPaciente">Apellido Paterno:</label>
                            <input type="text" name="apellidoPaternoPaciente" placeholder="Apellido Paterno" required >
                        </div>
                        <div class="campoFormulario">
                            <label for="apellidoMaternoPaciente">Apellido Materno:</label>
                            <input type="text" name="apellidoMaternoPaciente" placeholder="Apellido Materno" required >
                        </div>
                        <div class="campoFormulario">
                            <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                            <input type="date" name="fechaNacimiento" required >
                        </div>
                        <div class="campoFormulario">
                            <label for="genero">Género:</label>
                            <select name="genero">
                                <option value="">-- Género --</option>
                                <option value="femenino">Femenino</option>
                                <option value="masculino">Masculino</option>
                            </select>
                        </div>
                        <div class="campoFormulario">
                            <label for="direccion">Dirección:</label>
                            <input type="text" name="direccion" placeholder="Dirección" required >
                        </div>
                        <div class="campoFormulario">
                            <label for="telefonoUno">Teléfono de contacto:</label>
                            <input type="text" name="telefonoUno" placeholder="Teléfono" required >
                        </div>
                        <div class="campoFormulario">
                            <label for="telefonoDos">Teléfono opcional:</label>
                            <input type="text" name="telefonoDos" placeholder="Teléfono" >
                        </div>
                    </fieldset>
                    
                    <fieldset>
                        <legend>Datos de la Atención</legend>
                        <div class="campoFormulario">
                            <select name="especialidad">
                                <optgroup id="optEspecialidad" label="-- Especialidad --">
                                    <option value="">Seleccione Especialidad</option>
                                    <option value="Medicina General">Medicina General</option>
                                    <option value="Fonoaudiologia">Fonoaudiología</option>
                                    <option value="Kinesiologia">Kinesiología</option>
                                    <option value="Traumatologia">Traumatología</option>
                                    <option value="Nutricionista">Nutricionista</option>
                            </select>
                        </div>
                        <div class="campoFormulario">
                            <select name="medicoTratante" required >
                                <option value="">Seleccione Médico</option>
                            </select>
                        </div>
                        <div class="campoFormulario">
                            <label for="rutMedico">RUT Médico:</label>
                            <input type="text" name="rutMedico" readonly >
                        </div>
                        <div class="campoFormulario">
                            <label for="valorConsulta">Valor Consulta:</label>
                            <input type="text" name="valorConsuta" readonly >
                        </div>
                        <div class="campoFormulario">
                            <label for="fechaAtencion">Fecha de Atención:</label>
                            <input type="date" name="fechaAtencion" required >
                        </div>
                        <div class="campoFormulario">
                            <label for="horaAtencion">Hora de Atención:</label>
                            <input type="time" name="horaAtencion" value="08:00" step="600" required >
                        </div>

                    </fieldset>
                    
                    <div id="botonera">
                        <div class="btnFormulario">
                            <input type="submit" name="btnAgendar" value="Agendar" >
                        </div>
                        <div class="btnFormulario">
                            <input type="reset" name="btnReset" >
                        </div>
                    </div>
                </form>
            </div>
            
            <?php
            include_once __DIR__.'/footer.php';
            ?>
        </div>
    </body>
</html>