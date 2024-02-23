<?php
include_once ("./inc/config.php");
SessionValidator::validateSession();
include_once("./modelos/menu.modelo.php");
include_once("./modelos/ofertaeducativa.modelo.php");
$expediente = $_SESSION["expediente"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Sistema Escolar</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel ="stylesheet" href="css/style.css?v=1">
    <script src='main.js'></script>
</head>
<body>
    <div class="header">
        <?php optionMenu(); ?>
    </div>

    <div class="container-below">
        <h1>Proximamente...</h1>
    
    </div>
    <div class="footer">
        <p>&copy; Sistema Escolar</p>
    </div>
</body>
</html>