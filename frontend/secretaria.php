
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Secretaria</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"  media="all">
        <script type="text/javascript" src="js/jquery-3.2.1.min.js" ></script>
        <script type="text/javascript" src="js/jquery.Rut.js"></script>
        <script type="text/javascript" src="js/buscador.js"></script>
        <script type="text/javascript" src="js/secretaria.js"></script>
    </head>
    <body>
        <div id="contenido">

            <?php include_once __DIR__ . '/header.php' ?>


                <fieldset>
                    <legend>Menu Principal Secretaria</legend>


                    <ul class="mi-menu" style="width: 300px;">
                       <li><a href="">Medicos</a>
                           <ul>
                               <li><a id="listarMed" href="">Listar</a></li>
                           </ul>
                       </li>
                       <li><a href="">Pacientes</a>
                           <ul>
                               <li><a id="listarPac" href="">Listar</a></li>
                           </ul>
                       </li>
                       <li><a href="">Atenciones</a>
                           <ul>
                               <li><a id="listarAte" href="">Listar</a></li>
                              <li><a id="agregarAte" href="">Agregar</a></li>
                           </ul>
                           </li>
                   </ul>


                </fieldset>

            <br><br>

            <div id="listMedico" style="display: none">
                <?php include_once __DIR__.'/listaMedico.php' ?>
            </div>

            <div id="listPaciente" style="display: none">
                <?php include_once __DIR__.'/listaPaciente.php' ?>
            </div>

            <div id="listAtencion" style="display: none">
                <?php include_once __DIR__.'/listaAtencion.php' ?>
            </div>

            <div id="addAtencion" style="display: none">
                <?php include_once __DIR__.'/agregarAtencion.php' ?>
            </div>

            <?php include_once __DIR__ . '/footer.php'; ?>

        </div>
    </body>
</html>
