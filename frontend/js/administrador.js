jQuery(document).ready(function() {
    
    
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
    
    jQuery('#eliminarMed').click(function(event) {
        limpiar();
        event.preventDefault();
        jQuery('#delMedico').css('display','block');
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
    
    jQuery('#eliminarPac').click(function(event) {
        limpiar();
        event.preventDefault();
        jQuery('#delPaciente').css('display','block');
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
    
    jQuery('#eliminarUsu').click(function(event) {
        limpiar();
        event.preventDefault();
        jQuery('#delUsuario').css('display','block');
    });
    
    function limpiar() {
        jQuery('#listMedico, #addMedico, #delMedico').css('display','none');
        jQuery('#listPaciente, #addPaciente, #delPaciente').css('display','none');
        jQuery('#listUsuario, #addUsuario, #delUsuario').css('display','none');
    }
});