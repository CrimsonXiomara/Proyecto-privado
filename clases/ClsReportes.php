<?php

	include('ClsConex.php');

	/**
	 * 
	 */
	class ClsReportes extends ClsConex
	{
		
		function cantidad_partidos(){
			$sql = "SELECT COUNT(*) as total from partido;";
			$result = $this->exec_query($sql);

			if($result){ 
				foreach ($result as $row) {
					$total = $row['total'];
				}
			}else{
				$total = 0;
			}

			return $total;
		}


		function cantidad_candidatos_departamento($dept){
			$sql = "select count(*) as total from formulario_inscripcion ";
			$sql.= "where id_departamento = $dept";
			$result = $this->exec_query($sql);

			if($result){
				foreach ($result as $row) {
					$total = $row['total'];
				}

			}else{ $total = 0;  }

			return $total;
		}



	}


?>