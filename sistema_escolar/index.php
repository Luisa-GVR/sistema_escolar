<!DOCTYPE html>
<html>
<style>
    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: calc(20%);
    }
</style>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Sistema Escolar</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <h1>Sistema escolar</h1>
    <form action="validar.php" method="POST">
        <div class="form-group">
            <label for="user">Matricula:</label>
            <input type="number" name="user" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="" required>
        </div>
        <button type="submit">Submit</button>
    </form>
    <?php

    //validamos el warning
    if (!empty($_GET["error"]) && $_GET["error"] == 100) {
        echo "Hubo un problema en el acceso";
    }
    
    ?>
</body>
</html>