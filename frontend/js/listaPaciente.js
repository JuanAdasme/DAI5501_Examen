jQuery(document).ready(function() {
    
});

function formatear(rut) {
    rut += "";
    var dv = jQuery.Rut.getDigito(rut);
    rut += dv;
    var rutFormato = jQuery.Rut.formatear(rut,dv);
    return rutFormato;
}
