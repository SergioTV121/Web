<?php
    include("bd.php");
    $conexion=conectarBD();
    $resAX=0;
    if($conexion){
        $boleta=$_POST["boleta"];
        $nombre=$_POST["nombre"];
        $p_ap=$_POST["primer_apellido"];
        $s_ap=$_POST["segundo_apellido"];
        $tel=$_POST["telefono"];
        $mail=$_POST["correo"];
        $query="UPDATE alumno SET nombre='".$nombre."',
        primer_apellido='".$p_ap."',
        segundo_apellido='".$s_ap."',
        telefono='".$tel."',
        correo='".$mail."' WHERE boleta=$boleta";
        $exito=mysqli_query($conexion,$query);        
        mysqli_close($conexion);
        if($exito){
            $resAX=1;
        }
        else{
            $resAX=0;
        }
    }
    else{
        $resAX=0;
    }
    echo $resAX;        
?>