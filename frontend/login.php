<?php
session_start();
if(isset($_SESSION['id'])) {
    header('location: index.php');
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Consultorio Municipal de Tetengo - Iniciar Sesión</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <script src="js/jquery-3.2.1.min.js" ></script>
        <script src="js/jquery.Rut.js"></script>
        
    </head>
    <body>
        <div id="contenedor">
            
            <?php include_once __DIR__.'/header.php'; ?>
            
            <div id="vista">
                
                <form id="formLogin" action="../backend/procesar-login.php" method="POST">
                    <fieldset>
                        <legend>Iniciar sesión</legend>
                        <div class="campoFormulario">
                            <label for="rut">RUT:</label>
                            <input type="text" name="rut" placeholder="Sin puntos ni dígito verificador" required >
                        </div>
                        <div class="campoFormulario">
                            <label for="clave">Clave:</label>
                            <input type="password" name="clave" placeholder="Clave" required >
                        </div>
                    </fieldset>
                    <div id="botonera">
                        <div class="btnFormulario">
                            <input type="submit" name="btnIniciarSesion" value="Iniciar sesión" >
                        </div>
                        <div class="btnFormulario">
                            <input type="reset" name="btnReset" >
                        </div>
                    </div>
                </form>
            </div>
            
            <?php include_once __DIR__.'/footer.php'; ?>
            
        </div>
    </body>
</html>