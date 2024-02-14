<?php
cabecera($this->datos);
?>

  <div class=" container-fluid">
    <!-- Sidebar -->
    <div class="col-md-3 col-lg-2 px-0 position-fixed h-100  shadow-sm sidebar " id="sidebar">
      <div class="list-group rounded-0">
       
       
         
       
        <a href="#" class="list-group-item list-group-item-action border-0 align-items-center">
          <span class="bi bi-box"></span>
          <span class="ml-2">Avisos</span>
        </a>



        <button class="list-group-item list-group-item-action border-0 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#sale-collapse">
          <div>
            <span class="bi bi-cart-dash"></span>
            <span class="ml-2">Usuarios</span>
          </div>
          <span class="bi bi-chevron-down small"></span>
        </button>
        <div class="collapse" id="sale-collapse" data-parent="#sidebar">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action border-0 pl-5">Entidad</a>
            <a href="#" class="list-group-item list-group-item-action border-0 pl-5">Usuario</a>
          </div>
        </div>
        

        <button class="list-group-item list-group-item-action border-0 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#purchase-collapse">
          <div>
            <span class="bi bi-cart-plus"></span>
            <span class="ml-2">Ofertas</span>
          </div>
          <span class="bi bi-chevron-down small"></span>
        </button>
        <div class="collapse" id="purchase-collapse" data-parent="#sidebar">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action border-0 pl-5">Negocio</a>
            <a href="#" class="list-group-item list-group-item-action border-0 pl-5">Vivienda</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Contenido principal -->
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
                <a href="<?php echo RUTA_URL; ?>/adminControlador/anadirInmuebles">
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
                <a href="<?php echo RUTA_URL; ?>/adminControlador/anadirNegocio">
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
                <a href="<?php echo RUTA_URL; ?>/adminControlador/anadirUsuario">
                  <i class="fas fa-plus"></i> <i class="fas fa-user"></i> Añadir Usuarios
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-3 mb-3 mb-sm-0">
          <div class="card text-center">
            <div class="card-body">
              <h5 class="card-title">SERVICIOS</h5>
              <div>
                <a href="<?php echo RUTA_URL; ?>/adminControlador/listarServicios">
                  <i class="fas fa-search"></i> <i class="fas fa-store"></i> Ver SERVICIOS
                </a>
              </div>
              <div>
                <a href="<?php echo RUTA_URL; ?>/adminControlador/anadirNegocio">
                  <i class="fas fa-plus"></i> <i class="fas fa-store"></i> Añadir SERVICIOS
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<!-- <?php
require_once RUTA_APP . '/vistas/inc/footer.php';
?> -->




