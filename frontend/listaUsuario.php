
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport", content="width=device-width; initial-scale=1.0;">
    <title>Lista de Usuarios</title>
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
       <legend><strong>USUARIOS</strong></legend>
       Filtro<input type="text" id="buscador" placeholder="Ingrese usuario a buscar"><br><br>
        <div class="tabla">
       <table border="3px">

         <thead>
           <tr>
             <th>Id</th>
             <th>Clave</th>
             <th>Perfil</th>
             <th>Nombre</th>
             <th>Fecha Registro</th>
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
  <script>
  jQuery("#buscador").keyup(function(){
    if( jQuery(this).val() != ""){
        jQuery("#tablaPaciente tbody>tr").hide();
        jQuery("#tablaPaciente td:contiene-palabra('" + jQuery(this).val() + "')").parent("tr").show();
    }
    else{
        jQuery("#tablaPaciente tbody>tr").show();
    }
});

jQuery.extend(jQuery.expr[":"],
{
    "contiene-palabra": function(elem, i, match, array) {
        return (elem.textContent || elem.innerText || jQuery(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
});
</script>
</html>
