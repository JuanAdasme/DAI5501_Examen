
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Director</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"  media="all">
        <script src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>
        <script type="text/javascript" src="js/buscador.js"></script>
        <script type="text/javascript" src="js/director.js"></script>
    </head>
    <body>
        <div id="contenido">

            <?php include_once __DIR__ . '/header.php' ?>

            <div id="vista">
                <fieldset style="border:6px groove #ccc; width: 250px; height: 60px;">
                    <legend>Menu Principal Director</legend>

                    <ul class="mi-menu">
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
                        <li><a href="">Atencion</a>
                            <ul>
                                <li><a id="listarAte" href="">Listar</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Estadisticas</a>
                            <ul>
                                <li><a href="">Consultar Atencion</a>
                                    <ul>
                                        <li><a href="">Consultar Paciente</a>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </fieldset>
            </div>
            <br><br>
            <div id="listMedico" style="display:none">
                <?php include_once __DIR__ . '/listaMedico.php'; ?>
            </div>

            <div id="listPaciente" style="display:none">
                <?php include_once __DIR__ . '/listaPaciente.php'; ?>
            </div>

            <div id="listAtencion" style="display:none">
                <?php include_once __DIR__ . '/listaAtencion.php'; ?>
            </div>

            <?php include_once __DIR__ . '/footer.php'; ?>
        </div>
    </body>
</html>
