<?php

if (isset($_POST)) {
    require_once 'conexion.php';
    $tarea_id = $_POST['tarea_id'];

    $sqlEntrada = "delete e.* from entradas e WHERE e.tarea_id = $tarea_id";
    $sqlTarea = "delete t.* from tareas t where t.id= $tarea_id";
    $eliminarEntrada = mysqli_query($conexion, $sqlEntrada);
    $eliminarTarea = mysqli_query($conexion, $sqlTarea);
    echo "eliminado exitosamente";

}
?>