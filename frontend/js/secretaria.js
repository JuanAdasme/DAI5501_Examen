jQuery(document).ready(function () {

    jQuery("select[name='especialidad']").change(function () {
        var esp = jQuery("select[name='especialidad']").val();
        $.getJSON("../backend/info-medico.php",
                {'especialidad': esp},
                function (medicos) {
                    var rut;
                    var nom;
                    
                    jQuery.each(medicos, function(i,med) {
                        rut = med['rut'];
                        nom = med['nombre'] + ' ' + med['apellido_paterno'] + ' ' + med['apellido_materno'];
                        var opt = "<option value='" + rut + "'>" + nom + "</option>";
                        jQuery("select[name='medicoTratante']").append(opt);
                    }
                    );
                        
                });
    });
    
    function limpiarMedico() {
        jQuery("select[name='medicoTratante'] option").remove();
    }

    jQuery('#listarMed').click(function (event) {
        limpiar();
        event.preventDefault();
        jQuery('#listMedico').css('display', 'block');
    });

    jQuery('#listarPac').click(function (event) {
        limpiar();
        event.preventDefault();
        jQuery('#listPaciente').css('display', 'block');
    });

    jQuery('#listarAte').click(function (event) {
        limpiar();
        event.preventDefault();
        jQuery('#listAtencion').css('display', 'block');
    });

    jQuery('#agregarAte').click(function (event) {
        limpiar();
        event.preventDefault();
        jQuery('#addAtencion').css('display', 'block');
    });

    function limpiar() {
        jQuery('#listMedico,#listPaciente,#listAtencion,#addAtencion').css('display', 'none');
    }
});