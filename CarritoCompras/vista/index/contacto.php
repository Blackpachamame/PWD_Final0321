<?php
$Titulo = "Contacto";
include_once("../estructura/cabecera.php");
?>

<div class="card mb-5">
    <div class="card-body">
        <form id="registro" name="registro" class="form-signin" action="../accion/ac_contacto.php" method="POST" onsubmit="encriptPass()" data-toggle="validator">
            <h1 class="h3 mb-3 text-center">Contacto</h1>
            <!-- Nombre -->
            <div class="input-group mb-3 mx-auto" style="width: 400px">
                <input type="text" id="uslogin" name="uslogin" class="form-control" placeholder="Introduzca su nombre completo" required="" autofocus="">
            </div>
            <!-- Mail -->
            <div class="input-group mb-3 mx-auto" style="width: 400px">
                <input type="email" id="email" name="email" class="form-control" placeholder="Introduzca su email" required="">
            </div>
            <!-- Mensaje -->
            <div class="input-group mb-3 mx-auto">
                <textarea class="form-control text-wrap" name="descripcion" id="descripcion" placeholder="Describa su mensaje" required></textarea>
            </div>
            <button class="btn btn-lg btn-success btn-block mb-0 mx-auto" type="submit" style="width: 400px">Enviar</button>
        </form>
    </div>
</div>

<?php
include_once("../estructura/pie.php");
?>