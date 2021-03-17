<?php
$Titulo = "Lista de Productos";
include_once("../estructura/cabecera.php");

/*$obj = new control_Contenido();
$arreglo = $obj->obtenerArchivos();*/
?>


<div class="container">
    <h2 class="mb-3 text-center">Lista de Productos</h2>
    <form id="archivosCont" name="archivosCont" class="mb-4" method="POST" action="accionVerArchivo.php">
        <div class="rounded formulario pl-5 pr-5 pt-4 pb-4 mb-3">
            <div class="form-row">
                <?php
                foreach ($arreglo as $archivo) {
                    $tipoArchivo = substr($archivo, -3);
                    if (strlen($archivo) > 2 && $tipoArchivo != "txt") {
                        echo "<div class='input-group mb-2'>
                        <input type='text' class='form-control' placeholder='$archivo' disabled>
                        <div name='Seleccion:$archivo' id='Seleccion:$archivo' class='input-group-append'>
                            <button class='btn btn-outline-info' type='button'>Modificar</button>
                            <button class='btn btn-outline-danger' type='button'>Eliminar</button>
                        </div>
                </div>";
                    }
                }
                ?>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="text-center col-sm-12 mb-3">
            <a class="btn btn-primary" href="amarchivo.php" role="button">Nuevo Archivo</a>
        </div>
    </div>
</div>

<?php
include_once("../estructura/pie.php");
?>