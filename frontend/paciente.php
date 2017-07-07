
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport", content="width=device-width; initial-scale=1.0;">
    <title>Paciente</title>
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
          <img alt="logo empresa" src="../dr.png"/>

        </div>
      </header>
        <div id="vista">
            <fieldset>
       <legend>MIS ATENCIONES</legend>
       Filtro<input type="text" name="buscador"><br><br>
        <div class="tabla">
       <table border="3px">

         <thead>
           <tr>
             <th>Numero Atencion</th>
             <th>Fecha y Hora </th>
             <th>Medico Tratante</th>
             <th>Estado Atencion</th>
           </tr>
         </thead>
         <tbody>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
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
