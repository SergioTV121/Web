<?php
    include("bd.php");
    $conexion=conectarBD();
    $id_profesor=$_POST["id"];
    if($conexion){
        $query="SELECT * FROM profesor WHERE id_profesor=".$id_profesor;
        $consulta=mysqli_query($conexion,$query);
        mysqli_close($conexion);
        
        if($registro=mysqli_fetch_assoc($consulta))
            {
                $resAX[]=array($registro["id_profesor"],
                $registro["nombre"],
                $registro["primer_ap"],
                $registro["telefono"],
                $registro["correo"]);
                echo json_encode($resAX);
            }
            else
            {
                echo 0;
            }
       
    }
    else{
        echo 0;
    }
        
?>