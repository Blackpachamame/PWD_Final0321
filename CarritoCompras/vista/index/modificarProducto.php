<?php
$Titulo = "Modificar Producto";
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

<div>
    <h2 class="mb-3 text-center">Modificar Producto</h2>
    <div class="rounded formulario mb-5">
        <div class="card-body">
            <form id="registro" name="registro" class="form-signin" action="../accion/ac_modificarP.php" method="POST" onsubmit="encriptPass()" data-toggle="validator">
                <div class="form-row">
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
                    <!-- Tipo -->
                    <div class="form-group col-md-4 mb-3">
                        <label for="op"><strong>Estado</strong></label>
                        <select class="custom-select" id="op" name="op" required>
                            <option selected value="" disabled>Ver selección</option>
                            <option value="admin">Con Stock</option>
                            <option value="visitante">Sin Stock</option>
                        </select>
                    </div>
                    <!-- Descripción -->
                    <div class="col-md-12 mb-3">
                        <label class="control-label" for="descripcion"><strong>Descripción</strong></label>
                        <textarea class="form-control text-wrap" name="descripcion" id="descripcion" placeholder="Escriba el motivo de eliminación" required></textarea>
                    </div>
                </div>
                <!-- Botones -->
                <div class="text-center mt-1 mb-2">
                    <input class="btn btn-danger" name="btn_eje4b" type="reset" value="Borrar"></input>
                    <input class="btn btn-success" name="btn_eje4e" type="submit" value="Enviar"></input>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include_once("../estructura/pie.php");
?>