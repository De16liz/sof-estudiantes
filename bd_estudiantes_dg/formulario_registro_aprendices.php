<?php include "encabezado.php" ?>
<div class="row">
    <div class="col-12">
        <h1>Registro de Aprendices</h1>
        <form action="guardar_aprendices.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input name="nombre" required type="text" id="nombre" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="genero">Genero</label>
                <input name="genero" required type="text" id="genero" class="form-control" placeholder="Genero">
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                <input name="fecha_nacimiento" required type="text" id="fecha_nacimiento" class="form-control" placeholder="fecha de nacimiento">
            </div>
            
            <div class="form-group">
                <button class="btn btn-success" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>