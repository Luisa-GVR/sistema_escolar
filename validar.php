<?php

if (empty($_POST["user"]) || empty($_POST["password"])) {
    header  ("Location:index.php");
}
    print_r ($_POST);
    echo "<br>";

    $SQL = "SELECT * FROM alumno where Expediente = " .$_POST["user"] ." AND Contra = MD5('".$_POST["password"]."');";
    
    echo $SQL;
    echo "<br>";

    $connection = mysqli_connect("localhost:3307","root","", "sistema_escolar") or die("La conexión ha fallado");
    
    $result = mysqli_query($connection, $SQL) or die("La conexión ha fallado");

    if ($result->num_rows == 1){
        echo "Usuario Correcto";
        header  ("Location:menu.php");
    } else{
        header  ("Location:index.php?error=100");
    }
    mysqli_close($connection);

?>