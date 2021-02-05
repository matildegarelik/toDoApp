<?php
session_start();

?>

<html>
    <head>
        <title>toDoApp - Login</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="utf-8">
    </head>
    <body>
        <header>
            <div class="logo">&ltto do app&gt</div>
            <h1>Login</h1>
        </header>
        <div class="login-form">
            <form method="POST">
                <label for="username">Nombre de usuario</label><br>
                <input id="username" name="username" type="text" placeholder="e.g. mati_24" required/><br><br>
                <label for="contraseña">Contraseña</label><br>
                <input id="contraseña" name="contraseña" type="password" required/><br><br>
                <input type="submit" value="Acceder"/>
            </form>
        </div>
        <div>
            <p>Si no tenes una cuenta, <a href="new_user.php">registrate</a>.</p>
        </div>
        <footer>
            <p>by &ltmatilde&gt</p>
        </footer>
    </body>
</html>