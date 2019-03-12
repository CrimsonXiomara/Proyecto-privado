
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




			//GUARDAR CAMBIOS, EN DETALLES
			$('#guardar_r').submit( function(e){



				const postData={
					foto: 		document.getElementById("customCheck1").checked,
			  		partida:	document.getElementById("customCheck2").checked,
			  		constancia: document.getElementById("customCheck3").checked,
			  		penal: 		document.getElementById("customCheck4").checked,
			  		poli: 		document.getElementById("customCheck5").checked,
			  		ciudadano: 	document.getElementById("customCheck6").checked,
			  		tciudadano: document.getElementById("agregar_no").value,
			  		tramite: document.getElementById("id_formulario").value
				};

			
				//console.log(postData);
			$.post('Guardar_cambiosC.php', postData, function(response){

				alert(response);
				location.href = ".. /Candidatos/index_verFormulariosC.php";
				//console.log(response);
			});
			
			e.preventDefault();

			});




			/*function mensaje($msm){
				alert($msm);
			}*/



	});