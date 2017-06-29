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
        if(!this.value !== "") {
            var rut = this.value;
            if(!jQuery.Rut.validar(rut)) {
                jQuery(this).addClass("error");
                alert("RUT inválido");
            }
            else {
                jQuery(this).removeClass("error");
            }
        }
    });
    
    
    
    
    function mostrarCargando() {
        jQuery("#cargando").css("visibility", "visible");
    }
    
    function ocultarCargando() {
        jQuery("#cargando").css("visibility", "hidden");
    }
});