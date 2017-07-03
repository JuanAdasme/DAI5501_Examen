jQuery(document).ready(function() {
    ocultarCargando();
    
    jQuery.ajaxSetup({
        "error":function(respuesta, jqXHR, errorMsg) {
            ocultarCargando();
            alert("Error: "+errorMsg);
        }
    });
    
    
    //Validar RUT
    jQuery("input[name='rutPaciente']").Rut({format_on:'blur'});
    jQuery("input[name='rutPaciente']").blur(function() {
        mostrarCargando();
        if(!this.value !== "") {
            var rut = this.value;
            if(!jQuery.Rut.validar(rut)) {
                ocultarCargando();
                jQuery(this).addClass("error");
                alert("RUT inválido");
            }
            else {
                jQuery(this).removeClass("error");
            }
        }
        ocultarCargando();
    });
    
    jQuery("select[name='especialidad']").change(function() {
        mostrarCargando();
        if(jQuery(this).val() === '') {
            return;
        }
        limpiarMedico();
        
        var esp = jQuery("select[name='especialidad']").val();
        jQuery.getJSON("../backend/info-medico.php",
                        {especialidad:esp},
                        function(medicos) {
                            jQuery.each(medicos, function(i = 0, medico) {
                                var opt = "<option value='"+medico.rut+"' >"+medico.nombre+" "+
                                            medico.apellido_paterno+" "+medico.apellido_materno+"</option>";
                                jQuery("select[name='medicoTratante']").append(opt);
                                i++;
                            });
                        });
                        
        ocultarCargando();
    });
    
    function limpiarMedico() {
        jQuery("select[name='medicoTratante'] option").remove();
        jQuery("select[name='medicoTratante']").append('<option value="">Seleccione Médico</option>');
        jQuery("input[name='rutMedico']").empty();
        jQuery("input[name='valorConsulta']").empty();
    }
    
    function mostrarCargando() {
        jQuery("#cargando").css("visibility", "visible");
    }
    
    function ocultarCargando() {
        jQuery("#cargando").css("visibility", "hidden");
    }
});