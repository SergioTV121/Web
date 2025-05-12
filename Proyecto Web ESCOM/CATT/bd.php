<?php
function conectarBD(){
    $servidor="localhost";
    $nombreBD="bd_tt2";
    $usuario="root";
    $contrasena="";

    $conexion=mysqli_connect($servidor,$usuario,$contrasena,$nombreBD);
    
    return $conexion;
}
?>