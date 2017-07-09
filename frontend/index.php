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
            
            <div id="contenidoIndex">
                <p>Presentación</p>
                <input type="button" name="btnLogin" value="Iniciar Sesión" onclick="window.location ='login.php'">
                
            </div>
            
            <?php include_once __DIR__.'/footer.php'; ?>
            
        </div>
    </body>
</html>
