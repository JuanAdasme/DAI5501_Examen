
<!DOCTYPE html>
<html>
<<<<<<< HEAD
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport", content="width=device-width; initial-scale=1.0;">
    <title>Agregar Paciente</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css"  media="all">
    <script src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>
    <script src="javascript/redireccionar.js"></script>
  
  </head>
  <body>
    <div id="contenido">
=======
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agregar Paciente</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"  media="all">
        <script src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>
    </head>
    <body>
        <div id="contenido">
>>>>>>> 50836fa1085b96bf787bb222507ddd9ab596dc1e

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



                <form id="formAgendar" action="#" method="GET">

                    <fieldset>
                        <legend>Datos del Medico</legend>
                        <div id="tabla">
                            <div class="campoFormulario">
                                <label for="especialidadMedico">Especialidad Médico:</label>
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
                                <label for="nombreMedico">Nombre Médico:</label>
                                <select name="medicoTratante" required  style="height: 35px; width: 220px;">
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
                                <label for="fechaAtencion">Fecha de Contratacion:</label>
                                <input type="date" name="fechaAtencion" required  style="height: 10px; width: 200px;">
                            </div>
                        </div><br>


                        <div id="tabla">
                            <input type="submit" name="btnAgendar" value="Agendar" >
                            <input type="submit" name="btnReset" value="Reestablecer" >
                        </div>
                    </fieldset>

                </form>
            </div>
        </div>

        <!--<footer>
          <p>Comuna de Tetengo</p>
        </footer>-->
    </body>
</html>
