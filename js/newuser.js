	$(function(){
		console.log("jQuery is Working");

		$('#form-nuevo').submit( function(e){

			const postData = {
				user: 		$('#nom_user').val(),
				psw:  		$('#password').val(),
				partido: 	$('#nom_partido').val()

			};



			$.post('insertar_user.php', postData, function(response){
				$('#alertas').html(response);
			});


			e.preventDefault();
		});



				function Limpiar_formulario(){
				document.getElementById("nom_user").focus();
				document.getElementById("nom_user").value="";
				document.getElementById("password").value="";
				document.getElementById("nom_partido").value="";
				}


	});



