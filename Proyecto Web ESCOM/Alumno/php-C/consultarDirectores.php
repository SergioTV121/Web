<?php
    include("bd.php");
    $conexion=conectarBD();
    session_start();
    $tt=$_SESSION["tt_usuario"];
    if($conexion){
        $query="SELECT * FROM director INNER JOIN profesor ON profesor.id_profesor=director.id_director WHERE id_tt='".$tt."'";
        $consulta=mysqli_query($conexion,$query);
        mysqli_close($conexion);
        
        while($registro=mysqli_fetch_assoc($consulta))
            {
                $resAX[]=array($registro["id_director"],
                $registro["nombre"],
                $registro["primer_ap"],
                $registro["telefono"],
                $registro["correo"],
                $registro["id_tt"]);
            }
        echo json_encode($resAX);
    }
    else{
        echo "Error al establecer la conexion a la BD";
    }
        
?>