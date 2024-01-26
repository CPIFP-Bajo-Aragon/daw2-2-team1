<?php
    cabecera();
?>
  <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mb-3">
                <button class="btn btn-primary custom-button">
                    <i class="fas fa-search"></i> <i class="fas fa-home"></i> Ver Inmueble
                </button>
            </div>
            <div class="col-md-4 mb-3">
                <button class="btn btn-secondary custom-button">
                    <i class="fas fa-search"></i> <i class="fas fa-store"></i> Ver Negocio
                </button>
            </div>
            <div class="col-md-4 mb-3">
                <button class="btn btn-success custom-button">
                    <i class="fas fa-search"></i> <i class="fas fa-user"></i> Ver Usuario
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <button class="btn btn-primary custom-button">
                    <i class="fas fa-plus"></i> <i class="fas fa-home"></i> Añadir Inmueble
                </button>
            </div>
            <div class="col-md-4 mb-3">
                <button class="btn btn-secondary custom-button">
                    <i class="fas fa-plus"></i> <i class="fas fa-store"></i> Añadir Negocio
                </button>
            </div>
            <div class="col-md-4 mb-3">
                <button class="btn btn-success custom-button">
                    <i class="fas fa-plus"></i> <i class="fas fa-user"></i> Añadir Usuario
                </button>
            </div>
        </div>
    </div>

<?php 

require_once RUTA_APP.'/vistas/inc/footer.php'
?>
