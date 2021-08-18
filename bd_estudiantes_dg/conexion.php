<?php

//$conexion = mysqli_connect( "localhost", "root", "", "bd_estudiantes_dg" );

$host = "localhost";
$usu = "root";
$contra = "";
$bd = "bd_estudiantes_dg";
$mysqli = new mysqli($host, $usu, $contra, $bd);
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
