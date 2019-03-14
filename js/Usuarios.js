
	$(function(){
		console.log("jQuery de Usuarios");


		$('#form_edicion').submit( function(e){

			const postData={
				user:  $('#nom_user').val(),
				psw:   $('#password').val(),
				niv:   $('#inputGroupSelect01').val(),
				idu:   $('#usuario').val()

			};

			//console.log("posible");
			$.post('edit.php', postData, function(response){

				alert(response);
				location.href = "../Administrador/html_usuarios.php";
				//$('#contenido_tabla').html(response);
				//console.log(response);
			});

			e.preventDefault();
		});


	});
	