<?php
$Titulo = "Registrar";
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

<div class="card mb-5">
    <div class="card-body">
        <form id="registro" name="registro" class="form-signin" action="../accion/ac_registrar.php" method="POST" onsubmit="encriptPass()" data-toggle="validator">
            <h1 class="h3 mb-3 text-center">Registro</h1>
            <div class="input-group mb-3 mx-auto" style="width: 400px">
                <input type="text" id="uslogin" name="uslogin" class="form-control" placeholder="Nombre de usuario" required="" autofocus="">
            </div>
            <div class="input-group mb-3 mx-auto" style="width: 400px">
                <input type="email" id="email" name="email" class="form-control" placeholder="Correo electrónico" required="">
            </div>
            <div class="input-group mb-3 mx-auto" style="width: 400px">
                <input type="password" id="usclave" name="usclave" class="form-control" placeholder="Password" required="">
            </div>
            <button class="btn btn-lg btn-success btn-block mb-0 mx-auto" type="submit" style="width: 400px">Registrar</button>
        </form>
    </div>
</div>

<?php
include_once("../estructura/pie.php");
?>