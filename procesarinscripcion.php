<?php
    include_once ("./inc/config.php");
    SessionValidator::validateSession();
    include_once("./modelos/menu.modelo.php");
    include_once("./modelos/ofertaeducativa.modelo.php");
    $expediente = $_SESSION["expediente"];
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $materiaInscribir = $_POST["materia"];
        inscribirMateria($expediente, $materiaInscribir);

        header("Location:inscripcion.php");

    }
    

?>