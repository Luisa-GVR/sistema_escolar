<!DOCTYPE html>
<html>


<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Sistema Escolar</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel ="stylesheet" href="css/style.css?v=1">
    <script src='main.js'></script>
</head>
<body class="body-index">
<div class="header">
        <h1>Sistema escolar cool</h1>
</div>
    
    <div class="container">
    <p class="texto-bienvenida border-bottom"> Entrar al portal de alumnos </p>
        <form action="validar.php" method="POST">
            <div class="form-group">
                <label for="user">Matrícula:</label>
                <div class="input-wrapper">
                    <input type="number" name="user" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <div class="input-wrapper">
                    <input type="password" name="password" required>
                </div>
            </div>
            <button type="submit">Iniciar Sesión</button>
        </form>
    <?php

    //validamos el warning
    if (!empty($_GET["error"]) && $_GET["error"] == 100) {
        echo "<p class='error-message'>Hubo un problema en el acceso</p>";
    }


    
    ?>
        </div>
        <div class="footer">
            &copy; Sistema escolar cool
    </div>
</body>
</html>