<?php
include_once __DIR__ . '/../backend/controller/EstadisticaController.php';
$lista = EstadisticaController::listarEstadisticaPaciente();
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
             <th>Rango Etario</th>
             <th>Sexo</th>
             <th>Cantidad de Atenciones Recibidas</th>
           </tr>
         </thead>
         <tbody>
           <?php
           foreach ($lista as $epac) {
               ?>
            <tr>
           <td>test</td>
           <td><?= $epac['sexo'] ?></td>
           <td><?= $epac['atenciones'] ?></td>
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
