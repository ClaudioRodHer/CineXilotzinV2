<?php
session_start();
//cerrar session en todo
session_destroy();
header("location: ../../Login/Login.php");
?>