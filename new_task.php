<?php
session_start();
include('abrir_conexion.php');
$usuario = $_SESSION["usuario"];
//$usuario_id = $_SESSION["usuario_id"];
//echo $usuario;
//echo $usuario_id;
$resultado=mysqli_query($conexion,"SELECT id FROM usuarios WHERE usuario='$usuario'");
$query = mysqli_fetch_array($resultado);
$usuario_id = $query["id"];
echo $usuario_id;
//echo implode("|",$user);


if(isset($_POST['act'])&&isset($_POST['descripcion'])&&isset($_POST['prioridad'])){
    $act = mysqli_real_escape_string($conexion, $_POST['act']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    $categoria = mysqli_real_escape_string($conexion, $_POST['categoria']);
    $prioridad = mysqli_real_escape_string($conexion, $_POST['prioridad']);
    $fecha = mysqli_real_escape_string($conexion, $_POST['fecha']);
    $estado = mysqli_real_escape_string($conexion, 'Pendiente');

    $query = "INSERT INTO actividades(usuario, actividad, descripcion, categoría, prioridad, fecha, estado) VALUES('$usuario_id','$act','$descripcion', '$categoria','$prioridad','$fecha','$estado')";

    if(mysqli_query($conexion, $query)){
        echo 'Actividad añadida...';
    }else{
        echo 'ERROR: '. mysqli_error($conexion);
    }
}




?>