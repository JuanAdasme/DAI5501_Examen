<?php
include_once __DIR__ . '/../backend/controller/EstadisticaController.php';
$lista = EstadisticaController::listarEstadisticaAtencion();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport", content="width=device-width; initial-scale=1.0;">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/boton.css"  media="all">
    <link rel="stylesheet" type="text/css" href="css/estilo.css"  media="all">
    <script src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>
    <script src="javascript/redireccionar.js"></script>
  </head>
  <body>
    <div id="contenido">

      <header>
        <form action="" method="post">
        <div id="titulo">
          <h1>Hospital Comunal Tetengo</h1>
        </div>
        <div id="logo-empresa">
    <img alt="logo empresa" src="dr.png"  />

        </div>
      </header>
        <div id="vista">
            <fieldset>
       <legend>Estadisticas Atenciones</legend>
       Filtro<input type="text" name="buscador"><br><br>
        <div class="tabla">
       <table border="3px">

         <thead>
           <tr>

             <th>Meses</th>
             <th>Especialidad</th>
             <th>Medico</th>
             <th>Estado Atencion</th>

           </tr>
         </thead>
         <tbody>
           <tr>
             <?php
             foreach ($lista as $eaten) {
                 ?>
             <td><?= $eaten['mes'] ?></td>
             <td><?= $eaten['estado'] ?></td>
             <td><?= $eaten['especialidad'] ?></td>
             <td><?= $eaten['medicoNombre'] ?></td>
           </tr>
           <?php
         }
         ?>
         </tbody>
       </table>
       </div><br>



     </fieldset>

      </div>
    </form>
      <footer>
        <p>Comuna de Tetengo</p>
      </footer>
    </div>
  </body>
</html>
