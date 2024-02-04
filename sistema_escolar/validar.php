<?php
    print_r ($_POST);
    echo $_POST["user"];
    echo "<br>";
    $SQL = "SELECT * FROM alumno where Expediente = " .$_POST["user"] ." AND Contra = MD5('".$_POST["pswd"]."');";
    echo $SQL;

    echo "<br>";


    $connection = mysqli_connect("localhost:3309","root","", "sistema_escolar") or die("La conexión ha fallado");
    echo "<br>:3";
    
    $result = mysqli_query($connection, $SQL) or die("La conexión ha fallado");
    echo ("<br>:3 <br>"); 

    print_r ($result);
?>