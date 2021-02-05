<?php
session_start();

$tasks = []

?>

<html>
    <head>
        <title>toDoApp - Main page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="utf-8">
    </head>
    <body>
        <header>
            <div class="logo">&ltto do app&gt</div>
            <h1>To do tasks</h1>
        </header>
        <div id="to-do">
            <?php foreach($tasks as $task){?>
                <div class="task">
                    <h2><?php echo $task['actividad'];?></h2>
                    <p><?php echo $task['descripcion'];?></p>
                    <!--Algo así como para cambiar el estado a completada-->
                </div>
                <?php } ?>
        </div>
        <button id="new">Agrega una nueva actividad</button>
        <div id="task-form" style="display: none">Holaaaa
            <form method="POST">
                <label for="act">Actividad</label><br>
                <input id="act" name="act" type="text" placeholder="e.g. Hacer las compras" required/><br><br>
                <label for="descripcion">Descripción</label><br>
                <input id="descripcion" name="descripcion" type="text"/><br><br>
                <label for="prioridad">Prioridad</label><br>
                <input id="prioridad" name="prioridad" type="number" placeholder="valor entre 1 y 10" required/><br><br>
                <input name="crear" type="submit" value="Crear"/>
            </form>
            <button id="hid">↑</button>
        </div>
        <div>
            <a href="new_user.php">Cerrar sesión</a></p>
        </div>
        <footer>
            <p>by &ltmatilde&gt</p>
        </footer>
    </body>
    <script src="tasks.js"></script>
</html>