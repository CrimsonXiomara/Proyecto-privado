<?php 

	require_once("../../../clases/ClsUsuarios.php");

	$cls = new ClsUser();

	$usuario = $_POST['user'];
	$clave   = $_POST['psw'];
	$nivel   = $_POST['niv'];
	$id_user = $_POST['idu'];
	$mensaje = " ";



	if(($usuario != "") && ($clave != ""))//CAMPOS VACIOS
	{

		if(!ctype_alpha($usuario))
			{
				$mensaje = 2;
			}else
			{
					$sql = "update usuario set user = '$usuario', psw = '$clave', id_nivel = $nivel where id_user = $id_user; ";
					$result = $cls->exec_sql($sql);

					if($result){
						$mensaje = "INFORMACIÓN ACTUALIZADA";
							if($nivel == 1){
								session_start();
								unset($_SESSION['loginUser']);
								$_SESSION['loginUser'] = $usuario;
							}

					
					}else{
						$mensaje = "NO SE ACTUALIZO LA INFORMACIÓN";
					}

			}//END ELSE




	}else//End If VERFICAR CAMPOS VACIOS
	{
		$mensaje = 1;
	}


	echo $mensaje;



	

?>