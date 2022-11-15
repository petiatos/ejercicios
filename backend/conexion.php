<?php 

$conexion = mysqli_connect("localhost", "root", "", "proyecto", "3306" );//Realizamos la conexión de a la BBDD: Nombre del servidor, usuario, password, nombre de la bbdd y el puerto y lo guardamos en una variable

if(mysqli_connect_errno()){//Comprobamos si se realiza la conexión, si no se realiza mostramos el error de por que no se ha realizado
    echo "La conexión ha fallado:". mysqli_connect_error()."<br>";
}

?>