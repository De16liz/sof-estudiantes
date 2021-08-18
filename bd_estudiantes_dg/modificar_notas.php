<?php
include_once "conexion.php";
include_once "notas.php";
$notas = new Nota($_POST["notas"], $_POST["id_aprendices"], $_POST["id_competencias"]);
$notas->guardar();
header("Location: notas_aprendices.php?id=" . $_POST["id_aprendices"]);