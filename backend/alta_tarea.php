<?php

if (isset($_POST)) {
    require_once 'conexion.php';//llamamos al archivo conexión que hemos creado, donde contiene los datos necesarios para conectarse a nuestra Base de datos
    
    $nombreTarea = $_POST['nombreTarea'];

    $tarea = isset($nombreTarea) ? mysqli_real_escape_string($conexion, $nombreTarea) : false; //se comprueba nombreTarea que si viene el parámetro tarea, limpiamos el parámetro de carácteres especiales de una cadena para no tener ningún tipo de error en la secuencia. en caso de que llegue vacío llegaría un false
    
    $errores = array();//Creamos un array donde vamos a ir añadiendo errores

    //validamos los campos
    if (empty($tarea)) {
        $errores['nombreTarea'] = "Debe indicar la tarea";
    }
    if (empty($_POST['phpCheck']) && empty($_POST['jsCheck']) && empty($_POST['cssCheck'])) {
        $errores['nombreTarea'] = "Debe indicar al menos una categoría";
    }
    if (empty($tarea)) {
        $errores['nombreTarea'] = "Debe indicar la tarea";
    }

    if (count($errores) == 0) {//si no hay errores procedemos con la insercción
       $sqltareas = "insert into tareas (nombreT) values ('$tarea')";
       $guardartareas = mysqli_query($conexion, $sqltareas);
       
       $query = mysqli_query($conexion, "select * from tareas order by id desc limit 1");
       
        while($consulta= mysqli_fetch_assoc($query)){
            $id_tarea = $consulta['id'];
            if(isset($_POST['phpCheck'])){
                $phpCheck = $_POST['phpCheck'];
                $sqlentrada1 = "insert into entradas (tarea_id,categoria_id) values ($id_tarea, $phpCheck)";
                $guardarEntrada1 = mysqli_query($conexion, $sqlentrada1);
            }
            if(isset($_POST['jsCheck'])){
                $jsCheck = $_POST['jsCheck'];
                $sqlentrada2 = "insert into entradas (tarea_id,categoria_id) values ($id_tarea, $jsCheck)";
                $guardarEntrada2 = mysqli_query($conexion, $sqlentrada2);
            }
            if(isset($_POST['cssCheck'])){
                $cssCheck = $_POST['cssCheck'];
                $sqlentrada3 = "insert into entradas (tarea_id,categoria_id) values ($id_tarea, $cssCheck)";
                $guardarEntrada3 = mysqli_query($conexion, $sqlentrada3);
            }
        }

        echo "guardado exitosamente";
    } else {
        foreach ($errores as $val) {
            echo $val;
        }
    }
}

?>
