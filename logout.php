<?php 

session_start();
unset($_SESSION["login"]);

header("Location: login1.php");
exit;



?>