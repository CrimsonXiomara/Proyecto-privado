<?php

	//Incluimos librería y archivo de conexión
	require '../../clases/PHPExcel.php';
	include('../../clases/ClsReportes.php');


	$clsreport = new ClsReportes();	

		$num = 50 ;


	$fila = 2; //Establecemos en que fila inciara a imprimir los datos
	
	//Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();
	
	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("Scarlet")->setDescription("Reporte por Departamentos");
	
	//Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("Departamentos");
	
	$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(100);
	$objDrawing->setCoordinates('A1');
	$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
	
	$estiloTituloReporte = array(
    'font' => array(
	'name'      => 'Arial',
	'bold'      => true,
	'italic'    => false,
	'strike'    => false,
	'size' =>13
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_NONE
	)
    ),
    'alignment' => array(
	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloTituloColumnas = array(
    'font' => array(
	'name'  => 'Arial',
	'bold'  => true,
	'size' =>10,
	'color' => array(
	'rgb' => 'FFFFFF'
	)
    ),
    'fill' => array(
	'type' => PHPExcel_Style_Fill::FILL_SOLID,
	'color' => array('rgb' => '538DD5')
    ),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
    'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloInformacion = new PHPExcel_Style();
	$estiloInformacion->applyFromArray( array(
    'font' => array(
	'name'  => 'Arial',
	'color' => array(
	'rgb' => '000000'
	)
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
	'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	));
	
	//$objPHPExcel->getActiveSheet()->getStyle('A2:E'.$num)->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->getStyle('A1:F1')->applyFromArray($estiloTituloColumnas);
	
	//$objPHPExcel->getActiveSheet()->setCellValue('B3', 'REPORTE');
	//$objPHPExcel->getActiveSheet()->mergeCells('B3:D3');
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('A1', 'DEPARTAMENTO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
	$objPHPExcel->getActiveSheet()->setCellValue('B1', 'CANDIDATO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(35);
	$objPHPExcel->getActiveSheet()->setCellValue('C1', 'NÚMERO DE IDENTIFICACIÓN');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
	$objPHPExcel->getActiveSheet()->setCellValue('D1', 'PUESTO ELECTORAL');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(35);
	$objPHPExcel->getActiveSheet()->setCellValue('E1', 'PARTIDO PERTENECIENTE');
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('F1', 'FECHA DE TRAMITE');
	
	//Recorremos los resultados de la consulta y los imprimimos


	$sql = "select * from departamento";
	$result = $clsreport->exec_query($sql);
	foreach($result as $row){

			$id_dept = $row['id_dep'];
			$nom_dept= $row['departamento'];
			$candidato_nom = " ";

			$sql1 = "select C.p_nombre, C.s_nombre, C.p_ape, C.s_ape, C.numero_de_identificacion, F.fecha, P.nom_puesto, PA.desc_partido ";
			$sql1.= "from formulario_inscripcion F, candidato C, puesto_electoral P, municipio M, departamento D, partido PA ";
			$sql1.= "where C.id_candidato = F.id_candidato and P.id_puesto_electoral = C.id_puesto and C.id_partido = PA.id_partido ";
			$sql1.= "and F.id_municipio = M.id_municipio and M.id_dep = $id_dept and D.id_dep = M.id_dep";
			$res = $clsreport->exec_query($sql1);
			if($res){
			foreach ($res as $mostrar) {

				$candidato_nom = $mostrar['p_nombre']." ".$mostrar['s_nombre']." ".$mostrar['p_ape']." ".$mostrar['s_ape'];

				$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $nom_dept);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $candidato_nom);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $mostrar['numero_de_identificacion']);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $mostrar['nom_puesto']);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $mostrar['desc_partido']);
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $mostrar['fecha']);
				
				$fila++; //Sumamos 1 para pasar a la siguiente fila

			}//END FOREACH
		}else{ 
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $nom_dept);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, " ");
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, " ");
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, " ");
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, " ");
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, " ");

			$fila++; 

		}//END ELSE

		$fila++; //Sumamos 1 para pasar a la siguiente fila
			
	}//END FOREACH

	
	$fila = $fila-1;
	
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A100:G".$fila);
	
	
	$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

	
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="Reporte_Departamentos.xlsx"');
	header('Cache-Control: max-age=0');
	
	$writer->save('php://output');

?>