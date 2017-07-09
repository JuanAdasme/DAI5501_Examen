jQuery(document).ready(function() {
    
    jQuery('#listarMed').click(function(event) {
       limpiar();
       event.preventDefault();
       jQuery('#listMedico').css('display','block');
    });
    
    jQuery('#listarPac').click(function(event) {
       limpiar();
       event.preventDefault();
       jQuery('#listPaciente').css('display','block');
    });
    
    jQuery('#listarAte').click(function(event) {
       limpiar();
       event.preventDefault();
       jQuery('#listAtencion').css('display','block');
    });
    
    jQuery('#atencionEst').click(function(event) {
       limpiar();
       event.preventDefault();
       jQuery('#ateEstadistica').css('display','block');
    });
    
    jQuery('#pacienteEst').click(function(event) {
       limpiar();
       event.preventDefault();
       jQuery('#pacEstadistica').css('display','block');
    });
    
    function limpiar() {
        jQuery('#listMedico,#listPaciente,#listAtencion,#ateEstadistica,#pacEstadistica').css('display','none');
    }
});