	$(function(){
		console.log("jQuery is Working");



			$('#form-inscripcion').submit( function(e){
			var total = document.getElementById("total_requisitos").value;
			total =  parseInt(total) + 1;
			var nom = "customCheck";
			var requisitos = new Array(total);
			var aux;
			var img = new Image();
			img =document.getElementById('archivo');

			requisitos[0] = 1;

			
			for (var i = 1; i < total; i++) {
				
				nombre = nom.concat(i);
				var doc = document.getElementById(nombre).checked;

				if(doc){
					requisitos[i] = 1;
				}else{ requisitos[i] = 0; }

			}


			total =  parseInt(total) - 1;


			const postData = {
				name1: $('#nom1').val(),
				name2: $('#nom2').val(),
				ape1:  $('#ape1').val(),
				ape2:  $('#ape2').val(),
				dpi:   $('#nidentificacion').val(), 
				tel:   $('#tel').val(),
				correo: $('#email').val(),
				fecha:  $('#fecha').val(),
				puesto: $('#inputGroupSelect01').val(),
				muni:   $('#muni').val(),
				registro:  $('#nregistro').val(),
				sesion: $('#sesion').val(), 
				dept:   $('#dep').val(),
				rq: 	requisitos,
				archivo: img,
				total_r: total


			};

			
			//console.log(postData);
			
			$.post('enviarinscripcionC.php', postData,function(response){
				console.log(response);
				/*document.getElementById("nom1").focus();
				$('#alertas').html(response);
				Limpiar_formulario();*/

			});
			
			e.preventDefault();

		});



			//RECEPCION DE DATOS DEL FORMULARIO DE INSCRIPCION POR PARTE DE UN EMPLEADO DEL TSE
			$('#form-inscripcionE').submit( function(e){

			var foto = document.getElementById("customCheck1").checked;
			var cert = document.getElementById("customCheck2").checked;
			var constan = document.getElementById("customCheck3").checked;
			var pen = document.getElementById("customCheck4").checked;
			var poli = document.getElementById("customCheck5").checked;	



			const postData = {
				name1: $('#nom1').val(),
				name2: $('#nom2').val(),
				ape1:  $('#ape1').val(),
				ape2:  $('#ape2').val(),
				dpi:   $('#nidentificacion').val(), 
				tel:   $('#tel').val(),
				correo: $('#email').val(),
				fecha:  $('#fecha').val(),
				puesto: $('#inputGroupSelect01').val(),
				partido:$('#partido').val(),
				muni:   $('#muni').val(),
				registro:  $('#nregistro').val(),
				sesion: $('#sesion').val(), 
				dept:   $('#dep').val(),
				fotocopia: foto,
				certificado: cert,
				constancia: constan,
				penales: pen,
				policiacos: poli


			};

			//console.log(postData);
			
			$.post('enviarInscripcion.php', postData,function(response){
				document.getElementById("nom1").focus();
				$('#alertas').html(response);
				Limpiar_formulario();
			});
			
			e.preventDefault();

		});




			function Limpiar_formulario(){
				document.getElementById("nom1").focus();
				document.getElementById("nom1").value="";
				document.getElementById("nom2").value="";
				document.getElementById("ape1").value="";
				document.getElementById("ape2").value="";
				document.getElementById("email").value="";
				document.getElementById("nidentificacion").value="";
				document.getElementById("inputGroupSelect01").value=0;
				document.getElementById("tel").value="";
				document.getElementById("nregistro").value="0";
				document.getElementById("dep").value=0;
				document.getElementById("customCheck1").checked = false;
				document.getElementById("customCheck2").checked = false;
				document.getElementById("customCheck3").checked = false;
				document.getElementById("customCheck4").checked = false;
				document.getElementById("customCheck5").checked = false;

				}

	});


