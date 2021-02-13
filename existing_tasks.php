<?php
session_start();
include('abrir_conexion.php');
$usuario = $_SESSION["usuario"];
$resultado=mysqli_query($conexion,"SELECT id FROM usuarios WHERE usuario='$usuario'");
$query = mysqli_fetch_array($resultado);
$usuario_id = $query["id"];
$query2="";
if (isset($_GET['filtro_estado'])){
    $filtro_estado = $_GET['filtro_estado'];
    if ($filtro_estado == "Pendientes"){
        $query2 = "SELECT * FROM actividades WHERE usuario='$usuario_id' AND estado='Pendiente'";
    }else if ($filtro_estado == "Completadas"){
        $query2 = "SELECT * FROM actividades WHERE usuario='$usuario_id' AND estado='Completado'";
    }else if($filtro_estado == "Todas"){
        $query2 = "SELECT * FROM actividades WHERE usuario='$usuario_id'";
    }
    
    $resultado2 = mysqli_query($conexion, $query2);
    $user_tasks = mysqli_fetch_all($resultado2, MYSQLI_ASSOC);
    echo json_encode($user_tasks);
}


?>