<?php
include_once __DIR__ . '/../backend/controller/UsuarioController.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($_GET['rutUsuario']) && isset($_GET['claveUsuario']) && isset($_GET['confirmarClave']) &&
            isset($_GET['perfilUsuario']) && isset($_GET['nombreUsuario']) && isset($_GET['fechaRegistro'])) {
        
        if($_GET['claveUsuario'] != $_GET['confirmarClave']) {
            ?>
            <script type="text/javascript"> alert('Las claves no coinciden');</script>
            <?php
            return false;
        }

        $exito = UsuarioController::agregarUsuario($_GET['rutUsuario'], $_GET['claveUsuario'], $_GET['perfilUsuario'], $_GET['nombreUsuario'], $_GET['fechaRegistro']);
        if (!$exito) {
            ?><script type="text/javascript" >alert('No se pudo agregar el usuario'); console.log('No Funciona!')</script><?php
        } else {
            ?><script type="text/javascript" >alert("Se ha registrado el usuario");</script><?php
        }
    }
}
?>
            
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agregar Usuario</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"  media="all">
        <script src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>
    </head>
    <body>
        <div id="contenido">
            <div id="vista">
                
                <a href="">Volver</a>

                <form id="formAgendar" action="#" method="GET">

                    <fieldset>
                        <legend>Datos del Usuario</legend>
                        <div id="tabla">
                            <div class="campoFormulario">
                                <label for="rutUsuario">RUT:</label>
                                <input type="text" name="rutUsuario" required>
                            </div>
                            <div class="campoFormulario">
                                <label for="claveUsuario">Clave Usuario:</label>
                                <input type="password" name="claveUsuario" required >
                            </div>
                            <div class="campoFormulario">
                                <label for="confirmarClave">Clave Usuario:</label>
                                <input type="password" name="confirmarClave" required >
                            </div>
                            <div class="campoFormulario">
                                <label for="perfilUsuario">Perfil:</label>
                                <select name="perfilUsuario">
                                    <optgroup label="Perfil">
                                        <option value="Director">Director</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Secretario">Secretario</option>
                                        <option value="Paciente">Paciente</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="campoFormulario">
                                <label for="nombreUsuario">Nombre:</label>
                                <input type="text" name="nombreUsuario" required >
                            </div>
                            <div class="campoFormulario">
                                <label for="fechaRegistro">Fecha de Registro:</label>
                                <input type="date" name="fechaRegistro" value="<?= date('Y-m-d'); ?>" readonly >
                            </div>
                        </div><br>


                        <div id="botonera">
                            <input type="submit" name="btnRegistrar" value="Registrar" >
                            <input type="reset" name="btnReset" >
                        </div>
                    </fieldset>
                    
                </form>
            </div>
            <div id="preFooter"></div>
        </div>
    </body>
</html>
