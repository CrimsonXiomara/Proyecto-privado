
	$(function(){
		console.log("jQuery esta Funcionando");


			//SECCIÓN DE BÚSQUEDA
			$('#search').keyup( function(e){

				let search = $('#search').val();
				$.ajax({
					url: 'searchE.php',
					type: 'POST',
					data: { search }, 
					success: function(response){
						//console.log(response);
						$('#contenido_tabla').html(response);
					} 
				});

			});





			//FILTROS
			$('#revisar').submit( function(e){


				const postData={
					revisar: $('#rev').val(),
					incompleto: $('#incom').val(),
					completo: $('#com').val()


				};


				if(postData.revisar == 1){
					document.getElementById("rev").disabled = true;
				  	document.getElementById("incom").disabled = false;
				  	document.getElementById("com").disabled = false;

				}

				if(postData.incompleto == 1){
					document.getElementById("rev").disabled = false;
				  	document.getElementById("incom").disabled = true;
				  	document.getElementById("com").disabled = false;
					
				}

				if(postData.completo == 1){
					document.getElementById("rev").disabled = false;
				  	document.getElementById("incom").disabled = false;
				  	document.getElementById("com").disabled = true;
					
				}

			
				//console.log("posible?");
			$.post('Cambios.php', postData, function(response){

				$('#contenido_tabla').html(response);
				//console.log(response);
			});
			
			e.preventDefault();

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
			$.post('Guardar_cambios.php', postData, function(response){

				alert(response);
				location.href = "../verFormularios/index_verFormularios.php";
				//console.log(response);
			});
			
			e.preventDefault();

			});




			/*function mensaje($msm){
				alert($msm);
			}*/



	});

















