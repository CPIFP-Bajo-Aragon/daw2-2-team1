<?php
    cabecera($this->datos);
?>


<div class="container h-100 d-flex flex-column  mt-5">
    <div class="row justify-content-center justify-center align-center gap-10 mt-5">

    <div class="col-md-4 col-sm-4 col-xl-3 col-lg-4 mb-3 mb-sm-0 mt-5">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">USUARIOS</h5>
                    <div>
                        <a href="<?php echo RUTA_URL; ?>/adminControlador/listarUsuarios">
                            <i class="fas fa-search"></i> <i class="fas fa-user"></i> Ver Usuarios
                        </a>
                    </div>
                    <div>
                        <a href="<?php echo RUTA_URL; ?>/adminControlador/anadirUsuario">
                            <i class="fas fa-plus"></i> <i class="fas fa-user"></i> Añadir Usuarios
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 col-xl-3 col-lg-4 mb-3 mb-sm-0 mt-5">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">SERVICIOS</h5>
                    <div>
                        <a href="<?php echo RUTA_URL; ?>/adminControlador/listarServicios">
                            <i class="fas fa-search"></i> <i class="fas fa-store"></i> Ver SERVICIOS
                        </a>
                    </div>
                    <div>
                        <a href="<?php echo RUTA_URL; ?>/adminControlador/anadirServicio">
                            <i class="fas fa-plus"></i> <i class="fas fa-store"></i> Añadir SERVICIOS
                        </a>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="col-md-4 col-sm-4 col-xl-3 col-lg-4 mb-3 mb-sm-0 mt-5">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">NEGOCIOS</h5>
                    <div>
                        <a href="<?php echo RUTA_URL; ?>/adminControlador/listarNegocios">
                            <i class="fas fa-search"></i> <i class="fas fa-store"></i> Ver Negocios
                        </a>
                    </div>
                    <div>
                        <a href="<?php echo RUTA_URL; ?>/adminControlador/anadirNegocio">
                            <i class="fas fa-plus"></i> <i class="fas fa-store"></i> Añadir Negocios
                        </a>
                    </div>
                </div>
            </div>
        </div>

    <div class="col-md-4 col-sm-4 col-xl-3 col-lg-4 mb-3 mb-sm-0 mt-5">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">INMUEBLES</h5>
                    <div>
                        <a href="<?php echo RUTA_URL; ?>/adminControlador/listarInmuebles">
                            <i class="fas fa-search"></i> <i class="fas fa-home"></i> Ver Inmuebles
                        </a>
                    </div>
                    <div>
                        <a href="<?php echo RUTA_URL; ?>/adminControlador/anadirInmuebles">
                            <i class="fas fa-plus"></i> <i class="fas fa-home"></i> Añadir Inmuebles
                        </a>
                    </div>
                </div>
            </div>
        </div>

       

        <div class="col-md-3 col-sm-4 col-xl-4 col-lg-4 mt-5 mb-sm-0 mt-5">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title"> <a href="<?php echo RUTA_URL; ?>/adminControlador/listarValoracionesInmueble"><i class="bi bi-star"></i>VALORACIONES </a></h5>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 col-xl-4 col-lg-4mb-3 mt-5 mb-sm-0">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title"> <a href="<?php echo RUTA_URL; ?>/adminControlador/estadisticas"><i class="bi bi-bar-chart-line-fill"></i>ESTADISTICAS </a></h5>
                </div>
            </div>
        </div>


    </div>
    <?php
require_once RUTA_APP . '/vistas/inc/footer.php';
?>
</div>


</body>
</html>