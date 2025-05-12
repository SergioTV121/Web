<?php
    session_start();
    include('../bd.php');

    $user=$_POST['user'];
    $pwd=($_POST['pwd']);

    $codigo=0;

    $conexion=conectarBD();
    $consulta="SELECT*FROM catt where id_catt='$user' and contrasena='$pwd'";
    $resultado=mysqli_query($conexion,$consulta);

    $filas=mysqli_num_rows($resultado);

    if($filas==1){
        $_SESSION["login"]=true;
        $codigo=1;//Lo que va a recibir respAX
    }else{
        $codigo=0;
    }
    
    echo $codigo;

?>