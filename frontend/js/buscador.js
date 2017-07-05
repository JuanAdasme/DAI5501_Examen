jQuery(document).ready(function() {
    jQuery("#buscador").keyup(function () {
            if (jQuery(this).val() != "") {
                jQuery("#tablaPaciente tbody>tr").hide();
                jQuery("#tablaPaciente td:contiene-palabra('" + jQuery(this).val() + "')").parent("tr").show();
            } else {
                jQuery("#tablaPaciente tbody>tr").show();
            }
        });
        
    jQuery.extend(jQuery.expr[":"],
                {
                    "contiene-palabra": function (elem, i, match, array) {
                        return (elem.textContent || elem.innerText || jQuery(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                    }
                });
});