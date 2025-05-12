<?php
    include("bd.php");
    $resAX=0;
    session_start();
    unset($_SESSION["usuario"]);    //La elimina  
    $conexion=conectarBD();
        if($conexion)
        {
            $query="SELECT * FROM representante WHERE boleta=".$_POST['usuario']." AND contrasena=".$_POST['contrasena'];
            $consulta=mysqli_query($conexion,$query);
            mysqli_close($conexion);
        }
    if(mysqli_fetch_assoc($consulta)){  //Hay al menos un resultado
        $_SESSION["usuario"]=$_POST["usuario"];   //Crea la session
        $resAX=1;
    }
    echo $resAX;
?>