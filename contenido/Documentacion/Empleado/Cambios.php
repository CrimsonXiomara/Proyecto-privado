<?php

  

  include("../../../clases/ClsverForms.php");

  //RECIBIR VARIABLES
  $revisar = $_POST['revisar'];
  $com     = $_POST['completo'];
  $incom   = $_POST['incompleto'];


  if($revisar == 1){ echo filtro_revisar(5); }
  if($com == 1){ echo filtro_completo(1); }
  if($incom == 1){ echo filtro_incompleto(2); }


  



function filtro_revisar($estado){

      $clsver = new ClsverForms();  

  	  $aux = 0;
      $html_total = "";
      $sql = "select C.p_nombre, C.s_nombre, C.p_ape, T.id_tramite, E.desc_estado, M.fecha, P.desc_partido, M.id_formulario ";
      $sql.= "from tramite T, estados E, formulario_inscripcion M, candidato C, partido P ";
      $sql.= "where T.id_estado = $estado and T.id_estado = E.id_estado and T.id_formulario = M.id_formulario ";
      $sql.= "and M.id_candidato = C.id_candidato and C.id_partido = P.id_partido;";
      $result = $clsver->visualizar_datos($sql);

      foreach ($result as $mostrar) {

        $cantidad = $clsver->cant_documentos($mostrar['id_tramite']);
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
        $html.= "<a href='recibir.php?id=".$mostrar['id_tramite']."' >";
        $html.= "<button class='btn btn-secondary'> Recibir </button>";
        $html.= "</a>";
        $html.= "</div>";
        $html.= "</td>";
        $html.= "</tr>";

        $html_total.= $html;

      }

      if(empty($result)){ 

        $html = "<tr>";
        $html.= "<td> NO </td>";
        $html.= "<td> HAY </td>";
        $html.= "<td> INSCRIPCIONES </td>";
        $html.= "<td> PENDIENTES </td>";
        $html.= "<td> POR </td>";
        $html.= "<td> REVISAR </td>";
        $html.= "</tr>";

        $html_total = $html;  }

      return $html_total;
  }

  function filtro_completo($estado){

      $clsver = new ClsverForms();  

      $aux = 0;
      $html_total = "";
      $sql = "select C.p_nombre, C.s_nombre, C.p_ape, T.id_tramite, E.desc_estado, M.fecha, P.desc_partido, M.id_formulario, C.id_candidato ";
      $sql.= "from tramite T, estados E, formulario_inscripcion M, candidato C, partido P ";
      $sql.= "where T.id_estado = $estado and T.id_estado = E.id_estado and T.id_formulario = M.id_formulario ";
      $sql.= "and M.id_candidato = C.id_candidato and C.id_partido = P.id_partido;";
      $result = $clsver->visualizar_datos($sql);

      foreach ($result as $mostrar) {

        $cantidad = $clsver->cant_documentos($mostrar['id_tramite']);
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
        $html.= "<button class='btn btn-success'  value=".$mostrar['id_tramite']."> Aceptar </button> &nbsp; &nbsp;";
        $html.= "<button class='btn btn-info'    id=details'>";
        $html.= "<a style='text-decoration: none; color: white;' href='verpdf.php?id=".$mostrar['id_candidato']."' >";
        $html.= "Ver PDF";
        $html.= " </a> ";
        $html.= "</button> ";
        $html.= "</div>";
        $html.= "</td>";
        $html.= "</tr>";

        $html_total.= $html;

      }

      if(empty($result)){ 

        $html = "<tr>";
        $html.= "<td> NO </td>";
        $html.= "<td> HAY </td>";
        $html.= "<td> INSCRIPCIONES </td>";
        $html.= "<td> COMPLETAS </td>";
        $html.= "<td> POR </td>";
        $html.= "<td> ACEPTAR </td>";
        $html.= "</tr>";

        $html_total = $html;  }


      return $html_total;
  }


  function filtro_incompleto($estado){

      $clsver = new ClsverForms();  

      $aux = 0;
      $html_total = "";
      $sql = "select C.p_nombre, C.s_nombre, C.p_ape, T.id_tramite, E.desc_estado, M.fecha, P.desc_partido, M.id_formulario ";
      $sql.= "from tramite T, estados E, formulario_inscripcion M, candidato C, partido P ";
      $sql.= "where T.id_estado = $estado and T.id_estado = E.id_estado and T.id_formulario = M.id_formulario ";
      $sql.= "and M.id_candidato = C.id_candidato and C.id_partido = P.id_partido;";
      $result = $clsver->visualizar_datos($sql);

      foreach ($result as $mostrar) {

        $cantidad = $clsver->cant_documentos($mostrar['id_tramite']);
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
        $html.= "<button class='btn btn-info'    id=details'>";
        $html.= "<a style='text-decoration: none; color: white;' href='detallesE.php?id=".$mostrar['id_tramite']."' >";
        $html.= "Detalles";
        $html.= " </a> ";
        $html.= "</button> ";
        $html.= "</div>";
        $html.= "</td>";
        $html.= "</tr>";

        $html_total.= $html;

      }


      if(empty($result)){ 

        $html = "<tr>";
        $html.= "<td></td>";
        $html.= "<td></td>";
        $html.= "<td> NO </td>";
        $html.= "<td> HAY </td>";
        $html.= "<td> INSCRIPCIONES </td>";
        $html.= "<td> INCOMPLETAS </td>";
        $html.= "</tr>";

        $html_total = $html;  }

      return $html_total;
  }


  ?>