<?php
    include("bd.php");
    $conexion=conectarBD();
    session_start();
    $tt=$_SESSION["tt_usuario"];
    if($conexion){
        $query="SELECT * FROM alumno INNER JOIN integrante ON integrante.boleta=alumno.boleta WHERE id_tt='".$tt."'";
        $consulta=mysqli_query($conexion,$query);
        mysqli_close($conexion);
        
        while($registro=mysqli_fetch_assoc($consulta))
            {
                $resAX[]=array($registro["boleta"],
                $registro["nombre"],
                $registro["primer_apellido"],
                $registro["segundo_apellido"],
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