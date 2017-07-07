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