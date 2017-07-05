<?php
include_once __DIR__ . '/../backend/controller/MedicoController.php';
$listaMedicos = MedicoController::listarMedicos();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Medicos</title>
        <!--<link rel="stylesheet" type="text/css" href="css/boton.css"  media="all">-->
        <link rel="stylesheet" type="text/css" href="css/estilo.css"  media="all">
        <script src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>
        <script src="js/jquery.Rut.js"></script>
        <script type="text/javascript" src="js/listaMedico.js"></script>
        <script type="text/javascript" src="js/buscador.js"></script>
    </head>
    <body>
        <div id="contenido">

            <!--<header>

                <div id="titulo">
                    <h1>Hospital Comunal Tetengo</h1>
                </div>
                <div id="logo-empresa">
                    <img alt="logo empresa" src="img/dr.png"  />

                </div>
            </header>-->
            <div id="vista">
                <form action="" method="post">
                    <fieldset>
                        <legend><strong>MEDICOS</strong></legend>
                        Filtro<input type="text" class="buscador" placeholder="Ingrese medico a buscar"><br><br>
                        <div class="tabla">
                            <table border="3px" class="tablaRegistros">
                                <thead>
                                    <tr>
                                        <th>Rut</th>
                                        <th>Nombre Completo</th>
                                        <th>Fecha de Comtratacion</th>
                                        <th>Especialidad</th>
                                        <th>Valor Consulta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($listaMedicos as $fila) {
                                ?>
                                    <script>var rut = "" + formatear(<?= $fila['id'] ?>);</script>
                                        <?php ?>
                                    <tr>
                                        <td><script>document.write(rut)</script></td>
                                        <td><?= $fila['nombre'] ?></td>
                                        <td><?= $fila['fechaContrato'] ?></td>
                                        <td><?= $fila['especialidad'] ?></td>
                                        <td><?= $fila['valor'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div><br>

                        <div id="tabla">
                            <a href=""><input type="submit" name="entrar" value="Agregar" /></a>
                            <input type="button" name="salir" value="Eliminar" />
                        </div>

                    </fieldset>
                </form>
            </div>

            <!--<footer>
              <p>Comuna de Tetengo</p>
            </footer>-->
        </div>
    </body>
</html>
