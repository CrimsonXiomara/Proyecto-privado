
	$(function(){
		console.log("jQuery Ver Formulario Candidato");


			//SECCIÓN DE BÚSQUEDA
			$('#search').keyup( function(e){

				let search = $('#search').val();
				$.ajax({
					url: 'searchC.php',
					type: 'POST',
					data: { search }, 
					success: function(response){
						//console.log(response);
						$('#contenido_tabla').html(response);
					} 
				});

			});



			$(document).on('click', '.detalle', function(e){

				var form = new FormData($('#form-detalle')[0]);
				
				$.ajax ({
					data: form,
					url: "Guardar_cambiosC.php",
					type: "POST",
					contentType: false,
					processData: false,
					success: function(response){

						switch(response){
							case '1':
								alert("TIENE QUE ADJUNTAR EL ARCHIVO PDF");
								break;

							case '2':
								alert("ERROR AL GUARDAR ARCHIVO");
								break;

							case '3':
								alert("ARCHIVO YA EXISTE");
								break;

							case '4':
								alert("ARCHIVO NO PERMITIDO O EXCEDE EL TAMAÑO");
								break;

							default:
								alert("SE HAN MODIFICADO LOS DATOS");
								location.href = "../Candidato/html_documentacionC.php";
								break;
						}//END SWITCH

					}

				});
				e.preventDefault();
			});



	});