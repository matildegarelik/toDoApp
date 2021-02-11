<?php
session_start();
include('abrir_conexion.php');
$usuario = $_SESSION["usuario"];
$resultado=mysqli_query($conexion,"SELECT id FROM usuarios WHERE usuario='$usuario'");
$query = mysqli_fetch_array($resultado);
$usuario_id = $query["id"];
$query="SELECT * FROM actividades WHERE usuario='$usuario_id'";
$resultado = mysqli_query($conexion, $query);
$user_tasks = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
echo json_encode($user_tasks);

?>