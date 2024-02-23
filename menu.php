<?php
include_once ("./inc/config.php");
SessionValidator::validateSession();
include_once("./modelos/menu.modelo.php");

$expediente = $_SESSION["expediente"];
$query = "SELECT Nombre, Apellido1, Apellido2 FROM alumno WHERE Expediente = '$expediente'";
$connection = mysqli_connect($HOST, $USER, $PSWD, $NAMEBD) or die("Hubo un fallo en la conexion");
$result = mysqli_query($connection, $query) or die("No se pudo realizar la consulta");

if ($result && mysqli_num_rows($result) > 0) {
    $alumno = mysqli_fetch_assoc($result);
    $nombre = $alumno["Nombre"];
    $apellido1 = $alumno["Apellido1"];
    $apellido2 = $alumno["Apellido2"];
} else {
    $nombre = "Nombre no encontrado";
    $apellido1 = "Apellido1 no encontrado";
    $apellido2 = "Apellido2 no encontrado";
}

$nombreCompleto = $nombre . " " . $apellido1 . " " . $apellido2;
mysqli_close($connection);

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
            <?php encabezado($nombreCompleto); ?>

    </div>

    <div class="footer">
        <p>&copy; Sistema Escolar</p>
    </div>
</body>
</html>