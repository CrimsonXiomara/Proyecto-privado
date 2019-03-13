<?php 
require_once("../../../clases/ClsverForms.php");

	$cls = new ClsverForms();

	$id_r = $_GET['id'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>PDF</title>
</head>
<body>
		<?php 

			$ruta = '../../../pdf/'.$id_r;

			if(file_exists($ruta)){
				$directorio = opendir($ruta);
				while($arch = readdir($directorio))
				{
					if(!is_dir($arch))
					{
						$arch_b = $ruta."/".$arch;
						header('content-type: application/pdf');
						readfile($arch_b);

					}
				}
			}


		?>
</body>
</html>