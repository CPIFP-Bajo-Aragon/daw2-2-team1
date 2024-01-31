<?php
    cabecera($this->datos);
?>


<div class="container mt-5">
    <div class="row justify-content-center gap-10">

    <div class="col-sm-3 mb-3 mb-sm-0">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">INMUEBLES</h5>
                    <div>
                        <a href="<?php echo RUTA_URL; ?>/adminControlador/listarInmuebles">
                            <i class="fas fa-search"></i> <i class="fas fa-home"></i> Ver Inmuebles
                        </a>
                    </div>
                    <div>
                        <a href="<?php echo RUTA_URL; ?>/adminControlador/añadirInmuebleA">
                            <i class="fas fa-plus"></i> <i class="fas fa-home"></i> Añadir Inmuebles
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-3 mb-3 mb-sm-0">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">NEGOCIOS</h5>
                    <div>
                        <a href="<?php echo RUTA_URL; ?>/adminControlador/listarNegocios">
                            <i class="fas fa-search"></i> <i class="fas fa-store"></i> Ver Negocios
                        </a>
                    </div>
                    <div>
                        <a href="<?php echo RUTA_URL; ?>/negocios/añadir">
                            <i class="fas fa-plus"></i> <i class="fas fa-store"></i> Añadir Negocios
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-3 mb-3 mb-sm-0">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">USUARIOS</h5>
                    <div>
                        <a href="<?php echo RUTA_URL; ?>/adminControlador/listarUsuarios">
                            <i class="fas fa-search"></i> <i class="fas fa-user"></i> Ver Usuarios
                        </a>
                    </div>
                    <div>
                        <a href="<?php echo RUTA_URL; ?>/usuarios/añadir">
                            <i class="fas fa-plus"></i> <i class="fas fa-user"></i> Añadir Usuarios
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once RUTA_APP . '/vistas/inc/footer.php';
?>
</body>
</html>