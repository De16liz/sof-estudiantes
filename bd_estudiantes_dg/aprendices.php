<!-- Autor: Deimi Gomez
Ficha: 2058969 ADSI -->

<?php
class Aprendices
{
    private $nombre, $genero, $fecha_nacimiento, $id;

    public function __construct($nombre, $genero, $fecha_nacimiento, $id = null)
    {
        $this->nombre = $nombre;
        $this->genero = $genero;
        $this->fecha_nacimiento = $fecha_nacimiento;
        if ($id) {
            $this->id = $id;
        }
    }
    //Este guarda el registro de aprendices.
    public function guardar()
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("INSERT INTO aprendices_dg
            (nombre, genero, fecha_nacimiento)
                VALUES
                (?, ?, ?)");
        $sentencia->bind_param("sss", $this->nombre, $this->genero, $this->fecha_nacimiento);
        $sentencia->execute();
    }

    public static function obtener()
    {
        global $mysqli;
        $resultado = $mysqli->query("SELECT id, nombre, genero, fecha_nacimiento FROM aprendices_dg");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    //no modificar este código
    public static function obtenerUno($id)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("SELECT id, nombre, genero, fecha_nacimiento FROM aprendices_dg WHERE id = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_object();
    }
    //este actualiza el registro de aprendices.
    public function actualizar()
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("update aprendices_dg set nombre = ? where id = ?");
        $sentencia->bind_param("si", $this->nombre, $this->id);
        $sentencia->execute();
    }
    //este elimina los rgistros de aprendices.
    public static function eliminar($id)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("DELETE FROM aprendices_dg WHERE id = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
    }
}