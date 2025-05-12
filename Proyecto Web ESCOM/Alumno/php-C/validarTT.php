<?php
include("bd.php"); 
$conexion=conectarBD();
session_start();
$boleta=$_SESSION["usuario"];
$respAx=1;
    if($conexion)
    {
        $query="SELECT id_tt FROM alumno WHERE boleta='".$boleta."'";
        $consulta=mysqli_query($conexion,$query);
        mysqli_close($conexion);        
        $resultado=mysqli_fetch_row($consulta);
        
        if($resultado[0]=="")
        {
            $respAx=0;      //Sin TT
        }
        
    }

echo $respAx;
