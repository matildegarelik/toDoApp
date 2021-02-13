<?php
session_start();
include('abrir_conexion.php');
if(isset($_GET['task_id'])){
    $task = $_GET['task_id'];
    $query="UPDATE actividades SET estado = 'Completado'  WHERE id = '$task'";
    $resultado = mysqli_query($conexion, $query);
    if($resultado){
        echo "Tareas actualizadas";
    }
}
