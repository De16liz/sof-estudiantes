<!--Autor: Lizbeth Johana Caro Suarez-->
<?php
include_once "conexion.php";
include_once "aprendices.php";
$aprendices = new Aprendices($_POST["nombre"], $_POST["genero"], $_POST["fecha_nacimiento"]);
$aprendices->guardar();
header("Location: mostrar_aprendices.php");