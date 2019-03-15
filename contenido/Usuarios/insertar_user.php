<?php

	include("../../clases/ClsUsuarios.php");
	header("Content-Type: text/html;charset=utf-8");

	$conexion = new ClsUser();


	//OTROS
	$answer = " ";


	//RECEPTOR DE DATOS
	$user =     $_POST["user"];
	$pass =     $_POST["psw"];
	$partido =  $_POST["partido"];


	if(($user != "") && ($pass != "") && ($partido != "") )//CAMPOS VACIOS
	{

			if(!ctype_alpha($user))
			{
				$answer = $conexion->Alerta_danger("  EL NOMBRE DEL USUARIO NO PUEDE CONTENER NUMEROS.");
			}else if(!ctype_alpha($partido))
			{
				$answer = $conexion->Alerta_danger("  EL NOMBRE DEL PARTIDO NO PUEDE CONTENER NUMEROS.");
			}else
			{

					//VERIFICAR EXISTENCIA DEL PARTIDO
					$sql = "select id_partido from partido where desc_partido = '$partido'";
					$result = $conexion->visualizar_datos($sql);

					if ($result) {
						$answer = $conexion->Alerta_danger("  EL PARTIDO YA EXISTE."); 
					}else{ 

							$sql  = "insert into usuario(id_nivel, user, psw) values (3, '$user', '$pass')";
							$respuesta = $conexion->exec_sql($sql);

							$sql = "select max(id_user) as id from usuario";
							$result = $conexion->visualizar_datos($sql);

							foreach ($result as $mostrar) {
								$id_usuario_creado = $mostrar['id'];
							}


							$sql2 = "insert into partido(desc_partido, id_usuario) values('$partido', '$id_usuario_creado')";
							$result = $conexion->exec_sql($sql2);

							if ($result === 1) {
								$answer = $conexion->Alerta_success("  USUARIO CREADO"); 
							}else{ 
								$answer = $conexion->Alerta_danger("  NO SE CREO USUARIO. VERIFIQUE LOS DATOS QUE QUIERE INGRESAR"); 
							}

				}






			}//END ELSE




	}else//End If VERFICAR CAMPOS VACIOS
	{
		$answer = $conexion->Alerta_danger("  NO PUEDE DEJAR NINGUN CAMPO VACIO.");
	}


	
	echo $answer;



?>