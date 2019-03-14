<?php 
	require_once("../../../clases/ClsUsuarios.php");

	$cls = new ClsUser();

?>


<!DOCTYPE html>
<html>
<head>
	<title>USUARIOS</title>

	<script src="../../../js/jquery-3.1.1.min.js"></script>
	<script src="../../../js/bootstrap.min.js"></script>
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
            <a class="nav-link" href="../../Configuracion/html_configuracion.php">Configuración</a>
          </li>
           </ul>
      <div class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" hidden>
        <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href = '../../login/cerrarSesion.php'">Cerrar Sesión</button>
      </div>
    </div>
  </nav>
</header>



	<div class="container p-5">
		<div class="w-100 p-4">
			<div class="card">
				<div class="card-body"> 
					<div class="form-group p-4" id="tabla">
						<table class="table" id="tabla_user">
							<thead class="thead-dark">
								<tr>
									<th scope="col">CODIGO</th>
									<th scope="col">USUARIO</th>
									<th scope="col">CONTRASEÑA</th>
									<th scope="col">ROL</th>
									<th scope="col"></th>
								</tr>
							</thead>
							<tbody id="contenido_tabla">
								<?php 
								$sql = "select U.id_user, U.user, U.psw, N.nivel ";
								$sql.= "from usuario U, nivelUser N ";
								$sql.= "where U.id_nivel = N.id_nivel;";
								$result = $cls->visualizar_datos($sql);

								if(empty($result)){
									?>
								<tr>
								    <td></td>
									<td>NO</td>
									<td>EXISTEN</td>
									<td>USUARIOS</td>
									<td></td>
								</tr>
								<?php
								}else{

								foreach ($result as $show) {
								?>
								<tr>
									<td><?php echo $show['id_user']; ?></td>
									<td><?php echo $show['user']; ?></td>
									<td><?php echo $show['psw']; ?></td>
									<td><?php echo $show['nivel']; ?></td>
									<td>
										<div class="form-group">
											<button class="btn btn-warning">
								            <i class="fas fa-edit"></i> 
								            <a style="text-decoration: none; color: #fff;" href="html_edit.php?id=<?php echo $show['id_user']; ?>">
								            Editar  </a>
								            </button>

								            <button class="btn btn-danger">
								            <i class="fas fa-user-minus"></i>
								            <a style="text-decoration: none; color: #fff;" href="pregunta.php?id=<?php echo $show['id_user']; ?>">
								            Borrar </a>
								            </button>
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


</body>
</html>