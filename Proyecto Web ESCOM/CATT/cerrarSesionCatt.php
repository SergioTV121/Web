<?php
    session_start();
    $nombreSesion=$_GET["sesion"];
    unset($_SESSION["$nombreSesion"]);
    header("location:./LoginCatt.html");
?>