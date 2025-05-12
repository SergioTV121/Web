<?php
    include("bd.php");
    $conexion=conectarBD();
    session_start();
    $id_director=$_POST["id_director"];
    $tt=$_SESSION["tt_usuario"];
    $respAx=0;
    if($conexion){
        $query="DELETE FROM director WHERE id_director=".$id_director." AND id_tt=".$tt;
        $exito=mysqli_query($conexion,$query);        
        mysqli_close($conexion);
        if($exito){
            $respAx=1;
        }
    }
    echo $respAx;
?>