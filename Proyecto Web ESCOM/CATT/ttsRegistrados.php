<?php

session_start();
if(!isset($_SESSION["login"])){
    header("location:./LoginCatt.html");
}else{
    include('bd.php');
$conexion=conectarBD();
//ESTA CONSULTA MUESTRA LOS TT, CON SU INFORMACION Y DIRECTORES


//ESTA CONSULTA ES PARA MOSTRAR LOS SINODALES DE CADA TT
$consultaSinodal="SELECT tt.id_tt,tt.titulo,tt.resumen, (SELECT GROUP_CONCAT(profesor.nombre,' ',profesor.primer_ap SEPARATOR '-') FROM profesor INNER JOIN director ON profesor.id_profesor=director.id_director AND director.id_tt=tt.id_tt) as 'Directores',(SELECT GROUP_CONCAT(profesor.nombre,' ',profesor.primer_ap SEPARATOR '-') FROM profesor INNER JOIN sinodal ON profesor.id_profesor=sinodal.id_sinodal AND sinodal.id_tt=tt.id_tt) as 'Sinodales' FROM profesor INNER JOIN director ON profesor.id_profesor=director.id_director INNER JOIN tt ON director.id_tt=tt.id_tt GROUP BY id_tt ORDER BY id_tt DESC";
/***id_tt  titulo  resumen  doc  id_Dir  nombre  primer_ap sinodales */
$resultadoSinodal=mysqli_query($conexion,$consultaSinodal);
$filasSinodal=mysqli_num_rows($resultadoSinodal);

?>

<!DOCTYPE html>
<html lang="en">
<link href="./generalCatt.css" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TTs Registrados</title>
    <link rel="stylesheet" href="./js/validetta/dist/validetta.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/validetta/dist/validetta.min.js"></script>
    <script src="./js/validetta/localization/validettaLang-es-ES.js"></script>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
</head>
<body>
    <div id="particles-js"></div>
    <header class="contenedor header">
    <div id="bloque">
    <header>
        <h3>Registros de Trabajos Terminales</h3>
    </header>

    <div>
        <table  id="tts">
            <thead>
                <tr>
                    <th>No TT</th>
                    <th>Titulo</th>
                    <th>Resumen</th>
                    <th>Director</th>
                    <th>Sinodales</th>
                </tr>
            </thead>
            <tbody id="bodyTTs" ><!--Si en el while pongo | salen todos los tt-->

            <?php while($tts=mysqli_fetch_array($resultadoSinodal)){
                        
                        if($tts[4]!=NULL){?>
                        <tr>
                            <td><?php echo $tts[0] ?></td>
                            <td><?php echo $tts[1] ?></td>
                            <td><?php echo $tts[2] ?></td>
                            <td><?php echo $tts[3] ?></td> 
                            <td><?php echo $tts[4] ?></td>
                            <td><a href='../Alumno/php/Protocolos/<?php echo $tts[0] ?>.pdf' target="_blank">Protocolo</a></td>
                            

                        </tr>
                <?php   }else{ ?>
                    <tr></tr>
                <?php }
            } ?> 
            </tbody>
        </table>
    </div>
    </div>
        <a href="./inicioCatt.php">Regresar</a>
    </header>
    <script src="js/particles.min.js"></script>
    <script src="js/activar.js"></script>
</body>
</html>
<?php
    }
?>  