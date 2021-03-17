<?php
$Titulo = "Eliminar Producto";
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
    <h2 class="mb-3 text-center">Eliminar Producto</h2>
    <div class="rounded formulario mb-5">
        <div class="card-body">
            <form id="registro" name="registro" class="form-signin" action="../accion/ac_eliminarP.php" method="POST" onsubmit="encriptPass()" data-toggle="validator">
                <div class="form-row">
                    <!-- Nombre -->
                    <div class="col-md-6 mb-3">
                        <label class="control-label" for="nombre"><strong>Nombre del Producto</strong></label>
                        <input type="text" readonly class="form-control-plaintext pl-2" id="nombre" value="1234.png">
                    </div>
                    <!-- Descripción -->
                    <div class="col-md-12 mb-3">
                        <label class="control-label" for="descripcion"><strong>Motivo de Eliminación</strong></label>
                        <textarea class="form-control text-wrap" name="descripcion" id="descripcion" placeholder="Escriba el motivo de eliminación" required></textarea>
                    </div>
                </div>
                <!-- Botones -->
                <div class="text-center mt-1 mb-2">
                    <input class="btn btn-primary" name="btn_volver" href="listaProductos.php" type="button" value="Volver"></input>
                    <input class="btn btn-danger" name="btn_eliminar" type="submit" value="Eliminar"></input>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include_once("../estructura/pie.php");
?>