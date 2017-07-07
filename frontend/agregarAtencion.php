
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agregar Atencion</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"  media="all">
        <script type="text/javascript" src="js/jquery-3.2.1.min.js" ></script>
        <script type="text/javascript" src="js/jquery.Rut.js" ></script>
        <script type="text/javascript" src="js/agregarPaciente.js" ></script>  
    </head>
    <body>
        <div id="contenido">

            <div id="vista">

                <a href="">Volver</a>
                <form action="#" method="post">

                    <fieldset id ='datosPaciente'>
                        <legend>Datos del Paciente</legend>
                        <div class="campoFormulario">
                            <label for="rutPaciente">RUT:</label>
                            <input type="text" name="rutPaciente" required autofocus="">
                        </div>
                        <div class="campoFormulario">
                            <label for="nombrePaciente">Nombre:</label>
                            <input type="text" name="nombrePaciente" required>
                        </div>
                        <div class="campoFormulario">
                            <label for="apellidoPPaciente">Apellido Paterno:</label>
                            <input type="text" name="apellidoPPaciente" required>
                        </div>
                        <div class="campoFormulario">
                            <label for="apellidoMPaciente">Apellido Materno:</label>
                            <input type="text" name="apellidoMPaciente" required>
                        </div>
                        <div class="campoFormulario">
                            <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                            <input type="date" name="fechaNacimiento" required  style="height: 10px; width: 200px;">
                        </div>
                        <div class="campoFormulario">
                            <label for="sexoPaciente">Género:</label>
                            <select name="sexoPaciente" style="height: 35px; width: 220px;">
                                <optgroup id="optGenero" label="-- Género --" required >
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                            </select>
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
                    </fieldset>

                    <fieldset>
                        <legend>Datos de la Atención</legend>
                        <div class="campoFormulario">
                            <label for="Especialidad">Especialidad:</label>
                            <select name="especialidad" style="height: 35px; width: 220px;">
                                <optgroup id="optEspecialidad" label="-- Especialidad --">
                                    <option value="Medicina General">Medicina General</option>
                                    <option value="Fonoaudiologia">Fonoaudiología</option>
                                    <option value="Kinesiologia">Kinesiología</option>
                                    <option value="Traumatologia">Traumatología</option>
                                    <option value="Nutricionista">Nutricionista</option>
                            </select>
                        </div>
                        <div class="campoFormulario">
                            <label for="medicoTratante">Medico Tratante:</label>
                            <select name="medicoTratante" required style="height: 35px; width: 220px;">
                            </select>
                        </div>
                        <div class="campoFormulario">
                            <label for="estadoAtencion">Estado de la Atencion:</label>
                            <select name="especialidad" style="height: 35px; width: 220px;">
                                <optgroup id="optEspecialidad" label="-- Estado Atencion --">
                                    <option value="Agendado">Agendado</option>
                                    <option value="Anulada">Anulada</option>
                                    <option value="Perdida">Perdida</option>
                                    <option value="Realizada">Realizada</option>
                            </select>
                        </div>
                        <div class="campoFormulario">
                            <label for="fechaAtencion">Fecha de Atención:</label>
                            <input type="date" name="fechaAtencion" required  style="height: 10px; width: 200px;">
                        </div>

                        <div class="campoFormulario">
                            <label for="horaAtencion">Hora de Atención:</label>
                            <input type="time" name="horaAtencion" value="08:00" step="600" required  style="height: 10px; width: 200px; ">
                        </div>
                    </fieldset>

                    <div id="botonera">
                        <input type="submit" name="btnAgendar" value="Agendar" >
                        <input type="reset" name="btnReset" >
                    </div><br>

                </form>
            </div>
        </div>
        <div id="preFooter"></div>
    </body>
</html>
