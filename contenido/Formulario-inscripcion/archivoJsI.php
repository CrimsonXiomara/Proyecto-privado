 <script>
      function cambio_fecha(){
        var tipo = document.getElementById("inputGroupSelect01").value;
        console.log(tipo);

        if(tipo == 1){
            document.getElementById("fecha").min = "1962-01-01";
            document.getElementById("fecha").max = "1975-12-30";
            document.getElementById("dep").disabled = true;
            document.getElementById("dep").value = 0;
            document.getElementById("muni").disabled = true;
            document.getElementById("muni").value = 0;
            console.log("Cambio la fecha para el Presidente");
        }else if(tipo == 2){
            document.getElementById("fecha").min = "1962-01-01";
            document.getElementById("fecha").max = "1992-12-30";
            document.getElementById("dep").disabled = false;
            document.getElementById("muni").disabled = false;
            console.log("Cambio la fecha para el Diputado");
        }else if(tipo == 3){
            document.getElementById("fecha").min = "1962-01-01";
            document.getElementById("fecha").max = "1975-12-30";
            document.getElementById("dep").disabled = false;
            document.getElementById("muni").disabled = false;
            console.log("Cambio la fecha para el Alcalde");
        }else if(tipo == 4){
            document.getElementById("fecha").min = "1962-01-01";
            document.getElementById("fecha").max = "1975-12-30";
            document.getElementById("dep").disabled = true;
            document.getElementById("dep").value = 0;
            document.getElementById("muni").disabled = true;
            document.getElementById("muni").value = 0;
            console.log("Cambio la fecha para el Vicepresidente");
        }else{ console.log("No hay cambios"); }
      }


      function cambio_municipio(){
        //console.log("Hora de cambiar!")
        var id_dept = document.getElementById("dep").value;

          const postData = {
            dept: id_dept
          }

          //console.log(postData);

          $.post('Cambio_muni.php', postData,function(response){
            //console.log(response);
            $('#muni').html(response);
           });               
      }

    



  </script>