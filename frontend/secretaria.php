
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport", content="width=device-width; initial-scale=1.0;">
    <title>Secretaria</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css"  media="all">
    <script src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>
    <script src="javascript/redireccionar.js"></script>
  </head>
  <body>
    <div id="contenido">
   
      <header>
        <form action="Login.html" method="post">
        <div id="titulo">
          <h1>Hospital Comunal Tetengo</h1>
        </div>
        <div id="logo-empresa">
          <img alt="logo empresa" src="../dr.png"/>
          
        </div>
      </header>
        <div id="vista">
            <fieldset>
       <legend>Menu Principal Secretaria</legend>

       <div id="menuhor">
       <ul id="boton">
       <li><a href="<%= index_listaMedico_path %>">Medicos</a></li>
       <li><a href="<%= index_listaPaciente_path %>">Pacientes</a></li>
       <li><a href="<%= index_listadoAtencion_path %>">Atenciones</a></li>

      
       </ul> 
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