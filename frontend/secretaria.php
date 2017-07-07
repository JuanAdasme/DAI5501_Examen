
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Secretaria</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"  media="all">
        <script src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>
    </head>
    <body>
        <div id="contenido">

            <?php include_once __DIR__ . '/header.php' ?>

            <div id="vista">
                <fieldset>
                    <legend>Menu Principal Secretaria</legend>

                    <div id="menuhor">
                        <ul id="mi-menu">
                            <li><a href="">Medicos</a>
                                <ul>
                                    <li><a id="listarMed" href="">Listar</a></li>
                                </ul></li>
                            <li><a href="">Pacientes</a>
                                <ul>
                                    <li><a id="listarPac" href="">Listar</a></li>
                                </ul>
                            </li>
                            <li><a href="">Atenciones</a>
                                <ul>
                                    <li><a id="listarAt" href="">Listar</a>
                                        <ul>
                                            <li><a id="listarPac" href="">Listar</a></li>
                                        </ul>
                                    </li>
                                </ul></li>


                        </ul>
                    </div>

                </fieldset>
            </div>
            <br><br>

            <?php include_once __DIR__ . '/footer.php'; ?>

        </div>
    </body>
</html>
