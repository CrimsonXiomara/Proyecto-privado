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

  $id_user = $conex->obtener_usuario($usuario_actual);
  $id_p = $conex->obtener_partido_usuario($id_user);

?>


<!DOCTYPE html>
<html>
<head>
	<title>DOCUMENTACIÓN</title>
	  <script src="../../../js/jquery-3.1.1.min.js"></script>
	  <script src="../../../js/bootstrap.min.js"></script>
	  <script src="../../../js/verFormC.js"></script>
	  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

	  <!-- CSS -->
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	  <link rel="stylesheet" type="text/css" href="../../../css/verForm.css">
	  <link rel="stylesheet" type="text/css" href="../../../css/newfondo.css">

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
		          <a class="nav-link" href="../../inscripcion/inscripcionC.php">Inscripcion</a>
		        </li>
		        <li class="nav-item" routerLinkActive="active">
		            <a class="nav-link" href="#">Documentación<span class="sr-only">(current)</span></a>
		          </li>
		      </ul>
		      <div class="form-inline my-2 my-lg-0">
		        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" hidden>
		        <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href = '../../../Login/cerrarSesion.php'">Cerrar Sesión</button>
		      </div>
		    </div>
		  </nav>
		</header>




		<div class="container p-5" >
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<div class="form-inline my-4 my-md-8 p-4">
								<input type="search" id="search" class="form-control mr-md-4" placeholder="Buscar..." name="">
							</div>
							<div class="form-group p-4" id="tabla">
								<table class="table" id="tabla_form">
									<thead class="thead-dark">
										<tr>
											<th scope="col">N°</th>
											<th scope="col">NOMBRE</th>
											<th scope="col">PARTIDO</th>
											<th scope="col">ESTADO</th>
											<th scope="col">FECHA DE TRAMITE</th>
											<th scope="col">CANT. DOCTOS</th>
											<th scope="col">CONFIGURACIÓN</th>
										</tr>
									</thead>
									<tbody id="contenido_tabla">
										<?php 
											$aux = 0;
										    $sql = "select C.p_nombre, C.s_nombre, C.p_ape, T.id_tramite, E.desc_estado, M.fecha, P.desc_partido, M.id_formulario ";
										    $sql.= "from tramite T, estados E, formulario_inscripcion M, candidato C, partido P ";
										    $sql.= "where C.id_partido = $id_p and T.id_estado = E.id_estado and T.id_formulario = M.id_formulario ";
										    $sql.= "and M.id_candidato = C.id_candidato and C.id_partido = P.id_partido;";
										    $result = $conex->visualizar_datos($sql);

										      if(empty($result)){ ?>
										      <tr>
										      <td></td>
										      <td></td>
										      <td>NO</td>
										      <td>HAY</td>
										      <td>INSCRIPCIONES</td>
										      <td></td>
										  	  </tr>
										      <?php

										      }else{


										      foreach ($result as $mostrar) {
										      $cantidad = $conex->cant_documentos($mostrar['id_tramite']);
										      $cant_rq  = $conex->cant_doc_requisitos();
										      $aux++;
										    ?>

										    <tr>
										      <td><?php echo $aux ?></td>
										      <td><?php echo $mostrar['p_nombre']." ".$mostrar['s_nombre'] ?></td>
										      <td><?php echo $mostrar['desc_partido'] ?></td>
										      <td><?php echo $mostrar['desc_estado'] ?></td>
										      <td><?php echo $mostrar['fecha'] ?></td>
										      <td><?php echo $cantidad; ?>/<?php echo $cant_rq; ?> </td>
										      <td>
										      		
										      		<div class="form-group">

											        <button class="btn btn-info"    id="details">
											          <a style="text-decoration: none; color: #fff;" href="detallesC.php?id=<?php echo $mostrar['id_tramite']; ?>">
											          Agregar
											          </a> 
											     	</button>  
											        <!--<button class="btn btn-danger" id="accept">
											          <a style="text-decoration: none; color: #fff;" href="detalles.php?id=<?php echo $mostrar['id_tramite']; ?>">
											          Eliminar
											          </a>
											     	</button>  -->
											        </div>
											    
										      </td>
										  </tr>
										  <?php 
										      }
										     }
										    ?>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



</body>
</html>





</body>
</html>
