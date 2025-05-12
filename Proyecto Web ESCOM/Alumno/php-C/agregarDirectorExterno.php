<?php
include("bd.php");
session_start();
$tt=$_SESSION["tt_usuario"];
$id=$_POST["id"];
$respAx=0;
$conexion=conectarBD();
    if($conexion)
    {
        if(maximoDirectores($tt,$conexion))     //Ya tiene 2 directores
        {
            $respAx["cod"]=3;
        }
        else
        {                                                   
        //Nuevo Director
        $query="INSERT INTO profesor (id_profesor,nombre,primer_ap,telefono,correo) VALUES     
        (".$id.",'".$_POST["nombre"]."','".$_POST["p_ap"]."','".$_POST["tel"]."','".$_POST["mail"]."')";
        $consulta=mysqli_query($conexion,$query);

        $query="INSERT INTO director (id_director,id_tt) VALUES     
        (".$_POST["id"].",".$tt.")";
        $consulta=mysqli_query($conexion,$query);
        
        if($consulta)
        {
            
            if (isset($_FILES["cv"])){
                $respAx=1;
                $dirDestino = "./CV/";
                    $archDestino = "$dirDestino"."$id".".pdf";
                    move_uploaded_file($_FILES["cv"]["tmp_name"], $archDestino);
                }
                else
                {
                    $respAx=2;
                }
           
        }        

        }
        mysqli_close($conexion);
    }
    
    echo $respAx;

function maximoDirectores($tt,$conexion)
    {
        $query="SELECT * FROM director WHERE id_tt='".$tt."'";
        $consulta=mysqli_query($conexion,$query);
        $numDir=0;
        while(mysqli_fetch_assoc($consulta))
        {
            $numDir++;
        }
        if($numDir==2)
        {
            return TRUE;     
        }
        return FALSE;
                      
    }
?>