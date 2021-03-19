<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap/4.6.0/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap/4.6.0/bootstrapValidator.min.css">
    <link type="text/css" rel="stylesheet" href="../css/estilos.css" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Kufam:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <title><?php $Titulo ?></title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container-fluid px-5">
            <!-- Navbar brand -->
            <span class="font-weight-bold text-uppercase navbar">Tienda</span>
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item mx-1">
                        <a class="nav-link" role="button" aria-haspopup="true" aria-expanded="false" href="../index/home.php">
                            <span class="bi bi-house-door-fill fa-fw d-lg-none d-xl-none" aria-hidden="true"></span>
                            <span>Home</span></a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link" aria-current="page" href="../index/contacto.php">
                            <span class="fas fa-info-circle fa-fw d-lg-none d-xl-none" aria-hidden="true"></span>
                            <span>Contacto</span></a>
                    </li>
                </ul>
            </div>
            <!-- Icons -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <!-- Icon carrito -->
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="../index/carrito.php" role="button" aria-haspopup="true" aria-expanded="false"><span class="fas fa-shopping-cart"></span>
                            <span class="d-lg-none">Carrito</span></a>
                    </li>
                    <!-- Icon visitante -->
                    <li class="nav-item mx-1 dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="fas fa-user-times fa-fw" aria-hidden="true"></span> <span class="d-lg-none">Usuario</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="../index/login.php"><span class="fas fa-sign-in-alt fa-fw" aria-hidden="true" title="Log in"></span> Login</a>
                            <a class="dropdown-item" href="../index/registrar.php"><span class="fas fa-pencil-alt fa-fw" aria-hidden="true" title="Sign up"></span> Registrarse</a>
                        </div>
                    </li>
                    <!-- Icon usuario -->
                    <li class="nav-item mx-1 dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="fas fa-user fa-fw" aria-hidden="true"></span> <span class="d-lg-none" style="color: #06f">Usuario</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="../index/perfil.php">
                                <span class="fas fa-user fa-fw" aria-hidden="true" title="Perfil"></span> Perfil </a>
                            <a class="dropdown-item" href="../index/configuracion.php"><span class="fas fa-cog fa-fw " aria-hidden="true" title="Configuración"></span> Configuración</a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item logout" href="#"><span class="fas fa-sign-out-alt fa-fw" aria-hidden="true" title="Cerrar sesión"></span> Cerrar sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

    <div class="container-fluid">
        <div class="row">

            <?php /*
            include_once("../../configuracion.php");
            include_once("../../control/control_Contenido.php");
            include_once("../../control/Abm_Usuario.php");
            include_once("../../control/Abm_ArchivoCargado.php");
            include_once("../../control/Abm_ArchivoCargadoEstado.php");
            include_once("../../control/Abm_EstadoTipos.php");*/
            ?>

            <main role="main" class="mx-auto my-5" style="min-height: 500px;">
                <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                    <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                    </div>
                </div>