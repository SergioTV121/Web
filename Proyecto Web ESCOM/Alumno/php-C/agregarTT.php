<?php
include("bd.php");
$resultado=0;
session_start();
$usuario=$_SESSION["usuario"];
$conexion=conectarBD();
    if($conexion){
        if(agregarTT($_POST["titulo"],$_POST["resumen"],$usuario,$conexion))
        {
            if (isset($_FILES["protocolo"])){
                $resultado=1;
                $dirDestino = "./Protocolos/";
                $tt=getIdTT($conexion);
                    $archDestino = "$dirDestino"."$tt".".pdf";
                    move_uploaded_file($_FILES["protocolo"]["tmp_name"], $archDestino);
                }
                else
                {
                    $resultado=2;
                }
        }
        mysqli_close($conexion);
    }

echo $resultado;



function agregarTT($titulo,$resumen,$usuario,$conexion){
    $query="INSERT INTO tt (id_tt,titulo,resumen)
    VALUES (NULL,'".$titulo."','".$resumen."')";
    $exito=mysqli_query($conexion,$query);
    $query="UPDATE alumno SET id_tt=(SELECT max(id_tt) FROM tt) WHERE boleta='".$usuario."'";
    $exito=mysqli_query($conexion,$query);

    return $exito;
}

function getIdTT($conexion){
    $query="SELECT max(id_tt) FROM tt";
    $consulta=mysqli_query($conexion,$query);
    $idTT=mysqli_fetch_assoc($consulta);

    return $idTT["max(id_tt)"];
}


?>