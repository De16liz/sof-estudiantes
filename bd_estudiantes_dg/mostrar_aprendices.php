<!-- Autor: Deimi Gomez
Ficha: 2058969 ADSI -->

<?php
include_once "conexion.php";
include_once "encabezado.php";
include_once "aprendices.php";
$aprendices = Aprendices::obtener();
?>
<div class="row">
    <div class="col-12">
        <h1>Listado de aprendices</h1>
        <a href="formulario_registro_aprendices.php" class="btn btn-info my-2">Nuevo</a>
    </div>
    <div class="col-12 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Genero</th>
                    <th>Fecha de nacimiento</th>
                    <th>Notas</th>
                    <th>Editar</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($aprendices as $aprendices) { ?>
                    <tr>
                        <td><?php echo $aprendices["nombre"] ?></td>
                        <td><?php echo $aprendices["genero"] ?></td>
                        <td><?php echo $aprendices["fecha_nacimiento"] ?></td>
                        <td>
                            <a href="notas_aprendices.php?id=<?php echo $aprendices["id"] ?>" class="btn btn-info">
                                Notas
                            </a>
                        </td>
                        <td>
                            <a href="editar.php?id=<?php echo $aprendices["id"] ?>" class="btn btn-warning">
                                Editar
                            </a>
                        </td>
                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php