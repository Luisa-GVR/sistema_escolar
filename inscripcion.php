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
  
        <h1>Materias Inscritas</h1>
        <h3> <?php echo obtenerCarrera($expediente); ?> </h3>

        <h2>Solo puedes inscribirte a 3 materias</h2>

        <?php
            $materiasInscritas = materiasInscritas($expediente);

            if (!empty($materiasInscritas)) {
                echo "<ul>";
                foreach ($materiasInscritas as $materia) {
                    echo "<li>{$materia['NombreMateria']}</li>";
                }
                echo "</ul>";
            } else {
                echo "<h1>El alumno no esta inscrito en ninguna materia</h1>";
            }
        ?>

    <?php
    $cantidadMateriasInscritas = count(materiasInscritas($expediente));

    //maximo 3 materias
    $permitirInscripcion = $cantidadMateriasInscritas < 3;
    ?>

    <form action="procesarinscripcion.php" method="post">
        <select name="materia">
            <?php
            $materiasDisponibles = obtenerMateriasDisponibles($expediente);
            if (!empty($materiasDisponibles)) {
                foreach($materiasDisponibles as $materia) {
                    echo "<option value='$materia'>$materia</option>";
                }
            } else {
                echo "<option value='' disabled>No hay materias disponibles</option>";
            }
            ?>
        </select>
        <?php
        if ($permitirInscripcion) {
            echo "<button type='submit'>Inscribirse</button>";
        } else {
            echo "<button type='submit' disabled>Inscribirse</button>";
            echo "<p>Ya tienes inscritas 3 materias. No puedes inscribir más.</p>";
        }
        ?>
    </form>


    </div>
    <div class="footer">
        <p>&copy; Sistema Escolar</p>
    </div>
</body>
</html>