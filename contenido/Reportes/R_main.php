<?php

  require_once("../../clases/ClsConex.php");
  include("R_archivoJs.php");

session_start();
$usuario_actual = $_SESSION['loginUser'];

if(isset($_SESSION['loginUser'])){
	$l=0;
}else{
	?>
	
	<script >
          alert("Tiene que iniciar Sesion para acceder a esta página");
          location.href ="../login/login.php";
     </script>

     <?php
}


  $conex = new ClsConex();


  $sql = "select id_nivel from usuario where user='$usuario_actual'";  //Administrador
  $respuesta = $conex->exec_query($sql);

  foreach ($respuesta as $key) {
    $nivel = $key['id_nivel'];
  }

  
?>

<!DOCTYPE html>
<html>
<head>
	<title>Reportes</title>
	<!-- JS -->
  <script src="../../js/jquery-3.1.1.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/reportes.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <!-- CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../../css/verForm.css">
  <link rel="stylesheet" type="text/css" href="../../css/newfondo.css">


 

</head>
<body>
<header>
	
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <<a class="navbar-brand"style="color: white;"><strong>TRIBUNAL SUPREMO ELECTORAL</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

      	<?php 
      		if($nivel == 1){//ADMINISTRADOR
      	?>
		        <li class="nav-item" routerLinkActive="active">
		          <a class="nav-link" href="../principal.php" >Inicio </a>
		        </li>
		        <li class="nav-item" routerLinkActive="active"> 
		          <a class="nav-link" href="../Usuarios/Administrador/html_usuarios.php">Administrar Usuarios<span class="sr-only">(current)</span></a>
		        </li>
		        <li class="nav-item" routerLinkActive="active">
		            <a class="nav-link" href="#">Reportes</a>
		          </li>
		            <li class="nav-item" routerLinkActive="active">
		            <a class="nav-link" href="../Configuracion/html_configuracion.php">Configuración</a>
		          </li>

          <?php 
      		}
      		if($nivel == 2){//EMPLEADO
          ?>
		          	<li class="nav-item" routerLinkActive="active">
		          <a class="nav-link" href="../principal.php" >Inicio </a>
		        </li>
		        <li class="nav-item" routerLinkActive="active"> 
		          <a class="nav-link" href="../Formulario-inscripcion/html_formularioE.php">Inscripcion</a>
		        </li>
		        <li class="nav-item" routerLinkActive="active">
		            <a class="nav-link" href="../Documentacion/Empleado/html_documentacionE.php">Documentación</a>
		          </li>
		            <li class="nav-item" routerLinkActive="active">
		            <a class="nav-link" href="#">Reportes <span class="sr-only">(current)</span></a>
		          </li>
		          <li class="nav-item" routerLinkActive="active">
		            <a class="nav-link" href="../Usuarios/html_user.php">Usuarios</a>
		          </li>



          <?php 
          	}
          ?>

      </ul>
      <div class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" hidden>
        <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href = '../login/cerrarSesion.php'">Cerrar Sesión</button>
      </div>
    </div>
  </nav>
</header>


	<div class="container p-5">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<div class="card text-white bg-info">
					<div class="card-body">
						<center>
							<form id="Frm_reportes" autocomplete="off">
								<h3 class="card-header bg-dark"><label>REPORTES</label></h3><br>
								<div class="form-group">
									<p> Escoga de los siguientes elementos, los que desee que salgan en el reporte</p>
								</div>
								<div class="card bg-primary mb-3 p-4" style="max-width: 80%;">
								<!--<div class="form-group" >
									<label>Nombre del Archivo: </label>
									<input type="text" id="txt_nom">
								</div>-->
								<div class="form-group">
									<table style="width:60%" >
										<tr>
											<td>
												<label>Partido</label>
											</td>
											<td>
												<input type="checkbox" onclick="if(this.checked == true){otros_ocultarP();} else{otros_verP();}" id="partido">
											</td>
											</tr>
											<tr>
												<td>
												<label>Puesto Electoral</label>
											</td>
											<td>
												<input type="checkbox" onclick="if(this.checked == true){otros_ocultarPu();} else{otros_verPu();}" id="puesto">
											</td>
										</tr>
										<tr>
											<td>
												<label>Departamento</label>
											</td>
											<td>
												<input type="checkbox" onclick="if(this.checked == true){otros_ocultarD();} else{otros_verD();}" id="dept">
											</td>
										</tr>
										<tr>
												<td>
												<label>Municipio</label>
											</td>
											<td>
												<input type="checkbox" onclick="if(this.checked == true){otros_ocultarM();} else{otros_verM();}" id="municipio">
											</td>
										</tr>
									</table>
								</div>
								</div> <!--Cierre 2° card-->
								<div class="form-group">
									<button class="btn btn-success" type="submit">
							            <!--<i class="fas fa-book"></i>
							            <a style="text-decoration: none; color: #fff;" href="R_dept.php">-->
							            Generar Reporte </a>
							            </button>
								</div>
							</form>
						</center>
					</div>
				</div>
			</div>
		</div>
	</div>


</body>
</html>