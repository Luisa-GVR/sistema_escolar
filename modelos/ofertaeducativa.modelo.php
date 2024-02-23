<?php
include_once ("./inc/config.php");

function todasLasCarreras($expediente) {
    global $HOST, $USER, $PSWD, $NAMEBD;

    $query = "SELECT m.NombreMateria
              FROM materia m
              INNER JOIN carreramateria cm ON m.IDMateria = cm.IDMateria
              INNER JOIN alumno a ON cm.IDCarrera = a.IDCarrera
              WHERE a.Expediente = '$expediente'";

    $connection = mysqli_connect($HOST, $USER, $PSWD, $NAMEBD) or die("Hubo un fallo en la conexion");
    $result = mysqli_query($connection, $query) or die("No se pudo realizar la consulta");

    $materias = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $materias[] = $row['NombreMateria'];
    }

    mysqli_close($connection);

    return $materias;
}

function materiasAcreditadas($expediente){
    global $HOST, $USER, $PSWD, $NAMEBD;

    $query = "SELECT m.NombreMateria, k.Calificacion
            FROM materia m
            INNER JOIN kardex k ON m.IDMateria = k.IDMateria
            WHERE k.Expediente = '$expediente' AND k.acreditada = 1;
            ";

    $connection = mysqli_connect($HOST, $USER, $PSWD, $NAMEBD) or die("Hubo un fallo en la conexion");
    $result = mysqli_query($connection, $query) or die("No se pudo realizar la consulta");

    $materiasAcreditadas = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $materiasAcreditadas[] = array(
            'NombreMateria' => $row['NombreMateria'],
            'Calificacion' => $row['Calificacion']
        );
    }

    mysqli_close($connection);

    return $materiasAcreditadas;

}

function materiasInscritas($expediente){
    global $HOST, $USER, $PSWD, $NAMEBD;

    $query = "SELECT m.NombreMateria
            FROM materia m
            INNER JOIN kardex k ON m.IDMateria = k.IDMateria
            WHERE k.Expediente = '$expediente' AND k.acreditada = 0;
            ";

    $connection = mysqli_connect($HOST, $USER, $PSWD, $NAMEBD) or die("Hubo un fallo en la conexion");
    $result = mysqli_query($connection, $query) or die("No se pudo realizar la consulta");

    $materiasAcreditadas = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $materiasAcreditadas[] = array(
            'NombreMateria' => $row['NombreMateria'],
        );
    }

    mysqli_close($connection);

    return $materiasAcreditadas;

}

function obtenerCarrera($expediente){
    global $HOST, $USER, $PSWD, $NAMEBD;

    $query = "SELECT c.NombreCarrera
            FROM carreras c
            INNER JOIN alumno a ON c.IDCarrera = a.IDCarrera
            WHERE a.Expediente = '$expediente';
            ";

    $connection = mysqli_connect($HOST, $USER, $PSWD, $NAMEBD) or die("Hubo un fallo en la conexion");
    $result = mysqli_query($connection, $query) or die("No se pudo realizar la consulta");

    $row = mysqli_fetch_assoc($result);
    $nombreCarrera = $row ? $row['NombreCarrera'] : '';

    mysqli_close($connection);

    return $nombreCarrera;
}


function obtenerMateriasDisponibles($expediente) {
    $materiasCarrera = todasLasCarreras($expediente);
    
    $materiasAcreditadas = materiasAcreditadas($expediente);
    $materiasInscritas = materiasInscritas($expediente);
    
    $materiasDisponibles = array_diff($materiasCarrera, array_column($materiasAcreditadas, 'NombreMateria'), array_column($materiasInscritas, 'NombreMateria'));
    
    return $materiasDisponibles;
}

function inscribirMateria($expediente, $materiaInscribir) {
    global $HOST, $USER, $PSWD, $NAMEBD;

    $query_id_materia = "SELECT IDMateria FROM materia WHERE NombreMateria = '$materiaInscribir'";

    $connection = mysqli_connect($HOST, $USER, $PSWD, $NAMEBD) or die("Hubo un fallo en la conexion");
    $result_id_materia = mysqli_query($connection, $query_id_materia) or die("No se pudo realizar la consulta");
    
    $row_id_materia = mysqli_fetch_assoc($result_id_materia);
    $idMateria = $row_id_materia['IDMateria'];

    $query_insert = "INSERT INTO kardex (Expediente, IDMateria, Acreditada, Calificacion) 
                     VALUES ('$expediente', '$idMateria', 0, NULL)";
    $result_insert = mysqli_query($connection, $query_insert) or die("No se pudo realizar la inserción");

    mysqli_close($connection);
}


?>
