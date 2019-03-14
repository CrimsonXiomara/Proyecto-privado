
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




		$(document).on('click', '.delete-b', function(){

			if(confirm('Estas seguro de querer eliminarlo?'))
			{	

					let element = $(this)[0].parentElement.parentElement;
					let id = $(element).attr('taskId');
					$.post('delete.php',{id}, function(response){
							$('#alert1').html(response);
							LlenarTabla();
					});
					

			}

			
		});




	});
	