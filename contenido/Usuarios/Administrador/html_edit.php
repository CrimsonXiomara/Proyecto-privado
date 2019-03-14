<?php 
	require_once("../../../clases/ClsUsuarios.php");

	$cls = new ClsUser();

	$id_user = $_GET['id'];

	$sql = "select U.id_user, U.user, U.psw, N.nivel, U.id_nivel ";
	$sql.= "from usuario U, nivelUser N ";
	$sql.= "where U.id_user = $id_user and U.id_nivel = N.id_nivel;";
	$result = $cls->visualizar_datos($sql);;

	foreach ($result as $ver) {
		$user = $ver['user'];
		$psw = $ver['psw'];
		$id_nivel = $ver['nivel'];
		$u_nivel = $ver['id_nivel'];
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>USUARIOS</title>

	<script src="../../../js/jquery-3.1.1.min.js"></script>
	<script src="../../../js/bootstrap.min.js"></script>
	<script src="../../../js/Usuarios.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


	<!-- CSS -->
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	 <link rel="stylesheet" type="text/css" href="../../../css/verForm.css">
	 <link rel="stylesheet" type="text/css" href="../../../css/newfondo.css">

	<!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>


	<div class="cointainer p-4">
		<div class="row">
		<div class="col-lg-3"></div>
      	<div class="col-lg-5">
      		<div class="card">
      			<div class="card-header bg-danger" style="text-align: center;"><label style="font-family: verdana; font-weight: bold; color: black;">CONFIGURACIÓN</label></div>
      			<center>
      			<div class="card-body">
      				<form id="form_edicion">

      					<div class="form-group row">
						    <label for="nom_user" class="col-sm-5 col-form-label">Usuario</label>
						    <div class="col-sm-5">
						      <input type="text" class="form-control" id="nom_user" placeholder="Usuario" value="<?php echo $user; ?>">
						    </div>
						  </div>


						  <div class="form-group row">
						    <label for="password" class="col-sm-5 col-form-label">Contraseña</label>
						    <div class="col-sm-5">
						      <input type="text" class="form-control" id="password" placeholder="Contraseña" value="<?php echo $psw; ?>">
						    </div>
						  </div>



						  <div class="input-group mb-2 p-4">
						  	<div class="input-group-prepend">
			                  <label class="input-group-text" for="inputGroupSelect01">Puesto electoral</label>
			                </div>
			                <select class="custom-select" id="inputGroupSelect01" name="nivel" required>

			                  <?php 
			                  	$sql1 = "select * from nivelUser where id_nivel = $u_nivel;";
			                  	$res = $cls->visualizar_datos($sql);
			                  	foreach ($res as $fila) {
			                  	?>

			                  	<option value="<?php echo $fila['id_nivel'] ?>" selected>Choose...</option>

			                  	<?php
			                  	}
			                  

			                    $sql = "select * from nivelUser";
			                    $resultado = $cls->visualizar_datos($sql);

			                    foreach ($resultado as $mostrar) {
			        
			                  ?>
			                  <option value="<?php echo $mostrar['id_nivel'] ?>" >  <?php echo $mostrar['nivel'] ?> </option>
			                  <?php 

			                    }
			                  ?>

			                </select>
						  </div>

						  <input type="text" id="usuario" value="<?php echo $id_user;?>" hidden>


						  <center>
						  	<button id="btn_insertar" class="btn btn-success" type="submit">ACTUALIZAR DATOS</button>&nbsp;  &nbsp; 
						  	<button class="btn btn-warning">
							<a style="text-decoration: none; color: #fff;" href="html_usuarios.php">
							CANCELAR </a>
							</button>
						  </center>
      					

      				</form>
      			</div>
      			</center>
      		</div>
		</div>
	</div>
	</div>


</body>
</html>