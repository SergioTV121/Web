<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("location:./LoginCatt.html");
    }else{
        //echo $_SESSION["login"];
?>


<!DOCTYPE html>
<html lang="en">
<link href="./generalCatt.css" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InicioCatt</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</head>
<body>
    <div id="particles-js"></div>
    <div id="bloque">
    <header class="contenedor header">
    <h1>BIENVENIDO HAS INICIADO SESION (CATT)</h1>
        <div class="container">
            <nav class="menu">
                <ul>
                <li><a href="./alumnosRegistrados.php">Alumnos</a></li>
                <li><a href="./ttsRegistrados.php">TT's registrados</a></li>
                <li><a href="./asignaSinodalCatt.php">Asignar sinodales</a></li>
                <li><a href="./cerrarSesionCatt.php?sesion=login">Cerrar Sesion</a></li>
                <ul>
            </nav>
        </div>
    </header>
    </div>
    <script src="js/particles.min.js"></script>
    <script src="js/activar.js"></script>
</body>
</html>
<?php
    }
?>