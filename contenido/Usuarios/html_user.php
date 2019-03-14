<?php
require_once("../../clases/ClsUsuarios.php");

session_start();
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

$conex = new ClsUser();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Usuario</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!-- JS -->
	<script src="../../js/jquery-3.1.1.min.js"></script>
  	<script src="../../js/bootstrap.min.js"></script>
  	<script src="../../js/newuser.js"></script>
  	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>



	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../../css/fondo.css">

</head>
</head>
<body>


<!-- MENU NAVEGADOR + CERRAR SESION -->
<header> 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand"style="color: white;"><strong>TRIBUNAL SUPREMO ELECTORAL</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item" routerLinkActive="active">
          <a class="nav-link" href="../principal.php" >Inicio</a>
        </li>
        <li class="nav-item" routerLinkActive="active"> 
          <a class="nav-link" href="../Formulario-inscripcion/html_formularioE.php">Inscripcion</a>
        </li>
        <li class="nav-item" routerLinkActive="active">
            <a class="nav-link" href="../Documentacion/Empleado/html_documentacionE.php">Documentación</a>
          </li>
            <li class="nav-item" routerLinkActive="active">
            <a class="nav-link" href="../Reportes/R_main.php">Reportes</a>
          </li>
          <li class="nav-item" routerLinkActive="active">
            <a class="nav-link" href="#">Usuarios<span class="sr-only">(current)</span></a>
          </li>
      </ul>
      <div class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" hidden>
        <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href = '../login/cerrarSesion.php'">Cerrar Sesión</button>
      </div>
    </div>
  </nav>
</header>




<!-- FORMULARIO: AGREGAR NUEVO USUARIO -->

<div class="container p-4">

		<!--  
            *******************************************************************************
            *****************************MENSAJES DE ALERTAS*******************************
            *******************************************************************************
        -->

        <div id="alertas"></div>

        <!--******************************************************************************* -->
	
	<div class="row">
		<div class="col-lg-3"></div>
      	<div class="col-lg-5">
      		<div class="card">
      			<div class="card-header bg-success" style="text-align: center;"><label style="font-family: verdana; font-weight: bold;">CREAR NUEVO USUARIO</label></div>
      			<center>
      			<div class="card-body">
      				<form id="form-nuevo">

      					<div class="form-group row">
						    <label for="nom_user" class="col-sm-5 col-form-label">Usuario</label>
						    <div class="col-sm-5">
						      <input type="text" class="form-control" id="nom_user" placeholder="Usuario">
						    </div>
						  </div>


						  <div class="form-group row">
						    <label for="password" class="col-sm-5 col-form-label">Contraseña</label>
						    <div class="col-sm-5">
						      <input type="password" class="form-control" id="password" placeholder="Contraseña">
						    </div>
						  </div>


						  <div class="form-group row">
						    <label for="nom_partido" class="col-sm-5 col-form-label">Partido</label>
						    <div class="col-sm-5">
						      <input type="text" class="form-control" id="nom_partido">
						    </div>
						  </div>


						  <div class="form-group row">
						  	<label for="btn_insertar" class="col-sm-2 col-form-label"></label>
						  	<button id="btn_insertar" class="btn btn-primary" type="submit">INSERTAR DATOS</button>&nbsp;  &nbsp; 
						  	<button id="btn_cancelar" class="btn btn-warning">CANCELAR</button>
						  </div>
      					

      				</form>
      			</div>
      			</center>
      		</div>
		</div>
	</div>
</div>


</body>
</html>