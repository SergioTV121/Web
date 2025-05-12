<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("location:./LoginCatt.html");
    }else{
        include('bd.php');
    $conexion=conectarBD();
    
    //ESTA CONSULTA MUESTRA TODOS LOS TTs CON SU DIRECTOR Y SUS SINODALES
    $consultaTT="SELECT tt.id_tt,tt.titulo,tt.resumen, (SELECT GROUP_CONCAT(profesor.nombre,' ',profesor.primer_ap SEPARATOR '-') FROM profesor INNER JOIN director ON profesor.id_profesor=director.id_director AND director.id_tt=tt.id_tt) as 'Directores',(SELECT GROUP_CONCAT(profesor.nombre,' ',profesor.primer_ap SEPARATOR '-') FROM profesor INNER JOIN sinodal ON profesor.id_profesor=sinodal.id_sinodal AND sinodal.id_tt=tt.id_tt) as 'Sinodales' FROM profesor INNER JOIN director ON profesor.id_profesor=director.id_director INNER JOIN tt ON director.id_tt=tt.id_tt GROUP BY id_tt ORDER BY id_tt DESC";
    $resultadoTT=mysqli_query($conexion,$consultaTT);
    
    
    //ESTA CONSULTA ES PARA EL SELECT DEL FORM, QUE MUESTRA TODOS LOS SINODALES DISPONIBLES
    //****************ESTA BIEN */
    $consultaProfSino="SELECT * FROM sinodal INNER JOIN profesor on sinodal.id_sinodal=profesor.id_profesor WHERE id_tt IS NULL";
    $resultadoProfSino=mysqli_query($conexion,$consultaProfSino);

    $sinodales="";
    while($filas=mysqli_fetch_row($resultadoProfSino)){
        $sinodales.="<option value='$filas[0]'>$filas[3] $filas[4]</option>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<link href="./generalCatt.css" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar sinodal</title>
    <link rel="stylesheet" href="./js/validetta/dist/validetta.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/validetta/dist/validetta.min.js"></script>
    <script src="./js/validetta/localization/validettaLang-es-ES.js"></script>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="./js/asignaSinodal.js"> </script>
    
</head>
<body>
    <div id="particles-js"></div>
    <div id="bloque">
    <header class="contenedor header">
        <h3>Asignar sinodales</h3>
    <div>
        <table  id="tts">
            <thead>
                <tr>
                    <th>No TT</th>
                    <th>Titulo</th>
                    <th>Resumen</th>
                    <th>Director</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="bodyTTs" >
            
                <?php
                
                    while($tts=mysqli_fetch_array($resultadoTT)){
                        
                        if($tts[4]==NULL){?>
                        <tr>
                            <td>2021-2-<?php echo $tts[0] ?></td>
                            <td><?php echo $tts[1] ?></td>
                            <td><?php echo $tts[2] ?></td>
                            <td><?php echo $tts[3] ?></td> 
                            <td><button id="<?php echo $tts[0] ?>" class ="btn modal-trigger asigSIN" data-target="modalAsignaSino">Asignar</button></td>

                        </tr>
                <?php   }else{ ?>
                    <tr></tr>
                <?php }
            } ?>
    
            </tbody>

        </table>
        
    </div>
    


        <div id="modalAsignaSino" class="modal"><!--MODAL PARA ASIGNAR SINODALES-->
            <div class="modal-content">
                <h4>Asignar Sinodales</h4>
                <form id="formAsigSin" >
                    <div class="input-field">
                        <select name="sin1" id="sin1" data-validetta='required'><!--Sinodal 1-->
                            <option value="">---Seleccionar---</option>
                            <?php echo $sinodales; ?>
                        </select>
                        <label for="sin1">Sinodal 1</label>
                    </div>

                    <div class="input-field">
                        <select name="sin2" id="sin2" data-validetta='required'><!--Sinodal 2-->
                            <option value="">---Seleccionar---</option>
                            <?php echo $sinodales; ?>
                        </select>
                        <label for='sin2'>Sinodal 2</label>
                    </div>

                    <div class="input-field">
                        <select name="sin3" id="sin3" data-validetta='required'><!--Sinodal 3-->
                            <option value="">---Seleccionar---</option>
                            <?php echo $sinodales; ?>
                        </select>
                        <label for='sin3'>Sinodal 3</label>
                    </div>

                    <div>
                        <button  type='submit' class="btn" class="btn waves-effect waves ligth" > Guardar </button>
                    </div>                    
                </form>
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
    