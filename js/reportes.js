
	$(function(){

		console.log("JS its Working!!!");


		$('#Frm_reportes').submit( function(e){


			if(document.getElementById("partido").checked == true){
					location.href = "R_partido.php";
			}

			if(document.getElementById("puesto").checked == true){
					location.href = "R_puesto.php";	
			}

			if(document.getElementById("dept").checked == true){
				location.href = "R_dept.php";	
			}

			if(document.getElementById("municipio").checked == true){
					location.href = "R_muncipio.php";	
			}


			//console.log(postData);


			/*$.post('R_dept.php', postData, function(response){

				//alert(response);
				//location.href = "../verFormularios/index_verFormularios.php";
				console.log(response);
			});*/


			e.preventDefault();
		});





	});