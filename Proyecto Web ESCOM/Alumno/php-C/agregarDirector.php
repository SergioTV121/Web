<?php
include("bd.php");
session_start();
$id_director=$_POST["id"];
$tt=$_SESSION["tt_usuario"];
$respAx=0;
$conexion=conectarBD();
    if($conexion)
    {
        if(maximoDirectores($tt,$conexion))     //Ya tiene 2 directores
        {
            $respAx=3;
        }
        else if(registroExistente($id_director,$tt,$conexion))  //Ya existe el director en el TT actual
        {
            $respAx=2;
        }
        else
        {                                                   
        //Nuevo Director
        $query="INSERT INTO director (id_director,id_tt) VALUES     
        (".$id_director.",".$tt.")";
        $consulta=mysqli_query($conexion,$query);
        
        if($consulta)
        {
            $respAx=1;  
        }        

        }
        mysqli_close($conexion);
    }
    
    echo $respAx;


function registroExistente($id_director,$tt,$conexion)
    {
        $query="SELECT * FROM director WHERE id_director=".$id_director." AND id_tt=".$tt;
        $consulta=mysqli_query($conexion,$query);
        $resultado=mysqli_fetch_assoc($consulta);
        if($resultado)
        {
            return TRUE;
        }
        return FALSE;                   
    }

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