jQuery(document).ready(function() {
    jQuery(".buscador").keyup(function () {
            if (jQuery(this).val() != "") {
                jQuery(".tablaRegistros tbody>tr").hide();
                jQuery(".tablaRegistros td:contiene-palabra('" + jQuery(this).val() + "')").parent("tr").show();
            } else {
                jQuery(".tablaRegistros tbody>tr").show();
            }
        });
        
    jQuery.extend(jQuery.expr[":"],
                {
                    "contiene-palabra": function (elem, i, match, array) {
                        return (elem.textContent || elem.innerText || jQuery(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                    }
                });
});