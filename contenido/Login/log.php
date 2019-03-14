<?php
	
	require_once("../../clases/ClsConex.php");

	$conx = new ClsConex();	

	$user = $_GET['user'];
	$pass = $_GET['clave1'];

	$sql = "select * from usuario where user='$user' and psw='$pass' and id_nivel = 1";  //Administrador
	$respuesta = $conx->exec_query($sql);


	$sql1 = "select * from usuario where user='$user' and psw='$pass' and id_nivel = 2"; //Empleado
	$respuesta2 = $conx->exec_query($sql1);

	$sql2 = "select * from usuario where user='$user' and psw='$pass' and id_nivel = 3"; //Partido o Candidato
	$respuesta3 = $conx->exec_query($sql2);

	

	


	if($respuesta >= 1 ){


		session_start();
		$_SESSION['loginUser'] = $user;




				?>
		
				<script >
					location.href ="../principal.php";
				</script>

	<?php

	}else{


					if($respuesta2 >= 1 ){

						session_start();
						$_SESSION['loginUser'] = $user;
								?>
						
								<script >
									location.href ="../principal.php";
								</script>

					<?php

					}else{


										if($respuesta3 >= 1 ){

											session_start();
											$_SESSION['loginUser'] = $user;
													?>
											
													<script >
														location.href ="../principal.php";
													</script>

										<?php

										}else{


		?>
		<script >
			alert("Contraseña/Usuario Incorrecto");
			location.href ="html_login.php";
		</script>


		<?php

		}
	}
}

?>