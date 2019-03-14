<?php
class ClsConex{

	var $servidor = "localhost";
	var $base_datos= "proyectotse";
	var $usuario = "root";
	var $contrasena = "";
	var $conn;
	
	function getConexion(){
		$servidor = $this->servidor;
		$base_datos = $this->base_datos;
		$usuario = $this->usuario;
		$contrasena = $this->contrasena;
		
		$conexion = new PDO("mysql:host=$servidor; dbname=$base_datos; protocol=onsoctcp; EnablescrollableCursors=1;", $usuario, $contrasena);
		$conexion->exec("set names utf8");
		
		if($conexion){
			$this->conn = $conexion;

			}else{
			return false;
		}
	}


function exec_query($sql){
		$this->getConexion();
		$conn = $this->conn;
		
		if($conn){
			$result = $conn->query($sql);
			if($result){
				$x = 0;
				while($row = $result->fetch(PDO::FETCH_ASSOC)){
					$result_array[$x] = $row;
					$x++;
				}
				if($x > 0){
					return $result_array;
				}
                }else{
				return false;
			}
            }else{
			return "!E";
		}
	}
	
	function exec_sql($sql){
		$this->getConexion();
		$conn = $this->conn;
		if($conn){
			$conn->beginTransaction();
			$result = $conn->exec($sql);
			if($result === 1){	
				$conn->commit();
				return $result;
				}else{
				$conn->rollBack();
				return $result;
			}
            }else{
			return 0;
		}
	}


	function visualizar_datos($sql){
		$this->getConexion();
		$conn = $this->conn;
		if($conn){

			$result = $conn->query($sql);
			$arrayDatos = $result->fetchAll(PDO::FETCH_ASSOC);

			return $arrayDatos;

		}
	}



}
	
?>