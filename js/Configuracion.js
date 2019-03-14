
	$(function(){
		console.log("jQuery Configuración");
		LlenarTabla();

		

		$('#agregar_requisito').submit( function(e){


			const postData={
				requisito: $('#requisito').val()
			}

			$.post('Save_requisito.php', postData, function(response){

				//console.log(response);
				$('#alerta').html(response);
				LlenarTabla();
				//console.log(response);
			});

			e.preventDefault();

		});



		function LlenarTabla(){
			$.ajax({
			url: 'listar.php',
			type: 'GET',
			success: function (response){

				//console.log(response);

				$('#contenido_tabla').html(response);
			}
		});
		}





	});
	