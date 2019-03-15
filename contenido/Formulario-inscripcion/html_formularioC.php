<?php

  require_once("../../clases/ClsConex.php");
  include("archivoJsI.php");

session_start();
$usuario_actual = $_SESSION['loginUser'];

if(isset($_SESSION['loginUser'])){
	$l=0;
}else{
	?>
	
	<script >
          alert("Tiene que iniciar Sesion para acceder a esta página");
          location.href ="../Login/html_login.php";
     </script>

     <?php
}


  $conex = new ClsConex();

  
?>

<!DOCTYPE html>
<html>
<head>
  <title>Inscripcion</title>
  
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- JS -->
  <script src="../../js/jquery-3.1.1.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/functions.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../../css/inscripcion.css">
  <link rel="stylesheet" type="text/css" href="../../css/newfondo.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>



</head>
<body>

  <header>
  
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand"style="color: white;"><strong>TRIBUNAL SUPREMO ELECTORAL</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item" routerLinkActive="active">
          <a class="nav-link" href="../../principal.php">Inicio </a>
        </li>
        <li class="nav-item" routerLinkActive="active"> 
          <a class="nav-link" href="#">Inscripcion<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item" routerLinkActive="active">
          <a class="nav-link" href="../Documentacion/Candidato/html_documentacionC.php">Documentación</a>
        </li>
      </ul>
      <div class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" hidden>
        <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href = '../Login/cerrarSesion.php'">Cerrar Sesión</button>
      </div>
    </div>
  </nav>
