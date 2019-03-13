<script>
	
	function cambio1(){
		  	document.getElementById("incom").value = 0;
		  	document.getElementById("com").value = 0;
		  	document.getElementById("rev").value = 1;

		  }

		  function cambio2(){
		  	document.getElementById("incom").value = 0;
		  	document.getElementById("com").value = 1;
		  	document.getElementById("rev").value = 0;

		  }

		  function cambio3(){
		  	document.getElementById("incom").value = 1;
		  	document.getElementById("com").value = 0;
		  	document.getElementById("rev").value = 0;


		  }




		function cambios(){
  		$foto = 		document.getElementById("foto").value;
  		$partida = 		document.getElementById("p").value;
  		$constancia = 	document.getElementById("c").value;
  		$penal = 		document.getElementById("pe").value;
  		$poli = 		document.getElementById("l").value;
  		$ciudadano = 	document.getElementById("n").value;

  		document.getElementById("btn_cancelar").hidden = false;
  		document.getElementById("btn_guardar").hidden = false;
  		document.getElementById("btn_agregar").hidden = true;
  		document.getElementById("btn_regresar").hidden = true;

  		if($foto == 0){ document.getElementById("customCheck1").hidden = false; }else{ document.getElementById("customCheck1").checked = "on";  }
  		if($partida == 0){ document.getElementById("customCheck2").hidden = false; }else{ document.getElementById("customCheck2").checked = "on";  }
  		if($constancia == 0){ document.getElementById("customCheck3").hidden = false; }else{ document.getElementById("customCheck3").checked = "on";  }
  		if($penal == 0){ document.getElementById("customCheck4").hidden = false; }else{ document.getElementById("customCheck4").checked = "on";  }
  		if($poli == 0){ document.getElementById("customCheck5").hidden = false; }else{ document.getElementById("customCheck5").checked = "on";  }
  		if($ciudadano == 0 ){ document.getElementById("customCheck6").hidden = false; document.getElementById("agregar_no").hidden = false;}else{ document.getElementById("customCheck6").checked = "on";  }

  	}

  	function cancelar_c(){
  		document.getElementById("customCheck1").hidden = true;
  		document.getElementById("customCheck2").hidden = true;
  		document.getElementById("customCheck3").hidden = true;
  		document.getElementById("customCheck4").hidden = true;
  		document.getElementById("customCheck5").hidden = true;
  		document.getElementById("customCheck6").hidden = true;
  		document.getElementById("btn_cancelar").hidden = true;
  		document.getElementById("btn_guardar").hidden = true;
  		document.getElementById("btn_agregar").hidden = false;
  		document.getElementById("btn_regresar").hidden = false;
  		document.getElementById("agregar_no").hidden = true;
  	}


</script>