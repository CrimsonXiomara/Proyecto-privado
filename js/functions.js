	$(function(){
		console.log("jQuery is Working");



			//RECEPCION DE DATOS DEL FORMULARIO DE INSCRIPCION POR PARTE DE UN EMPLEADO DEL TSE
			$(document).on('click', '.ingreso', function(e){

				var form = new FormData($('#form-i')[0]);
				
				$.ajax ({
					data: form,
					url: "enviarinscripcionC.php",
					type: "POST",
					contentType: false,
					processData: false,
					success: function(response){

						switch(response){
							case '1':
								alert("EL NOMBRE NO DEBE CONTENER NUMEROS");
								break;

							case '2':
								alert("EL APELLIDO NO DEBE CONTENER NUMEROS");
								break;

							case '3':
								alert("EL DPI SOLO PUEDE CONTENER DIGITOS NUMERICOS");
								break;

							case '4':
								alert("EL TELEFONO SOLO PUEDE CONTENER DIGITOS NUMERICOS");
								break;

							case '5':
								alert("ESTE CORREO NO ES VALIDO");
								break;

							case '6':
								alert("TIENE QUE ADJUNTAR EL ARCHIVO PDF");
								break;

							case '9':
								alert("NO PUEDE HABER MAS DE UN PRESIDENTE");
								break;

							case '10':
								alert("NO PUEDE HABER MAS DIPUTADOS EN ESTA ZONA");
								break;

							case '11':
								alert("SOLO PUEDE HABER UN ALCALDE POR MUNICIPIO");
								break;

							case '12':
								alert("NO PUEDE HABER MAS DE UN VICEPRESIDENTE");
								break;

							case '13':
								alert("EL ARCHIVO YA EXISTE");
								break;

							case '14':
								alert("Archivo no Permitido o Excede el tamaño");
								break;

							case '15':
								alert("ERROR AL GUARDAR ARCHIVO");
								break;

							default:
								$('#alertas').html(response);
								document.getElementById("nom1").focus();
								Limpiar_formulario();
								break;
						}




					}
				});

			e.preventDefault();
			});




			//FORMULARIO DE EMPLEADOS
			$(document).on('click', '.ingresoE', function(e){

				var form = new FormData($('#form-inscripcionE')[0]);
				
				$.ajax ({
					data: form,
					url: "enviarinscripcionE.php",
					type: "POST",
					contentType: false,
					processData: false,
					success: function(response){

						switch(response){
							case '1':
								alert("EL NOMBRE NO DEBE CONTENER NUMEROS");
								break;

							case '2':
								alert("EL APELLIDO NO DEBE CONTENER NUMEROS");
								break;

							case '3':
								alert("EL DPI SOLO PUEDE CONTENER DIGITOS NUMERICOS");
								break;

							case '4':
								alert("EL TELEFONO SOLO PUEDE CONTENER DIGITOS NUMERICOS");
								break;

							case '5':
								alert("ESTE CORREO NO ES VALIDO");
								break;

							case '6':
								alert("TIENE QUE ADJUNTAR EL ARCHIVO PDF");
								break;

							case '9':
								alert("NO PUEDE HABER MAS DE UN PRESIDENTE");
								break;

							case '10':
								alert("NO PUEDE HABER MAS DIPUTADOS EN ESTA ZONA");
								break;

							case '11':
								alert("SOLO PUEDE HABER UN ALCALDE POR MUNICIPIO");
								break;

							case '12':
								alert("NO PUEDE HABER MAS DE UN VICEPRESIDENTE");
								break;

							case '13':
								alert("EL ARCHIVO YA EXISTE");
								break;

							case '14':
								alert("Archivo no Permitido o Excede el tamaño");
								break;

							case '15':
								alert("ERROR AL GUARDAR ARCHIVO");
								break;

							default:
								$('#alertas').html(response);
								document.getElementById("nom1").focus();
								Limpiar_formulario();
								break;
						}




					}
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


