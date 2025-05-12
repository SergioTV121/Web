<?php
    session_start();
    include('../bd.php');
    $conexion=conectarBD();

    $tts=$_POST["id"];

    //print_r($tts);
    //$asignar=$_POST["asignar"];
    $sin1=$_POST["sin1"];
    $sin2=$_POST["sin2"];
    $sin3=$_POST["sin3"];

    $asignaSinodal="UPDATE sinodal SET id_tt='$tts' WHERE id_sinodal IN ($sin1,$sin2,$sin3)";

    $resAsigSin=mysqli_query($conexion,$asignaSinodal);
    $respAX=[];
    if(mysqli_affected_rows($conexion)==3){
        $respAX["cod"]=1;
        $respAX["msj"]="<h5>Los sinodales han sido asignados</h5>";
    }else{
        $respAX["cod"]=0;
        $respAX["msj"]="<h5>Error. Favor de intentarlo nuevamente</h5>";
    }

    echo json_encode($respAX);

?>
