<?php
session_start();
$boleta=$_POST["boleta"];
$_SESSION['boleta']=$boleta;
?>