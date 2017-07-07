jQuery(document).ready(function() {

    jQuery.ajaxSetup({
        "error":function(respuesta, jqXHR, errorMsg) {
            alert("Error: "+errorMsg);
        }
    });
    
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
                var rut = jQuery('input[name="rutPaciente"]').val();
                var rutSF = jQuery.Rut.quitarFormato(rut);
                rutSF = rutSF.slice(0,rutSF.length - 1);
                jQuery.getJSON('../backend/info-paciente.php',
                            {id:rutSF},
                            function(paciente) {
                    if(paciente['id'] === null) {
                       return; 
                    }
                    else {
                        jQuery("input[name='nombrePaciente'").val(paciente['nombre']);
                        jQuery("input[name='apellidoPPaciente'").val(paciente['apellido_paterno']);
                        jQuery("input[name='apellidoMPaciente'").val(paciente['apellido_materno']);
                        jQuery("input[name='fechaNacimiento'").val(paciente['fecha_nacimiento']);
                        jQuery("input[name='sexoPaciente'").val(paciente['sexo']);
                        jQuery("input[name='direccionPaciente'").val(paciente['direccion']);
                        jQuery("input[name='telefonoPaciente'").val(paciente['telefono']);
                        jQuery("input[name='telefonoOpcional'").val(paciente['telOpcional']);
                        jQuery("#datosPaciente input").prop("readonly",true);
                        jQuery("select[name='sexoPaciente'").prop("disabled",true);
                    }
                });
            }
        }
    });
});