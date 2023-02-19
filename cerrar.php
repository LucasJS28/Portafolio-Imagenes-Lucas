<?php
//Cierra la Sesion y Redirige al Login
session_start();
session_destroy();
header("Location:login.php");
?>
