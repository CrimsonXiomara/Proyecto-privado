<?php 

	require_once("../../clases/ClsConfiguracion.php");

	$cls = new ClsConfig();

?>

<!DOCTYPE html>
<html>
<head>
	<title>CONFIGURACIÓN</title>

	<script src="../../js/jquery-3.1.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/Configuracion.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


	<!-- CSS -->
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	 <link rel="stylesheet" type="text/css" href="../../css/configuracion.css">
	 <link rel="stylesheet" type="text/css" href="../../css/newfondo.css">

	<!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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
          <a class="nav-link" href="#">Administrar Usuarios<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item" routerLinkActive="active">
            <a class="nav-link" href="../../Reportes/R_main.php">Reportes</a>
          </li>
            <li class="nav-item" routerLinkActive="active">
            <a class="nav-link" href="../../Configuracion/html_configuracion">Configuración</a>
          </li>
           </ul>
      <div class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" hidden>
        <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href = '../login/cerrarSesion.php'">Cerrar Sesión</button>
      </div>
    </div>
  </nav>
</header>


	<div class="container p-3">
		<div class="row">
			<div class="col-lg-1"></div>
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header bg-secondary">
							<label style="font-family: verdana; font-weight: bold;">CONFIGURACIÓN: REQUISITOS</label>
						</div>
						<div class="card-body">

				

				<div class="cols">

							
					<div class="form-group p-4 col-sm-6" id="tabla">
			            <table class="table" id="tabla_user">
			              <thead class="thead-dark">
			                <tr>
			                  <th scope="col">CODIGO</th>
			                  <th scope="col">DESCRIPCION DE REQUISITO</th>
			                  <th scope="col"></th>
			                </tr>
			              </thead>
			              <tbody id="contenido_tabla">
			              	<!--
			                <?php 
			                $sql = "select * from requisito ";
			                $result = $cls->visualizar_datos($sql);

			                if(empty($result)){
			                  ?>
			                <tr>
			                    <td></td>
			                  <td></td>
			                  <td></td>
			                </tr>
			                <?php
			                }else{

			                foreach ($result as $show) {
			                ?>
			                <tr>
			                  <td><?php echo $show['id_rq']; ?></td>
			                  <td><?php echo $show['desc_rq']; ?></td>
			                  <td>
			                    <div class="form-group">
			                            <button class="btn btn-danger">
			                            <i class="fas fa-trash-alt"></i>
			                            <a style="text-decoration: none; color: #fff;" href="pregunta.php?id=<?php echo $show['id_user']; ?>">
			                            Borrar </a>
			                            </button>
			                    </div>
			                  </td>
			                </tr>
			                <?php
			                  }
			                }
			                ?>  -->              
			              </tbody>
			            </table>
			          </div>



					<div class="col-sm-4 p-4" id="nuevoR">
						<div class="card">
							<div class="card-header bg-info">
								<label style="font-family: verdana; font-weight: bold;">AGREGAR REQUISITO NUEVO</label>
							</div>
							<div class="card-body">
								<div id="alerta"></div>


								<center>
								<form id="agregar_requisito" autocomplete="off">
									
									<div class="form-group">
										<input type="text" class="form-control" name="requisito" id="requisito" placeholder="Requisito">
									</div>

									<div class="form-group">
										<button class="btn btn-success">
								           <i class="fas fa-plus-circle"></i>
								            Agregar 
								        </button>
									</div>


								</form>
							</center>
							</div>
						</div>
					</div>

				</div>
					

							
						</div>
					</div>

					<br>

					<div class="card">
						<div class="card-header bg-secondary">
							<label style="font-family: verdana; font-weight: bold;">CONFIGURACIÓN: MANUAL</label>
						</div>
						<div class="card-body">
							
						</div>
					</div>
				</div>
		</div>
	</div>


</body>
</html>