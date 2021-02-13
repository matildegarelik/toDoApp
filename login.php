<?php
session_start();
if(isset($_POST['username']) && isset($_POST['contraseña'])){
      include("abrir_conexion.php");
      $result = mysqli_query($conexion, "SELECT usuario FROM usuarios WHERE usuario = '".$_POST['username']."' AND contraseña =  '".$_POST['contraseña']."';");
      if(!$result){
        echo "<h1>Usario no existe</h1>";
      }else{
        while($query = mysqli_fetch_array($result))
        {
          $_SESSION["esta_logueado"] = true;
          $_SESSION["usuario"] = $query["usuario"];
          $_SESSION["usuario_id"] = $query["id"];
          header('Location:tasks.html');
          exit;
        }
      }
}

?>

<html>
    <head>
        <title>toDoApp - Login</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="utf-8">
        <link rel="icon" type="image/jpg" href="favicon.jpg">
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
        <div id="msj"></div>
        <div>
            <p>Si no tenes una cuenta, <a href="new_user.php">registrate</a>.</p>
        </div>
        <footer>
            <p>by &ltmatilde&gt</p>
        </footer>
    </body>
</html>