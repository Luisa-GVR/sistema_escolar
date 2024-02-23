<?php

//Archivo de config para localhost

$HOST = "localhost";

$USER = "root";

$PSWD = "";

$NAMEBD = "sistema_escolar";


class SessionValidator {
    public static function validateSession() {
        session_start();
        if (!isset($_SESSION["validada"]) || $_SESSION["validada"] !== 1) {
            header("Location: index.php");
            exit;
        }
    }
}

?>
