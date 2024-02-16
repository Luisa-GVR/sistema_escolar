<?php
    include ("./inc/config.php");

    if (empty($_POST["user"]) || empty($_POST["password"])) {
        header  ("Location:index.php");
    }
    
    $expediente = $_POST["user"];

    $contrasenia = $_POST["password"];
    
    if(!empty($expediente || $contrasenia)){
        $query = "SELECT * FROM alumno WHERE Expediente = $expediente AND Contra = "  
        . "MD5(" . "'" . $contrasenia . "'" . ");";

        $connection = mysqli_connect($HOST, $USER, $PSWD, $NAMEBD) or die("Hubo un fallo en la conexion");

        $result = mysqli_query($connection, $query) or die("No me conecté");


        if($result ->num_rows == 1 ){
            session_start();
    
            $_SESSION["validada"] = 1;
            $_SESSION["expediente"] = $expediente;
               
            header("Location:menu.php");
    
        }else{
            header("Location:index.php?error=100");
        
        }

        mysqli_close($connection);
    
    }else{
        header("Location:index.php?error=200");
    }

    

?>