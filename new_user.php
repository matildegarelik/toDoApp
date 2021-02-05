<?php
session_start();

?>

<html>
    <head>
        <title>toDoApp - Register</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="utf-8">
    </head>
    <body>
        <header>
            <div class="logo">&ltto do app&gt</div>
            <h1>Registrarte</h1>
        </header>
        <div class="register-form">
            <form method="POST">
                <label for="nombre">Nombre</label><br>
                <input id="nombre" name="nombre" type="text" placeholder="e.g. Miranda" required/><br><br>
                <label for="apellido">Apellido</label><br>
                <input id="apellido" name="apellido" type="text" placeholder="e.g. Ruiz" required/><br><br>
                <label for="email">Correo electrónico</label><br>
                <input id="email" name="email" type="email" placeholder="e.g. miri24@yahoo.com" required/><br><br>
                <label for="username">Nombre de usuario</label><br>
                <input id="username" name="username" type="text" placeholder="e.g. mati_24" required/><br><br>
                <label for="contraseña">Contraseña</label><br>
                <input id="contraseña" name="contraseña" type="password" required/><br><br>
                <label for="confirmar">Confirmar contraseña</label><br>
                <input id="confirmar" name="confirmar" type="password" required/><br><br>
                <input type="submit" value="Crear cuenta" />
            </form>
        </div>
        <div>
            <p>Volver a <a href="login.php">login</a>.</p>
        </div>
        <footer>
            <p>by &ltmatilde&gt</p>
        </footer>
    </body>
</html>