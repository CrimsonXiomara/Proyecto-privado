
function desblock_evento()
        {
            var aux = document.getElementByName("op_evento");
            aux.disabled= true;
        }


function prueba()
{
	alert ("Levihan es Cannon");
}




function verificacion_t()
{

	$(".micheckbox").on( 'change', function() {
    if( $(this).is(':checked') ) {
        // Hacer algo si el checkbox ha sido seleccionado
        var aux = document.getElementById("trans");
        aux.value = 1;
        alert(aux.value);
        //alert("El checkbox con valor " + $(this).val() + " ha sido seleccionado");
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        //alert("El checkbox con valor " + $(this).val() + " ha sido deseleccionado");
        var aux = document.getElementById("trans");
        aux.value = 0;
        alert(aux.value);
    }
});

	/*

	$('input[type="checkbox"]').each(   
    function() {

        alert("El checkbox con valor " + $(this).val() + " está seleccionado");
    }
);*/

}


function verificacion_a()
{

	$(".micheckbox1").on( 'change', function() {
    if( $(this).is(':checked') ) {
        // Hacer algo si el checkbox ha sido seleccionado
        var aux = document.getElementById("alim");
        aux.value = 1;
        //alert(aux.value);
        //alert("El checkbox con valor " + $(this).val() + " ha sido seleccionado");
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        //alert("El checkbox con valor " + $(this).val() + " ha sido deseleccionado");
        var aux = 0;
        //alert(aux);
    }
});

	/*

	$('input[type="checkbox"]').each(   
    function() {

        alert("El checkbox con valor " + $(this).val() + " está seleccionado");
    }
);*/

}


function verificacion_h()
{

	$(".micheckbox2").on( 'change', function() {
    if( $(this).is(':checked') ) {
        // Hacer algo si el checkbox ha sido seleccionado
        var aux = document.getElementById("hospe");
        aux.value = 1;
        //alert(aux.value);
        //alert("El checkbox con valor " + $(this).val() + " ha sido seleccionado");
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        //alert("El checkbox con valor " + $(this).val() + " ha sido deseleccionado");
        var aux = 0;
        //alert(aux);
    }
});

	/*

	$('input[type="checkbox"]').each(   
    function() {

        alert("El checkbox con valor " + $(this).val() + " está seleccionado");
    }
);*/

}