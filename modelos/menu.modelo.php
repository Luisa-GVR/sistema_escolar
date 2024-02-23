<?php
    function optionMenu(){
        echo "
            <table class='menu-table'>
                <tr>
                    <th><a href='menu.php'>Inicio</a></th>
                    <th><a href='ofertaeducativa.php'>Oferta Educativa</a></th>
                    <th><a href='inscripcion.php'>Inscribirme</a></th>
                    <th><a href='kardex.php'>Kardex</a></th>
                    <th><a href='bajas.php'>Bajas</a></th>
                    <th>idiomas</th>
                    <th>adeudos</th>
                    <th><a href='logout.php'>Salir</a></th>
                </tr>
            </table>";
    }

    function encabezado($nombreCompleto){
        echo "<h1> Bienvenido, " . $nombreCompleto . "</h1>";
    }
?>