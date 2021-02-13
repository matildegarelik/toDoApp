<?php
session_start();
include('abrir_conexion.php');
$username = $_SESSION["usuario"];
$resultado=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario='$username'");
$array = mysqli_fetch_array($resultado);
echo json_encode($array);

