
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport", content="width=device-width; initial-scale=1.0;">
    <title>Director</title>
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
            <fieldset style="border:6px groove #ccc; width: 250px; height: 60px;">
       <legend>Menu Principal Director</legend>

       <ul class="mi-menu">
        <li><a href="">Medicos</a>
          <ul>
              <li><a id="listarMed" href="">Listar</a></li>
          </ul>
        </li>
        <li><a href="">Pacientes</a>
          <ul>
              <li><a id="listarPac" href="">Listar</a></li>
          </ul>
        </li>
        <li><a href="">Atencion</a>
          <ul>
            <li><a id="listarAte" href="">Listar</a></li>
          </ul>
        </li>
        <li><a href="#">Estadisticas</a>
             <ul>
               <li><a href=""></a>Consultar</li>
             </ul>
        </li>
       </ul>
     </fieldset>
</div>
    </form>
    <div id="listMedico" style="display:none">
        <?php include_once __DIR__.'/listaMedico.php'; ?>
    </div>

    <div id="listPaciente" style="display:none">
        <?php include_once __DIR__.'/listaPaciente.php'; ?>
    </div>

    <div id="listAtencion" style="display:none">
        <?php include_once __DIR__.'/listaAtencion.php'; ?>
    </div>

      <footer>
        <p>Comuna de Tetengo</p>
      </footer>
    </div>
  </body>
</html>
