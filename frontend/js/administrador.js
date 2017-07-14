jQuery(document).ready(function() {
    
    var idDelMedico = -1;
    var idDelPaciente = -1;
    var idDelUsuario = -1;
    
    $(".eliminarMedico").click(function(e) {
        e.preventDefault();
        idDelMedico = this.id;
    });
    
    $(".eliminarPaciente").click(function(e) {
        e.preventDefault();
        idDelPaciente = this.id;
    });
    
    $(".eliminarUsuario").click(function(e) {
        e.preventDefault();
        idDelUsuario = this.id;
    });
    
    $("input[name='btnEliminar'").click(function(e) {
        
        $.getJSON("../backend/procesar-eliminar.php",
        {'id': idDelMedico,'perfil': 'medico'},
        function(exito) {
            
        });
        $(".modal").fadeOut(300);
     });
    
    $("#btnEliminar").click(function(e) {
        return true;
    });
    
    $("#btnCancelar").click(function(e) {
        idDelMedico = -1;
        idDelPaciente = -1;
        idDelUsuario = -1;
        return false;
    });
    
     $(".cerrar").click(function() {
         jQuery(".modal").fadeOut(300);
     });
     
     $("input[name='btnCancelar'").click(function() {
         jQuery(".modal").fadeOut(300);
     });
     
    function modal() {
        jQuery(".modal").fadeIn();
    }
    
    $(".eliminarMedico").click(function(event) {
        event.preventDefault();
        modal();
    });
    
    jQuery('#listarMed').click(function(event) {
        limpiar();
        event.preventDefault();
        jQuery('#listMedico').css('display','block');
    });
    
    jQuery('#agregarMed').click(function(event) {
        limpiar();
        event.preventDefault();
        jQuery('#addMedico').css('display','block');
    });
    
    jQuery('#agregarPac').click(function(event) {
        limpiar();
        event.preventDefault();
        jQuery('#addPaciente').css('display','block');
    });
    
    jQuery('#listarPac').click(function(event) {
        limpiar();
        event.preventDefault();
        jQuery('#listPaciente').css('display','block');
    });
    
    jQuery('#agregarUsu').click(function(event) {
        limpiar();
        event.preventDefault();
        jQuery('#addUsuario').css('display','block');
    });
    
    jQuery('#listarUsu').click(function(event) {
        limpiar();
        event.preventDefault();
        jQuery('#listUsuario').css('display','block');
    });
    
    jQuery('#medico').click(function(event) {
        limpiar();
        event.preventDefault();
    });
    
    jQuery('#paciente').click(function(event) {
        limpiar();
        event.preventDefault();
    });
    
    jQuery('#usuario').click(function(event) {
        limpiar();
        event.preventDefault();
    });
    
    function limpiar() {
        jQuery('#listMedico, #addMedico, #delMedico').css('display','none');
        jQuery('#listPaciente, #addPaciente, #delPaciente').css('display','none');
        jQuery('#listUsuario, #addUsuario, #delUsuario').css('display','none');
    }
});