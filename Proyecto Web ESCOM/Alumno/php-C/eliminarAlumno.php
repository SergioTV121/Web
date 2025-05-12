<?php
    include("bd.php");
    $conexion=conectarBD();
    $boleta=$_POST["boleta"];
    if($conexion){
        $query="DELETE alumno,integrante FROM alumno INNER JOIN integrante WHERE alumno.boleta=integrante.boleta AND integrante.boleta=$boleta";
        $exito=mysqli_query($conexion,$query);        
        mysqli_close($conexion);
        if($exito){
            echo 1;
        }
        else{
            echo 1;
        }
    }
        
?>