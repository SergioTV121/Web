<?php

session_start();
if(isset($_SESSION["usuario"]))
{
    $boleta=$_SESSION["usuario"];
    include("bd.php"); 
    $conexion=conectarBD();
        if($conexion)
        {
            $query="SELECT nombre,id_tt FROM alumno WHERE boleta=".$boleta;
            $consulta=mysqli_query($conexion,$query);
            mysqli_close($conexion);
        }
        $resultado=mysqli_fetch_assoc($consulta);  //Hay al menos un resultado
        $_SESSION["tt_usuario"]=$resultado["id_tt"];
        $resAX[]=array($resultado["nombre"],$resultado["id_tt"]);
        echo json_encode($resAX);
   
}
else
{
    echo 0;
}

?>