<?php 


	include("../../../clases/ClsverForms.php");

	$clsver = new ClsverForms();


	$search = $_POST['search'];
	$html_total = "";
	$aux = 0;



	if(!empty($search)){

		$sql = "select C.p_nombre, C.s_nombre, C.p_ape, T.id_tramite, E.desc_estado, E.id_estado, M.fecha, P.desc_partido, M.id_formulario, C.id_candidato ";
		$sql.= "from tramite T, estados E, formulario_inscripcion M, candidato C, partido P ";
		$sql.= "where P.desc_partido like '$search%' and C.id_partido = P.id_partido and M.id_candidato = C.id_candidato ";
		$sql.= "and T.id_formulario = M.id_formulario and E.id_estado = T.id_estado;";
		$result = $clsver->visualizar_datos($sql);

		foreach ($result as $mostrar) {

		$estado = $mostrar['id_estado'];
		$cantidad = $clsver->cant_documentos($mostrar['id_tramite']);
        $cant_rq  = $clsver->cant_doc_requisitos();

                    if($estado == 1){//COMPLETO

                    $aux = $aux + 1;
                    $html = "<tr>";
                    $html.= "<td>".$aux."</td>";
                    $html.= "<td>".$mostrar['p_nombre']." ".$mostrar['s_nombre']." ".$mostrar['p_ape']."</td>";
                    $html.= "<td>".$mostrar['desc_partido']."</td>";
                    $html.= "<td>".$mostrar['desc_estado']."</td>";
                    $html.= "<td>".$mostrar['fecha']."</td>";
                    $html.= "<td>".$cantidad."/".$cant_rq." </td>";
                    $html.= "<td>";
                    $html.= "<div class='form-group'>";
                    $html.= "<button class='btn btn-success'  value=".$mostrar['id_tramite']."> Aceptar </button> &nbsp;";
                    $html.= "<button class='btn btn-info'    id=details'>";
                    $html.= "<a style='text-decoration: none; color: white;' href='verpdf.php?id=".$mostrar['id_candidato']."' >";
                    $html.= "Ver PDF";
                    $html.= " </a> ";
                    $html.= "</button> ";
                    $html.= "</div>";
                    $html.= "</td>";
                    $html.= "</tr>";

                    }


                    if($estado == 5 ){//COLA

                    $aux = $aux + 1;
                    $html = "<tr>";
                    $html.= "<td>".$aux."</td>";
                    $html.= "<td>".$mostrar['p_nombre']." ".$mostrar['s_nombre']." ".$mostrar['p_ape']."</td>";
                    $html.= "<td>".$mostrar['desc_partido']."</td>";
                    $html.= "<td>".$mostrar['desc_estado']."</td>";
                    $html.= "<td>".$mostrar['fecha']."</td>";
                    $html.= "<td>".$cantidad."/".$cant_rq." </td>";
                    $html.= "<td>";
                    $html.= "<div class='form-group'>";
                    $html.= "<a href='recibir.php?id=".$mostrar['id_tramite']."' >";
                    $html.= "<button class='btn btn-secondary'> Recibir </button>";
                    $html.= "</a>";
                    $html.= "</div>";
                    $html.= "</td>";
                    $html.= "</tr>";
                    }

                    if($estado == 2 ){//INCOMPLETO

                    $aux = $aux + 1;
                    $html = "<tr>";
                    $html.= "<td>".$aux."</td>";
                    $html.= "<td>".$mostrar['p_nombre']." ".$mostrar['s_nombre']." ".$mostrar['p_ape']."</td>";
                    $html.= "<td>".$mostrar['desc_partido']."</td>";
                    $html.= "<td>".$mostrar['desc_estado']."</td>";
                    $html.= "<td>".$mostrar['fecha']."</td>";
                    $html.= "<td>".$cantidad."/".$cant_rq." </td>";
                    $html.= "<td>";
                    $html.= "<div class='form-group'>";
                    $html.= "<button class='btn btn-info'    id=details'>";
                    $html.= "<a style='text-decoration: none; color: white;' href='detalles.php?id=".$mostrar['id_tramite']."' >";
                    $html.= "Detalles";
                    $html.= " </a> ";
                    $html.= "</button> ";
                    $html.= "</div>";
                    $html.= "</td>";
                    $html.= "</tr>";

                    }



                    $html_total.= $html;




                }//END FOREACH
	

        echo $html_total;




	}else{

		$sql = "select C.p_nombre, C.s_nombre, C.p_ape, T.id_tramite, E.desc_estado, M.fecha, P.desc_partido, M.id_formulario ";
        $sql.= "from tramite T, estados E, formulario_inscripcion M, candidato C, partido P ";
        $sql.= "where T.id_estado = 5 and T.id_estado = E.id_estado and T.id_formulario = M.id_formulario ";
        $sql.= "and M.id_candidato = C.id_candidato and C.id_partido = P.id_partido;";
		$result = $clsver->visualizar_datos($sql);

		foreach ($result as $mostrar) {

		$cantidad = $clsver->cant_documentos($mostrar['id_formulario']);
        $cant_rq  = $clsver->cant_doc_requisitos();

		$aux = $aux + 1;
                $html = "<tr>";
                $html.= "<td>".$aux."</td>";
                $html.= "<td>".$mostrar['p_nombre']." ".$mostrar['s_nombre']." ".$mostrar['p_ape']."</td>";
                $html.= "<td>".$mostrar['desc_partido']."</td>";
                $html.= "<td>".$mostrar['desc_estado']."</td>";
                $html.= "<td>".$mostrar['fecha']."</td>";
                $html.= "<td>".$cantidad."/".$cant_rq." </td>";
                $html.= "<td>";
                $html.= "<div class='form-group'>";
                $html.= "<a href='recibir.php?id=".$mostrar['id_tramite']."'>";
                $html.= "<button class='btn btn-secondary'> Recibir </button>";
                $html.= "</a> ";
                $html.= "</div>";
                $html.= "</td>";
                $html.= "</tr>";


                $html_total.= $html;
            }
            echo $html_total;

	}//end if 


?>