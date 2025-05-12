<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("location:./LoginCatt.html");
    }else{
?>

<!DOCTYPE html>
<html lang="en">
<link href="./generalCatt.css" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos Registrados</title>
    <link rel="stylesheet" href="./js/validetta/dist/validetta.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/validetta/dist/validetta.min.js"></script>
    <script src="./js/validetta/localization/validettaLang-es-ES.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./js/alumnosRegistrados.js"></script>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
    <div id="particles-js"></div>
    <div id="bloque">
    <header class="contenedor header">
    <form id="frmAlumnoReg">
        <label for="boleta">Boleta: </label> <input type="text" id="boleta" name="boleta" data-validetta="required" placeholder="Ingrese la boleta"><br>
        <button type="submit"class="btn waves-effect waves ligth">Consultar</button>
    </form>
            <table  id="alumno">
                <thead>
                    <tr>
                        <th>Boleta</th>
                        <th>Nombre</th>
                        <th>Primer apellido</th>
                        <th>Segundo Apellido</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>No. TT</th>
                        <th>Directores</th>
                        <th>Sinodales</th>
                    </tr>
                </thead>
            </table>
        <a href="./inicioCatt.php">Regresar</a>
    </header>
    </div>
    <script src="js/particles.min.js"></script>
    <script src="js/activar.js"></script>
</body>
</html>
<?php
    }
?>