<?php
include("bd.php");
session_start();
$boleta=$_SESSION['boleta'];
$conexion=conectarBD();
if($conexion){
    $query="SELECT * FROM alumno WHERE boleta=$boleta";
    $consulta=mysqli_query($conexion,$query);        
    mysqli_close($conexion);
    $registro=mysqli_fetch_assoc($consulta);
    $resAX=array($registro["boleta"],
                $registro["nombre"],
                $registro["primer_apellido"],
                $registro["segundo_apellido"],
                $registro["telefono"],
                $registro["correo"]);
    echo json_encode($resAX);
}
else{
    echo "Error en la conexion a la BD";
}
?>