<?php
include("bd.php");
$resultado=0;
session_start();
$tt=$_SESSION["tt_usuario"];
$conexion=conectarBD();
    if($conexion){
        if(agregarAlumno($_POST["boleta"], $_POST["nombre"],
                            $_POST["p_apellido"],$_POST["s_apellido"],
                            $_POST["telefono"],$_POST["correo"],$tt,$conexion))
        {
            $resultado=1;
        }
        else{
            $resultado=0;
        }
        mysqli_close($conexion);
    }

echo $resultado;


function agregarAlumno($boleta,$nom,$pa,$sa,$tel,$mail,$tt,$conexion){
    $query="INSERT INTO alumno (boleta,nombre,primer_apellido,segundo_apellido,telefono,correo,id_tt)
    VALUES ('".$boleta."','".$nom."','".$pa."','".$sa."','".$tel."','".$mail."','".$tt."')";
    $exito=mysqli_query($conexion,$query);
    $query="INSERT INTO integrante (boleta) VALUES ('".$boleta."')";
    $exito=mysqli_query($conexion,$query);

    return $exito;
}


?>
