<!-- Autor: Deimi Gomez
Ficha: 2058969 ADSI -->

<?php
include_once "conexion.php";
include_once "encabezado.php";
include_once "aprendices.php";
include_once "competencias.php";
include_once "notas.php";
$aprendices = Aprendices::obtenerUno($_GET["id"]);
$competencias = Competencias::obtener();
$notas = Nota::obtenerAprendices($aprendices->id);
$competenciasConCalificacion = Nota::combinar($competencias, $notas);
?>
<div class="row">
    <div class="col-12">
        <h1>Notas de <?php echo $aprendices->nombre ?></h1>
    </div>
    <div class="col-12 table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Competencias</th>
                    <th>Notas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sumatoria = 0;
                foreach ($competenciasConCalificacion as $competencias) {
                    $sumatoria += $competencias["notas"];
                ?>
                    <tr>
                        <td>
                            <?php echo $competencias["nombre"] ?>
                        </td>
                        <td>
                            <form action="modificar_notas.php" method="POST" class="form-inline">
                                <input type="hidden" value="<?php echo $aprendices->id ?>" name="id_aprendices">
                                <input type="hidden" value="<?php echo $competencias["id"] ?>" name="id_competencias">
                                <input value="<?php echo $competencias["notas"] ?>" required min="0" name="notas" placeholder="Escriba la calificación" type="number" class="form-control">
                                <button class="btn btn-success mx-2">Guardar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td>Promedio</td>
                    <td>
                        <strong>
                            <?php
                            $promedio = $sumatoria / count($competencias);
                            echo $promedio;
                            ?>
                        </strong>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
