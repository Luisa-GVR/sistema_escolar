<?php
// Iniciar la sesión
session_start();

// Borrar todas las variables de sesión
$_SESSION = array();

// Finalizar la sesión
session_destroy();
header("Location:index.php");

?>