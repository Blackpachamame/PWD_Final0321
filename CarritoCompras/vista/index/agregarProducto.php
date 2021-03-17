<?php
$Titulo = "Agregar Producto";
include_once("../estructura/cabecera.php");

/*$datos = data_submitted();
if (isset($datos['cs'])) {
    if ($datos['cs'] == 1) {
        $sesion->cerrarSession();
        header("Location:../index/login.php");
    }
} else {
    $activa = $sesion->activa();
    if ($activa) {
        header("Location:../index/carrito.php");
    }
}*/
?>

<div class="container">
    <h2 class="mb-3 text-center">Agregar Producto</h2>
    <div class="rounded formulario mb-5">
        <div class="card-body">
            <form id="registro" name="registro" class="form-signin" action="../accion/ac_agregarP.php" method="POST" onsubmit="encriptPass()" data-toggle="validator">
                <div class="form-row">
                    <!-- Elegir Imagén Producto -->
                    <div class="custom-file col-md-9 mb-3">
                        <input type="file" class="custom-file-input" id="customFileLang" name="customFileLang" lang="es" accept="image/x-png,image/gif,image/jpeg" onchange="myFunction()">
                        <label class="custom-file-label" for="customFileLang">Seleccionar Imagen</label>
                    </div>
                    <!-- Nombre Archivo -->
                    <div class="col-md-4 mb-3">
                        <label class="control-label" for="nombre"><strong>Nombre de Archivo</strong></label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="1234.png" required>
                    </div>
                    <!-- Nombre Producto -->
                    <div class="col-md-4 mb-3">
                        <label class="control-label" for="nombreP"><strong>Nombre de Producto</strong></label>
                        <input type="text" class="form-control" id="nombreP" name="nombreP" value="Impresora" required>
                    </div>
                    <!-- Stock Producto -->
                    <div class="col-md-4 mb-3">
                        <label class="control-label" for="stock"><strong>Cantidad de Stock</strong></label>
                        <input type="number" class="form-control" id="stock" name="stock" placeholder="0">
                        <small id="passwordHelpInline" class="text-muted">
                            Si queda vacío no hay stock.
                        </small>
                    </div>
                    <!-- Descripción -->
                    <div class="col-md-12 mb-3">
                        <label class="control-label" for="summernote"><strong>Descripción del Producto</strong></label>
                        <textarea class="form-control text-wrap" name="summernote" id="summernote" required></textarea>
                    </div>
                </div>
                <!-- Botones -->
                <div class="text-center mt-1 mb-2">
                    <input class="btn btn-danger" name="btn_reset" type="reset" value="Resetear"></input>
                    <input class="btn btn-success" name="btn_agregar" type="submit" value="Agregar"></input>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include_once("../estructura/pie.php");
?>