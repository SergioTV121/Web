<?php
    include("bd.php");
    $conexion=conectarBD();
    session_start();
    $tt=$_SESSION["tt_usuario"];
    if($conexion){
        $query="SELECT * FROM tt WHERE id_tt='".$tt."'";
        $consulta=mysqli_query($conexion,$query);
        mysqli_close($conexion);
        
        while($registro=mysqli_fetch_assoc($consulta))
            {
                $resAX[]=array($registro["id_tt"],
                $registro["titulo"],
                $registro["resumen"]);
            }
        echo json_encode($resAX);
    }
    else{
        echo "Error al establecer la conexion a la BD";
    }
        
?>