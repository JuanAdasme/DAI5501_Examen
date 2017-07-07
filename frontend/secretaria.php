
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
       <legend>Menu Principal Secretaria</legend>

       <div id="menuhor">
       <ul id="mi-menu">
       <li><a href="">Medicos</a>
         <ul>
             <li><a id="listarMed" href="">Listar</a></li>
         </ul></li>
       <li><a href="">Pacientes</a>
         <ul>
             <li><a id="listarPac" href="">Listar</a></li>
         </ul>
       </li>
       <li><a href="">Atenciones</a>
         <ul>
             <li><a id="listarAt" href="">Listar</a>
               <ul>
                   <li><a id="listarPac" href="">Listar</a></li>
               </ul>
             </li>
         </ul></li>


       </ul>
</div>


     </fieldset>

      </div>
    </form><br><br>
      <footer>
        <p>Comuna de Tetengo</p>
      </footer>
    </div>
  </body>
</html>
