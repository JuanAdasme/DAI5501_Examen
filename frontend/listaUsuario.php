<?php
include_once __DIR__ . '/../backend/controller/UsuarioController.php';
$users = UsuarioController::listarUsuarios();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Usuarios</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"  media="all">
        <script src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>
        <script src="js/buscador.js"></script>

    </head>
    <body>
        <div id="contenido">
            <div id="vista">
                <fieldset>
                    <legend><strong>USUARIOS</strong></legend>
                    Filtro<input type="text" class="buscador" placeholder="Ingrese usuario a buscar"><br><br>
                    <div class="tabla" >
                        <table border="3px" class="tablaRegistros">

                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Perfil</th>
                                    <th>Nombre</th>
                                    <th>Fecha Registro</th>
                                    <?php if ($_SESSION['perfil'] === 'Administrador') { ?>
                                        <th>Eliminar</th>
                                    <?php } ?>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($users as $user) {
                                    ?>
                                    <tr>
                                        <td><?= $user['id'] ?></td>
                                        <td><?= $user['perfil'] ?></td>
                                        <td><?= $user['nombre'] ?></td>
                                        <td><?= $user['fechaRegistro'] ?></td>
                                        <?php
                                        if ($_SESSION['perfil'] === 'Administrador') {
                                            ?>
                                            <td> <a href="" id="<?= $i ?>" class="eliminar">[Eliminar]</a></td>
                                            <?php
                                        }
                                        $i++;
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div><br>
                </fieldset>
            </div>
            <div id="preFooter"></div>
        </div>
    </body>
</html>
