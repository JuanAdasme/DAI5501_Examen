<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Consultorio Municipal de Tetengo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <script src="js/jquery-3.2.1.min.js" ></script>
        <script src="js/jquery.Rut.js"></script>

    </head>
    <body>
        <div id="contenedor">

            <?php include_once __DIR__.'/header.php'; ?>
            <fieldset style="width: 450px;">
             <div id="contenidoIndex" style="align-content: center;">
               <p>Inicie Sesion</p>
               <input type="button" name="btnLogin" value="Iniciar Sesión" onclick="window.location ='login.php'" style="width: 300px; height: 30px; background: #314755;
                                                                                                       background: -webkit-linear-gradient(to right, #26a0da, #314755);
                                                                                                      background: linear-gradient(to right, #26a0da, #314755);">

               </div>
             </fieldset>

            <?php include_once __DIR__.'/footer.php'; ?>

        </div>
    </body>
</html>
