<?php
include("bd.php");
$resultado=0;
$conexion=conectarBD();
    if($conexion){
        if(registroExistente($_POST["boleta"],$conexion))  //Ya existe el director en el TT actual
        {
            $resultado=2;
        }
        else if(agregarAlumno($_POST["boleta"], $_POST["nombre"],
                            $_POST["p_apellido"],$_POST["s_apellido"],
                            $_POST["telefono"],$_POST["correo"],
                            $_POST["contrasena"],$conexion))
        {
            $resultado=1;
           
        }
        mysqli_close($conexion);
    }

echo $resultado;

function registroExistente($boleta,$conexion)
    {
        $query="SELECT * FROM alumno WHERE boleta=".$boleta;
        $consulta=mysqli_query($conexion,$query);
        if(mysqli_fetch_assoc($consulta))
        {
            return TRUE;
        }
        return FALSE;                   
    }

function agregarAlumno($boleta,$nom,$pa,$sa,$tel,$mail,$pw,$conexion){
    $query="INSERT INTO alumno (boleta,nombre,primer_apellido,segundo_apellido,telefono,correo)
    VALUES ('".$boleta."','".$nom."','".$pa."','".$sa."','".$tel."','".$mail."')";
    $exito=mysqli_query($conexion,$query);
    $query="INSERT INTO representante (boleta,contrasena) VALUES ('".$boleta."','".$pw."')";
    $exito=mysqli_query($conexion,$query);

    return $exito;
}


?>
