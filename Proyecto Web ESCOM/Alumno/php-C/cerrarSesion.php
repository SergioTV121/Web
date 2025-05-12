<?php
session_start();
unset($_SESSION["usuario"]); //Cierra la sesion
$respAx=0;
if(!isset($_SESSION["usuario"]))    //Si se cerro la sesion correctamente
{
    $respAx=1;     //Devuelve 1
}
echo $respAx;

?>