<?php
/*
session_start();

if(!isset($_SESSION['perfil'])) {
    header('location: index.php');
}
if(!$_SESSION['perfil'] === 'Administrador') {

}
*/
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administrador</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"  media="all">
        <script src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>
        <script src="js/administrador.js"></script>
        <script src="js/buscador.js"></script>
    </head>
    <body>
        <div id="contenido">

            <header>
                <div id="titulo">
                    <h1>Hospital Comunal Tetengo</h1>
                </div>
                <div id="logo-empresa">
                    <img alt="logo empresa" src="img/dr.png"  />

                </div>
            </header>
            <form action="" method="post">
                <div id="login">
                    <fieldset style="border:6px groove #ccc; width: 250px; height: 60px;">
                        <legend>Menu Principal Administrador</legend>

                        <ul class="mi-menu">

                                <li><a id="medico" href="">Medicos</a>
                                <ul>
                                    <li><a id="listarMed" href="">Listar</a>
                                        <ul>
                                          <li><a id="agregarMed" href="">Agregar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                </li>
                                <li><a id="paciente" href="">Pacientes</a>
                                <ul>
                                    <li><a id="listarPac" href="">Listar</a>
                                    <ul>
                                      <li><a id="agregarPac" href="">Agregar</a></li>
                                    </ul>
                                  </li>

                                </ul>
                                </li>
                                <li><a id="usuario" href="">Usuario</a>
                                <ul>
                                    <li><a id="listarUsu" href="">Listar</a>
                                    <ul>
                                      <li><a id="agregarUsu" href="">Agregar</a></li>
                                    </ul></li>

                                </ul>
                                </li>

                        </ul>
                    </fieldset>
                </div>
            </form><br><br>
            <div id="addMedico" style="display:none" >
                <?php include_once __DIR__.'/agregarMedico.php'; ?>
            </div>

            <div id="listMedico" style="display:none">
                <?php include_once __DIR__.'/listaMedico.php'; ?>
            </div>

            <div id="listPaciente" style="display:none">
                <?php include_once __DIR__.'/listaPaciente.php'; ?>
            </div>

            <div id="addPaciente" style="display:none" >
                <?php include_once __DIR__.'/agregarPaciente.php'; ?>
            </div>

            <div id="addUsuario" style="display:none" >
                <?php include_once __DIR__.'/agregarUsuario.php'; ?>
            </div>

            <div id="listUsuario" style="display:none" >
                <?php include_once __DIR__.'/listaUsuario.php'; ?>
            </div>


            <div id="preFooter"></div>
            <footer>
                <p>Comuna de Tetengo</p>
            </footer>
        </div>
    </body>
</html>