</header>



  <div class="container p-4">

        <!--  
            *******************************************************************************
            *****************************MENSAJES DE ALERTAS*******************************
            *******************************************************************************
        -->
        <div id="alertas" ></div>


        <!--******************************************************************************* -->

    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-lg-10">
        <div class="card">
          <div class="card-header bg-dark" style="text-align: center;"><label style="font-family: verdana; font-weight: bold; color: #fff;">FORMULARIO DE INSCRIPCIÓN</label></div>
          <div class="card-body">

            <form class="form-inscripcion" id="form-i" method="POST" enctype="multipart/form-data" autocomplete=""> <!--INICIO FORM id="form-inscripcion"   action="enviarinscripcionC.php" -->

              <div class="card p-2">
              <div class="card-body">
                <div class="card-header bg-light" style="text-align: center;"><label style="font-family: verdana; font-weight: bold; color: #000;">DATOS PERSONALES</label></div>
                <br>
              <label for="nomCompleto">Nombre Completo</label>
              <div class="form-row">
                <div class="form-group col-sm-3">
                  <input type="text" class="form-control" id="nom1" name="nom1" placeholder="Primer Nombre" >
                </div>
                <div class="form-group col-sm-3">
                  <input type="text" class="form-control" id="nom2" name="nom2" placeholder="Segundo Nombre" >
                </div>
                <div class="form-group col-sm-3">
                  <input type="text" class="form-control" id="ape1" name="ape1" placeholder="Primer Apellido" >
                </div>
                <div class="form-group col-sm-3">
                  <input type="text" class="form-control" id="ape2" name="ape2" placeholder="Segundo Apellido" >
                </div>
              </div>

              <br>

              <div class="form-row">
                <div class="form-group col-sm-3">
              <label for="email">Número de DPI</label>
              <input type="text" class="form-control" id="nidentificacion" name="nidentificacion" maxlength="13" >
            </div>
            <div class="form-group col-sm-3">
              <label for="tel">Telefono</label>
              <input type="text" class="form-control" id="tel" name="tel" maxlength="8" >
            </div>

            <div class="form-group col-sm-3">
              <label for="email">Correo electrónico</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="email@example.com" >
            </div>
            </div> <!--END CLASS FORM ROW-->

          </div></div> <!--END CARD-->

          <br><br>

          <div class="form-row">
            <div class="card w-100">
              <div class="card-body">
                <div class="card-header bg-light" style="text-align: center;"><label style="font-family: verdana; font-weight: bold; color: #000;">PUESTO ELECTORAL</label></div>
            <div class="input-group mb-3 p-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Puesto electoral</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01" name="puesto" onchange="cambio_fecha()" >
                  <option value="0" selected>Choose...</option>

                  <?php 
                    $sql = "select * from puesto_electoral";
                    $resultado = $conex->visualizar_datos($sql);

                    foreach ($resultado as $mostrar) {
        
                  ?>
                  <option value="<?php echo $mostrar['id_puesto_electoral'] ?>" >  <?php echo $mostrar['nom_puesto'] ?> </option>
                  <?php 

                    }
                  ?>

                </select>

                
                &nbsp;  &nbsp; 

                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Departamento</label>
                </div>
                <select class="custom-select" id="dep" name="dep" onchange="cambio_municipio();" >
                  <option value="0" selected>Choose...</option>

                  <?php 
                    $sql = "select * from departamento";
                    $resultado = $conex->visualizar_datos($sql);

                    foreach ($resultado as $mostrar) {
        
                  ?>
                  <option value="<?php echo $mostrar['id_dep'] ?>" >  <?php echo $mostrar['departamento'] ?> </option>
                  <?php 

                    }
                  ?>

                </select>

                &nbsp;  &nbsp; 


                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Municipio</label>
                </div>
                <select class="custom-select" id="muni" name="muni" >
                  <option value="0" selected>Choose...</option>

                  <?php 
                    $sql = "select * from municipio";
                    $resultado = $conex->visualizar_datos($sql);

                    foreach ($resultado as $mostrar) {
        
                  ?>
                  <option value='<?php echo $mostrar['id_municipio'] ?>' >  <?php echo $mostrar['nom_municipio'] ?> </option>
                  <?php 

                    }
                  ?>

                </select>
                

              </div>



                <div class="form-row p-3">
                    <div class="form-group col-md-5">
                        <label for="nregistro">*N° Registro de Ciudadanos</label>
                    <input type="text" class="form-control" id="nregistro" name="nregistro" maxlength="13" value="0">
                     
                    </div>
                  &nbsp;  &nbsp;
                   <div class="form-group col-md-4">
                    <label for="tel">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" min="1962-01-01" max="1975-01-01" id="fecha" name="fecha" >
                  </div>
                </div>

                    <?php 
                      $sql = "select id_user as id from usuario";
                      $sql.= " where user = '$usuario_actual';";
                      $result = $conex->exec_query($sql);
                      foreach($result as $row){
                        
                    ?>

                    <input type="text" class="form-control" id="sesion" value=" <?php echo $row['id']; ?>" name="sesion" maxlength="13" hidden>

                    <?php 
                       }
                    ?>

                  </div> </div> <!--CIERRE DE LA CLASE CARD-->
          </div>



            <div class="form-row p-3">
              <div class="card w-100">
              <div class="card-body">
                <div class="card-header bg-light" style="text-align: center;"><label style="font-family: verdana; font-weight: bold; color: #000;">REQUISITOS</label></div>
                <p>NOTA: Si le hace falta un requisito, tendrá una semana a partir del día en que se envíe este formulario para poder completar su papeleria. De lo contrario, su solicitud de inscripción derá anulada</p>

                <br>


                <?php 

                $aux = 0;
                $sql = "select * from requisito;";
                $r = $conex->exec_query($sql);
                foreach ($r as $fila) { 
                    $aux++;

                    $id_check = "customCheck".$aux;
                    $id_img   = "img".$aux;


                  ?>

                      <div class="col-sm-8">
                        <div class="card">
                          <div class="card-body">
                            <div class="custom-control custom-checkbox col">
                            <input type="checkbox" class="custom-control-input" id="<?php echo $id_check ?>" name="<?php echo $id_check ?>" value="<?php echo $fila['id_rq']; ?>">
                            <label class="custom-control-label" for="<?php echo $id_check ?>"> <?php echo $fila['desc_rq']; ?></label>
                          </div>
                          </div>
                        </div>
                      </div>

                      <br>

                  <?php 
                } //END FOREACH

                $sql = "select count(*) as total from requisito;";
                $rs  = $conex->exec_query($sql);

                foreach ($rs as $lista) {
                  $total_n = $lista['total'];
                }


                ?>


            <div class="form-row p-3">
              <input type="file" class="form-control" name="archivo" id="archivo" > 
            </div> <!--CIERRE DIV DE ARCHIVO PDF-->
            
                
                <input type="text" id="total_requisitos" name="total_requisitos"value="<?php echo $total_n ?>" hidden> <!--TOTAL DE REQUISITOS-->


        </div>
        </div><!--END CARD-->
      </div> <!--CIERRE DE DIV DE REQUISITOS-->


            <br>
                 <div class="padre form-row p-3" style="align-items: center;">
                  
                    <button class="ingreso btn btn-success btn-lg" type="submit"> INGRESAR INSCRIPCION </button>&nbsp;  &nbsp; 

                    <button class="hijo2 btn btn-warning btn-lg" type="button">
                     <a href="../principal.php" style="text-decoration: none; color: white;">CANCELAR</a>
                    </button>
                </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>