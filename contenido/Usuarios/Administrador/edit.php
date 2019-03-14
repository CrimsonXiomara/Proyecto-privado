<?php 

	require_once("../../../clases/ClsUsuarios.php");

	$cls = new ClsUser();

	$usuario = $_POST['user'];
	$clave   = $_POST['psw'];
	$nivel   = $_POST['niv'];
	$id_user = $_POST['idu'];
	$mensaje = " ";


	$sql = "update usuario set user = '$usuario', psw = '$clave', id_nivel = $nivel where id_user = $id_user; ";
	$result = $cls->exec_sql($sql);

	if($result){
		$mensaje = "INFORMACIÓN ACTUALIZADA";

		echo $mensaje;
	
	}else{
		$mensaje = "NO SE ACTUALIZO LA INFORMACIÓN";

		echo $mensaje;
	}



	

?>