<?php
include_once "conexion.php";
include_once "competencias.php";
$competencias = new Competencias($_POST["nombre"]);
$competencias->guardar();
header("Location: mostrar_competencias.php");