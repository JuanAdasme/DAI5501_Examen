
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport", content="width=device-width; initial-scale=1.0;">
    <title>Lista de Pacientes</title>
    <link rel="stylesheet" type="text/css" href="css/boton.css"  media="all">
    <link rel="stylesheet" type="text/css" href="css/estilo.css"  media="all">
    <script src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>
    <script src="javascript/redireccionar.js"></script>
  </head>
  <body>
    <div id="contenido">
   
      <header>
        <form action="#" method="get">
        <div id="titulo">
          <h1>Hospital Comunal Tetengo</h1>
        </div>
        <div id="logo-empresa">
          <img alt="logo empresa" src="../dr.png"/>
          
        </div>
      </header>
        <div id="vista">
            <fieldset>
       <legend><strong>PACIENTES</strong></legend>
       Filtro<input type="text" name="buscador"><br><br>
       <div class="tabla">
         <table border="3px">     
         <thead>
           <tr>
             <th>Rut</th>
             <th>Nombre Completo</th>
             <th>Fecha de Nacimiento</th>
             <th>Sexo</th>
             <th>Dirección</th>
             <th>Telefono</th>
           </tr>
         </thead>
         <tbody>
           <th></th>
           <th></th>
           <th></th>
           <th></th> 
           <th></th>
         </tbody>

          </div>      
       </table>
    </div><br>

     <div id="tabla">
          <a href=""><input type="submit" name="entrar" value="Agregar" /></a>
          <input type="button" name="salir" value="Eliminar" />
          </div>

     </fieldset>       
      
      </div>
    </form>
      <footer>
        <p>Comuna de Tetengo</p>
      </footer>
    </div>
  </body>
</html>
