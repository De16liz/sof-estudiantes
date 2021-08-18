<!-- Autor: Deimi Gomez
Ficha: 2058969 ADSI -->
<?php

//include("conexion.php");
class Nota
{
    public $notas, $id_aprendices, $id_competencias;

    public function __construct($notas, $id_aprendices, $id_competencias)
    {
        

        $this->notas = $notas;
        $this->id_aprendices = $id_aprendices;
        $this->id_competencias = $id_competencias;
    }

    public function guardar()
    {
        global $mysqli;
        // La eliminamos en caso de que exista
        $this->eliminar();
        // Y siempre la insertamos. No importa si es la primera vez o es una actualización
        $sentencia = $mysqli->prepare("INSERT INTO notas_aprendices_dg
            (id_aprendices, id_competencias, notas)
                VALUES
                (?, ?, ?)");
        $sentencia->bind_param("ssd", $this->id_aprendices, $this->id_competencias, $this->notas);
        $sentencia->execute();
    }

    public static function obtenerAprendices($id_aprendices)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("SELECT id, id_aprendices, id_competencias, notas FROM notas_aprendices_dg WHERE id_aprendices = ?");
        $sentencia->bind_param("i", $id_aprendices);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public static function combinar($competencias, $notas)
    {
        for ($x = 0; $x < count($competencias); $x++) {
            $competencias[$x]["notas"] = self::obtenerCalificacion($notas, $competencias[$x]["id"]);
        }
        return $competencias;
    }

    private static function obtenerCalificacion($notas, $id_competencias)
    {
        foreach ($notas as $notas) {
            if (intval($notas["id_competencias"]) === intval($id_competencias)) {
                return $notas["notas"];
            }
        }
        return 0;
    }


    public function eliminar()
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("DELETE FROM notas_aprendices_dg WHERE id_aprendices = ? AND id_competencias = ?");
        $sentencia->bind_param("ii", $this->id_aprendices, $this->id_competencias);
        $sentencia->execute();
    }
}