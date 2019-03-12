<?php

session_start();
if(isset($_SESSION['loginUser'])){
	?>
				<script >
					location.href ="../principal.php";
				</script>		
	<?php

}else{
	$l = 0;
}




?>
<!DOCTYPE html>
<html>
<head>
	<title>TSE Login</title>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body>
	 <div class="loginbox">
    <img src="../../img/user.png" class="avatar">
        <h1>Login Here</h1>
        <form method="get" action="Log.php">
            <p>Username</p>
            <input type="text" name="user" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="clave1" placeholder="Enter Password">
            <input class="btn" type="submit" onclick="location.href = '../principal.php'" name="contraseña" value="Login">
            <a href="#">Lost your password?</a><br>
        </form>
    </div>
</body>
</html>