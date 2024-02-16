<?php
session_start();
if (!isset($_SESSION["validada"]) || $_SESSION["validada"] !== 1) {
    header("Location: index.php");
    exit;
}

include ("./inc/config.php");
$expediente = $_SESSION["expediente"];
$query = "SELECT Nombre, Apellido1, Apellido2 FROM alumno WHERE Expediente = '$expediente'";
$connection = mysqli_connect($HOST, $USER, $PSWD, $NAMEBD) or die("Hubo un fallo en la conexion");
$result = mysqli_query($connection, $query) or die("No se pudo realizar la consulta");

if($result && mysqli_num_rows($result) > 0) {
    $alumno = mysqli_fetch_assoc($result);
    $nombre = $alumno["Nombre"];
    $apellido1 = $alumno["Apellido1"];
    $apellido2 = $alumno["Apellido2"];
} else {
    $nombre = "Nombre no encontrado";
    $apellido1 = "Apellido1 no encontrado";
    $apellido2 = "Apellido2 no encontrado";
}


mysqli_close($connection);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel ="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header">
        <?php echo "<h1> Bienvenido,  $nombre $apellido1 $apellido2 </h1>"; ?>    
    </div>

    <div class="form-group">
      <ul>
        <li>materias</li>
        <li>cursos</li>
        <li>kardex</li>
        <li>calificaciones</li>
        <li>idiomas</li>
        <li>adeudos</li>
    </ul>  
    </div>
    

    <a href="logout.php">Log out</a>

    <div class="footer">
        <p>&copy; Sistema Escolar</p>
    </div>
</body>
</html>