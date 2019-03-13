<?php

	 include("../../../clases/ClsverForms.php");
	 include("../archivoJsF.php");

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


	  $clsver = new ClsverForms();


	  $id_tramite = $_GET['id'];
	  $aux = 0;
	  $requisitos = Array();

	  $total_r = $clsver->cant_documentos($id_tramite);

	  if($total_r != 0){


	  $sql1 = "select R.id_rq ";
	  $sql1.= "from requisito R, formulario_inscripcion F, form_requisito S, tramite T ";
	  $sql1.= "where T.id_tramite = $id_tramite and T.id_formulario = F.id_formulario ";
	  $sql1.= "and F.id_formulario = S.id_formulario and R.id_rq = S.id_rq;";

	  $respuesta = $clsver->exec_query($sql1);
		  foreach ($respuesta as $show) {
		  	$requisitos[$aux] = $show['id_rq'];
		  	$aux++;
		  
		    }
	}



?>


<!DOCTYPE html>
<html>
<head>
	<title>Detalles</title>
	<!-- JS -->
  <script src="../../../js/jquery-3.1.1.min.js"></script>
  <script src="../../../js/bootstrap.min.js"></script>
  <script src="../../../js/verFormC.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <!-- CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../../../css/verForm.css">
  <link rel="stylesheet" type="text/css" href="../../../css/newfondo.css">

  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


</head>
<body>

	<header>
	
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		    <a class="navbar-brand">TRIBUNAL SUPREMO ELECTORAL</a>
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		  
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav mr-auto">
		        <li class="nav-item" routerLinkActive="active">
		          <a class="nav-link" href="../../principal.php" >Inicio</a>
		        </li>
		        <li class="nav-item" routerLinkActive="active"> 
		          <a class="nav-link" href="../../Formulario-inscripcion/html_formularioC.php">Inscripcion</a>
		        </li>
		        <li class="nav-item" routerLinkActive="active">
		            <a class="nav-link" href="#">Documentación<span class="sr-only">(current)</span></a>
		          </li>
		      </ul>
		      <div class="form-inline my-2 my-lg-0">
		        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" hidden>
		        <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href = '../../Login/cerrarSesion.php'">Cerrar Sesión</button>
		      </div>
		    </div>
		  </nav>
		</header>

		<div class="container p-5">
			<div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-6">
					<div class="card">
						<div class="card-body">
							<form method="POST" action="Guardar_cambiosE.php" enctype="multipart/form-data" autocomplete="off" >
								<table>

										<?php 

											$aux = 1;
											$sql = "select  * from requisito; ";
											$answer = $clsver->exec_query($sql);
											foreach ($answer as $fila) {
												$nom = "c".$aux;
										?>

										<tr>
										<td><label><?php echo $fila['desc_rq']; ?></label></td>
										<td></td>
										<td><input type="text" value="<?php echo $f?>" id="foto" hidden></td>
										<?php
												$a = 0;

													if($total_r != 0){
															for($i = 0; $i <= ($total_r-1); $i++){
																if($requisitos[$i] == $fila['id_rq']){
																	$a = 1; $i = $total_r;
																}else{ $a = 0; }
															}
													}//END IF	

												if($a == 1){
										?>
										<td><img src="../../../img/verde.png" width="50px" height="35"></td>
										<?php
										}else{ 
										?>
										<td><img src="../../../img/rojo.png" width="50px" height="35"></td>
										<td><input type="checkbox" id="customCheck1" name="<?php echo $nom; ?>" value="<?php echo $fila['id_rq'];?>"></td>
										<?php 

											}
										?>

										</tr>


										<?php
											$aux++;
											}//END FOREACH
										?>

								</table>
								<br>
								<center>
									<div>
										<input type="file" name="archivo" id="archivo" required="">
									</div>
								</center>

								<br>
								<input type="text" value="<?php echo $id_tramite ?>" id="tramite" name="tramite" hidden>
								<center>
								<div class="form-group">
									<button class="btn btn-secondary" type="submit">Agregar</button>
									<button class="btn btn-warning"   id="btn_regresar"><a href="html_documentacionE.php" style="text-decoration: none; color: #fff;">Regresar</a></button>
								</div>
								</center>


								</form>

								
						</div>
					</div>
				</div>
			</div>
		</div>
</body>
</html>