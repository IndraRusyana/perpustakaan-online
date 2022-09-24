<?php 

session_start();
unset($_SESSION["loginadmin"]);

header("Location: loginadmin.php");
exit;



?>