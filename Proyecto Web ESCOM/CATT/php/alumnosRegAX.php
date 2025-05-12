<?php
    
    session_start();
    include('../bd.php');

    $boleta=$_POST['boleta'];

    $conexion=conectarBD();
    /***************Consultas a BD **************/
    //*************ESTA BIEN */
    $consulta="SELECT*FROM alumno WHERE boleta='$boleta'";//Consulta de la boleta a buscar
    //***********ESTA BIEN */
    $consultaSinodal="SELECT sinodal.*,alumno.id_tt,profesor.* FROM sinodal INNER JOIN profesor ON profesor.id_profesor=sinodal.id_sinodal INNER JOIN alumno WHERE sinodal.id_tt=alumno.id_tt AND alumno.boleta='$boleta'";
    
    $consultaDirector="SELECT tt.id_tt, director.id_director,director.id_director,profesor.id_profesor, (SELECT GROUP_CONCAT(profesor.nombre,' ',profesor.primer_ap SEPARATOR '-') FROM profesor INNER JOIN director ON profesor.id_profesor=director.id_director AND director.id_tt=tt.id_tt) as 'Directores' FROM profesor INNER JOIN director ON profesor.id_profesor=director.id_director INNER JOIN tt ON director.id_tt=tt.id_tt INNER JOIN alumno ON tt.id_tt=alumno.id_tt AND alumno.boleta='$boleta'";
    /*****  id_tt   id_director  id_director  id_prfesor  nombre  primer_ap   telefono  correo  id_tt */
    /***************Resultados de consultas**************/
    $resultado=mysqli_query($conexion,$consulta);//Consulta para ver si la boleta esta registrada
    $filas=mysqli_num_rows($resultado);//Resultado para ver si solo hay 1 registro de boleta

    $resultadoSinodal=mysqli_query($conexion,$consultaSinodal);
    $filasSinodal=mysqli_num_rows($resultadoSinodal);
    $resultadoDirector=mysqli_query($conexion,$consultaDirector);
    $filasDirector=mysqli_num_rows($resultadoDirector);

    $respAX=[];
    if($filasSinodal == 3){
        while($registroSinodal=mysqli_fetch_assoc($resultadoSinodal)){//Obtener los sinodales
            $respSIN[]=array($registroSinodal["nombre"], $registroSinodal["primer_ap"]);
        }
    }else{
        $respSIN[0]=array("");
        $respSIN[1]=array("No se han asignado los sinodales");
        $respSIN[2]=array("");
    }
    
    while($registroDirector=mysqli_fetch_assoc($resultadoDirector)){
        $respDIR[]=array($registroDirector["Directores"]);
    }


    /*
    while($registroDirector=mysqli_fetch_assoc($resultadoDirector)){//Obtener los directores - Maximo puede tener dos directores(uno extreno y uno de escom)
        if($filasDirector==1){//Si solo tiene un director 
            $respDIR[0]=array($registroDirector["nombre"],$registroDirector["primer_ap"]);
            $respDIR[1]=array("");
        }else{
            $respDIR[]=array($registroDirector["nombre"],$registroDirector["primer_ap"]);
        }
    }*/

    if($filas==1){
        while($registro=mysqli_fetch_assoc($resultado)){
            $respAX[]=array(1,$registro["boleta"],
            $registro["nombre"],
            $registro["primer_apellido"],
            $registro["segundo_apellido"],
            $registro["telefono"],
            $registro["correo"],
            $registro["id_tt"],
            $respDIR[0],
            $respSIN[0],$respSIN[1],$respSIN[2]);
        }
    }else{
        $respAX[]=array(0,"<h5>Alumno NO encontrado, verifica que la boleta sea correcta</h5>");
    }

    echo json_encode($respAX);

?>