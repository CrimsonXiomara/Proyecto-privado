<?php

  require_once("../clases/ClsConex.php");

  $conx = new ClsConex();

session_start();
 
 $usuario_actual = $_SESSION['loginUser']; 

if(isset($_SESSION['loginUser'])){

  $l=0;
}else{
  
  ?>
        <script >
          alert("Tiene que iniciar Sesion para acceder a esta página");
          location.href ="Login/html_login.php";
        </script>

  <?php

  }


  $sql = "select id_nivel from usuario where user='$usuario_actual'";  //Administrador
  $respuesta = $conx->exec_query($sql);

  foreach ($respuesta as $key) {
    $nivel = $key['id_nivel'];
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


	<link rel="stylesheet" type="text/css" href="../css/fondo.css">
</head>
<body>

<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" style="color: white;"><strong>TRIBUNAL SUPREMO ELECTORAL</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


 <?php 
 
 if($nivel == 1){ //NIVEL ADMINISTRADOR

 ?> 
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item" routerLinkActive="active">
          <a class="nav-link" href="#" >Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item" routerLinkActive="active"> 
          <a class="nav-link" href="Formulario-inscripcion/html_formularioA.php">Administrar Usuarios</a>
        </li>
        <li class="nav-item" routerLinkActive="active">
            <a class="nav-link" href="#">Reportes</a>
          </li>
            <li class="nav-item" routerLinkActive="active">
            <a class="nav-link" href="#">Configuración</a>
          </li>

<?php 
    }// CIERRE IF DE NIVEL ADMINISTRADOR

    if($nivel == 2){// NIVEL EMPLEADO
 ?>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item" routerLinkActive="active">
          <a class="nav-link" href="#" >Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item" routerLinkActive="active"> 
          <a class="nav-link" href="Formulario-inscripcion/html_formularioE.php">Inscripcion</a>
        </li>
        <li class="nav-item" routerLinkActive="active">
            <a class="nav-link" href="#">Documentación</a>
          </li>
            <li class="nav-item" routerLinkActive="active">
            <a class="nav-link" href="#">Reportes</a>
          </li>
          <li class="nav-item" routerLinkActive="active">
            <a class="nav-link" href="Usuarios/html_user.php">Usuarios</a>
          </li>


 <?php 
    } // CIERRE IF DE NIVEL EMPLEADO

    if($nivel == 3){ //NIVEL CANDIDATO

 ?>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item" routerLinkActive="active">
          <a class="nav-link" href="../principal.php">Inicio </a>
        </li>
        <li class="nav-item" routerLinkActive="active"> 
          <a class="nav-link" href="Formulario-inscripcion/html_formularioC.php">Inscripcion<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item" routerLinkActive="active">
          <a class="nav-link" href="#">Documentación</a>
        </li>


 <?php 
  
  } // CIERRE IF DE NIVLE CANDIDATO

 ?>

       </ul>
      <div class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" hidden>
        <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href = 'login/cerrarSesion.php'">Cerrar Sesión</button>
      </div>
    </div>
  </nav>
</header>

</body>
</html>