
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport", content="width=device-width; initial-scale=1.0;">
        <title>Agregar Atencion</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"  media="all">
        <script src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>
    </head>
    <body>
        <div id="contenido">

            <header>
                <form action="" method="post">
                    <div id="titulo">
                        <h1>Hospital Comunal Tetengo</h1>
                    </div>
                    <div id="logo-empresa">
                        <img alt="logo empresa" src="../dr.png"  />

                    </div>
            </header>
            <div id="vista">


                <a href="">Volver</a>



                <form id="formAgendar" action="#" method="GET">

                    <fieldset>
                        <legend>Datos de la Atención</legend>
                        <div class="campoFormulario">
                            <label for="Especialidad">Especialidad:</label>
                            <select name="especialidad" style="height: 35px; width: 220px;">
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
                            <label for="medicoTratante">Medico Tratante:</label>
                            <select name="medicoTratante" required style="height: 35px; width: 220px;">
                                <option value="">Seleccione Médico</option>
                            </select>
                        </div>
                        <div class="campoFormulario">
                            <label for="pacienteNombre">Paciente Atendido:</label>
                            <input type="text" name="pacienteNombre" readonly >
                        </div>
                        <div class="campoFormulario">
                            <label for="estadoAtencion">Estado de la Atencion:</label>
                            <select name="especialidad" style="height: 35px; width: 220px;">
                                <optgroup id="optEspecialidad" label="-- Estado Atencion --">
                                    <option value="">Seleccione Estado Atencion</option>
                                    <option value="Agendado">Agendado</option>
                                    <option value="Anulada">Anulada</option>
                                    <option value="Perdida">Perdida</option>
                                    <option value="Realizada">Realizada</option>
                            </select>
                            <div class="campoFormulario">
                                <label for="fechaAtencion">Fecha de Atención:</label>
                                <input type="date" name="fechaAtencion" required  style="height: 10px; width: 200px;">
                            </div>

                            <div class="campoFormulario">
                                <label for="horaAtencion">Hora de Atención:</label>
                                <input type="time" name="horaAtencion" value="08:00" step="600" required  style="height: 10px; width: 200px; ">
                            </div><br>

                            <div id="tabla">

                                <input type="submit" name="btnAgendar" value="Agendar" >


                                <input type="submit" name="btnReset"  value="Reestablecer">

                            </div>

                    </fieldset>


                </form>
            </div>
        </div>
    </form>
    <footer>
        <p>Comuna de Tetengo</p>
    </footer>
</div>
</body>
</html>
