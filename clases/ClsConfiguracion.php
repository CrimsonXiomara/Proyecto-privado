<?php 

	include('ClsConex.php');

	/**
	 * 
	 */
	class ClsConfig extends ClsConex
	{
		
				function Alerta_success($mensaje){
					$html = "<div class='alert alert-success alert-dismissible fade show' role='alert' id='alerta_creado'>";
					$html.= "<strong>Success!</strong>".$mensaje;
					$html.= "<button type='button' class='close' data-dismiss='alert' aria-label='Close>";
					$html.= "<span aria-hidden='true'>&times;</span>";
					$html.= "</button>";
					$html.= "</div>";

					return $html;

				}

				function Alerta_danger($mensaje){
					$html = "<div class='alert alert-danger alert-dismissible fade show' role='alert' id='alerta_creado'>";
					$html.= "<strong>ERROR!</strong>".$mensaje;
					$html.= "<button type='button' class='close' data-dismiss='alert' aria-label='Close>";
					$html.= "<span aria-hidden='true'>&times;</span>";
					$html.= "</button>";
					$html.= "</div>";

					return $html;
				}
	}

?>