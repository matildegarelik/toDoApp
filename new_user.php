<?php
session_start();
$error="";

if(isset ($_POST['contraseña']) && ($_POST['contraseña'])==($_POST['confirmar'])){
    include('abrir_conexion.php');
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $usuario = mysqli_real_escape_string($conexion, $_POST['username']);
    $contraseña = mysqli_real_escape_string($conexion, $_POST['contraseña']);
    
    $check1 = "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $check2 = "SELECT * FROM usuarios WHERE email='$email'";

    if (mysqli_num_rows(mysqli_query($conexion, $check1))>0){
        $error= 'Ya existe una cuenta con ese nombre de usuario';
    }else if (mysqli_num_rows(mysqli_query($conexion, $check2))){
        $error= 'Ya existe una cuenta con ese correo electrónico';
    }else{
        $query = "INSERT INTO usuarios(nombre,apellido,email,usuario,contraseña) VALUES('$nombre','$apellido','$email','$usuario','$contraseña')";

        if(mysqli_query($conexion, $query)){
            header('Location:login.php');
            echo 'Usuario añadido...';
            exit;

        }else{
            echo 'ERROR: '. mysqli_error($conexion);
        }
    }

    

}else if (isset ($_POST['contraseña']) && ($_POST['contraseña'])!=($_POST['confirmar'])){
    echo '<h1>Las contraseñas no coinciden</h1>';
}

?>

<html>
    <head>
        <title>toDoApp - Register</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="utf-8">
        <link rel="icon" type="image/jpg" href="favicon.jpg">
    </head>
    <body>
        <header>
            <div class="logo">&ltto do app&gt</div>
            <h1>Registrarte</h1>
        </header>
        <div id="error"><?php echo $error; ?></div><br>
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