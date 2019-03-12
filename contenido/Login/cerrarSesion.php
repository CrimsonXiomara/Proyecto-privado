<?php

session_start();

unset($_SESSION['loginUser']);

header("Location:html_login.php");


?>