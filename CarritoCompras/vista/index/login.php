<?php
$Titulo = "Login";
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
        <form id="login" name="login" class="form-signin" action="../accion/ac_login.php" method="POST" onsubmit="encriptPass()" data-toggle="validator">
            <h1 class="h3 mb-3 text-center">Login</h1>
            <div class="input-group mb-3 mx-auto" style="width: 300px">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input type="text" id="uslogin" name="uslogin" class="form-control" placeholder="Username" required="" autofocus="">
            </div>
            <div class="input-group mb-3 mx-auto" style="width: 300px">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input type="password" id="usclave" name="usclave" class="form-control" placeholder="***********" required="">
            </div>
            <button class="btn btn-lg btn-success btn-block mb-3 mx-auto" type="submit" style="width: 300px">Acceder</button>
        </form>
        <div style="text-align: center;">
            <p class="mb-0 text-muted">¿No tienes cuenta? <a href="registrar.php">¡Registrate!</a></p>
        </div>
    </div>
</div>

<?php
include_once("../estructura/pie.php");
?>