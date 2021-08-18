<!-- Autor: Deimi Gomez
Ficha: 2058969 ADSI -->

<?php
include_once "conexion.php";
include_once "encabezado.php";
include_once "competencias.php";
$competencias = competencias::obtener();
?>
<div class="row">
    <div class="col-12">
        <h1>Listado de competencias</h1>
        <a href="formulario_registro_competencias.php" class="btn btn-info my-2">Nueva</a>
    </div>
    <div class="col-12 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Editar</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($competencias as $competencias) { ?>
                    <tr>
                        <td><?php echo $competencias["nombre"] ?></td>
                        <td>
                            <a href="editar_competencias.php?id=<?php echo $competencias["id"] ?>" class="btn btn-warning">
                                Editar
                            </a>
                        </td>
                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>