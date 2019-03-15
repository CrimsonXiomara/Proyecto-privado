<?php

	require_once("../../../clases/ClsverForms.php");

	session_start();
	$usuario_actual = $_SESSION['loginUser'];

		if(isset($_SESSION['loginUser'])){
			$l=0;
		}else{
			?>
			
			<script >
		          alert("Tiene que iniciar Sesion para acceder a esta página");
		          location.href ="../../Login/html_login.php";
		     </script>

     <?php
			}
  $conex = new ClsverForms();

  $id_candidato = $_GET['id'];

?>


<!DOCTYPE html>
<html>
<head>
	<title>DOCUMENTACIÓN</title>

	  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

	  <script src="../../../js/jquery-3.1.1.min.js"></script>
	  <script src="../../../js/bootstrap.min.js"></script>
	  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

	  <!-- CSS -->
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	  <link rel="stylesheet" type="text/css" href="../../../css/verForm.css">
	  <link rel="stylesheet" type="text/css" href="../../../css/newfondo.css">
</head>
<body>
	
	<header>
	
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		    <a class="navbar-brand" style="color: white;"><strong>TRIBUNAL SUPREMO ELECTORAL</strong></a>
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		  
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav mr-auto">
		        <li class="nav-item" routerLinkActive="active">
		          <a class="nav-link" href="../../principal.php" >Inicio </a>
		        </li>
		        <li class="nav-item" routerLinkActive="active"> 
		          <a class="nav-link" href="../../Formulario-inscripcion/html_formularioE.php">Inscripcion</a>
		        </li>
		        <li class="nav-item" routerLinkActive="active">
		            <a class="nav-link" href="#">Documentación<span class="sr-only">(current)</span></a>
		          </li>
		            <li class="nav-item" routerLinkActive="active">
		            <a class="nav-link" href="../../Reportes/R_main.php">Reportes</a>
		          </li>
		          <li class="nav-item" routerLinkActive="active">
		            <a class="nav-link" href="../../Usuarios/html_user.php">Usuarios</a>
		          </li>
		      </ul>
		      <div class="form-inline my-2 my-lg-0">
		        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" hidden>
		        <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href = '../../Login/cerrarSesion.php'">Cerrar Sesión</button>
		      </div>
		    </div>
		  </nav>
		</header>

		<center>
		<div class="container">
			<div class="col-lg-7 p-3">
					<div class="card">
						<div class="card-body">
							<div class="form-group">

								<?php 
									$sql = "select C.p_nombre, C.s_nombre, C.p_ape, C.s_ape, C.correo, C.telefono, P.desc_partido, E.nom_puesto ";
									$sql.= "from candidato C, partido P, puesto_electoral E ";
									$sql.= "where E.id_puesto_electoral = C.id_puesto and P.id_partido = C.id_partido and C.id_candidato = $id_candidato;";
									$result = $conex->visualizar_datos($sql);

									foreach ($result as $show) {
										$nombre = $show['p_nombre']." ".$show['s_nombre']." ".$show['p_ape']." ".$show['s_ape'];
										$correo = $show['correo'];
										$tel = $show['telefono'];
										$partido = $show['desc_partido'];
										$puesto = $show['nom_puesto'];
									}
								?>

								<center>
								<table class="table">
									<tr>
										<td><label for="nombre" style="color: black;">NOMBRE DEL CANDIDATO</label></td>
										<td><input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>" disabled></td>
									</tr>
									<tr></tr>
									<tr>
										<td><label for="telefono" style="color: black;">NÚMERO DE TELEFONO</label></td>
										<td><input class="form-control" type="text" name="telefono" id="telefono" value="<?php echo $tel; ?>" disabled></td>
									</tr>
									<tr>
										<td><label for="email" style="color: black;">CORREO ELECTRÓNICO</label></td>
										<td><input class="form-control" type="text" name="email" id="email" value="<?php echo $correo; ?>" disabled></td>
									</tr>
									<tr>
										<td><label for="puesto" style="color: black;">PUESTO ELECTORAL</label></td>
										<td><input class="form-control" type="text" name="puesto" id="puesto" value="<?php echo $puesto; ?>" disabled></td>
									</tr>
									<tr>
										<td><label for="partido" style="color: black;">PARTIDO AL QUE PERTENECE</label></td>
										<td><input class="form-control" type="text" name="partido" id="partido" value="<?php echo $partido; ?>" disabled></td>
									</tr>
								</table>
								</center>
								

							</div>
							<center>
							<div class="form-group">
								<button class="btn btn-warning">
									<i class="fas fa-arrow-circle-left"></i>
									<a href="html_documentacionE.php"></a>
									<a href="html_documentacionE.php" style="text-decoration: none; color: black;">REGRESAR</a>
								</button>
							</div>
						</center>
						</div>
					</div>
			</div>
		</div>
	</center>

</body>
</html>